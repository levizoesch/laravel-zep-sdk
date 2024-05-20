<?php

namespace ZepSDK;

use Exception;
use JsonException;
use ZepSDK\Exceptions\BadRequestErrorException;
use ZepSDK\Exceptions\InternalServerErrorException;
use ZepSDK\Exceptions\NotFoundErrorException;
use ZepSDK\Exceptions\UnauthorizedErrorException;
use ZepSDK\Exceptions\ZepErrorException;
use ZepSDK\Traits\DocumentTrait;
use ZepSDK\Traits\MemoryTrait;
use ZepSDK\Traits\UserTrait;

class ZepClient {


	use MemoryTrait;
	use UserTrait;
	use DocumentTrait;

	private string $BASE_URL;

	private string $projectKey;

	/**
	 * @throws Exception
	 */
	public function __construct($projectKey) {

		if ($projectKey === null) {
			throw new Exception("Missing Api Id");
		}

		$this->projectKey = $projectKey;

		$this->BASE_URL = config('zep.BASE_URL');

	}

	/**
	 * @throws JsonException
	 */
	public function get($path, $data = null) {

		return json_decode($this->request('GET', $path, $data), false, 512, JSON_THROW_ON_ERROR);
	}

	/**
	 * @throws JsonException
	 */
	public function post(
		$path,
		$data
	) {

		return json_decode($this->request('POST', $path, $data), false, 512, JSON_THROW_ON_ERROR);
	}

	/**
	 * @throws JsonException
	 */
	public function patch(
		$path,
		$data
	) {

		return json_decode($this->request('PATCH', $path, $data), false, 512, JSON_THROW_ON_ERROR);
	}

	/**
	 * @throws JsonException
	 */
	public function destroy($path) {

		return json_decode($this->request('DELETE', $path), false, 512, JSON_THROW_ON_ERROR);
	}

	/**
	 * @throws JsonException
	 * @throws Exception
	 */
	public function request(
		$method,
		$path,
		$data = null,
		$headers = [],
		$timeoutMs = 60000,
	) : mixed {

		$url = $this->BASE_URL . $path;

		$defaultHeaders = [
			'Content-Type: application/json',
			'Authorization: Api-Key ' . $this->projectKey
		];

		$headers = array_merge($defaultHeaders, $headers);

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL            => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST  => $method,
			CURLOPT_HTTPHEADER     => $headers,
			CURLOPT_TIMEOUT_MS     => $timeoutMs,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_MAXREDIRS      => 3,
			CURLOPT_SSL_VERIFYHOST => 2,
			CURLOPT_SSL_VERIFYPEER => true,
		]);

		if ($data) {
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data, JSON_THROW_ON_ERROR));
		}

		$response = curl_exec($curl);

		if ($response === false) {
			$error = curl_error($curl);
			curl_close($curl);
			throw new Exception("cURL request failed: $error");
		}

		$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

/*		if ($statusCode === 200) {
			return $response;
		} else if ($statusCode === 400) {
			throw new BadRequestErrorException();
		} else if ($statusCode === 401) {
			throw new UnauthorizedErrorException();
		} else if ($statusCode === 404) {
			throw new NotFoundErrorException();
		} else if ($statusCode === 500) {
			throw new InternalServerErrorException();
		} else {
			throw new ZepErrorException();
		}*/

		return $response;

	}

}