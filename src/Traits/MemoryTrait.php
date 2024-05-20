<?php

namespace ZepSDK\Traits;

use JsonException;

trait MemoryTrait {

	/**
	 * @throws JsonException
	 */
	public function createNewSession($data) {
		return $this->post('sessions', $data);
	}

	/**
	 * @throws JsonException
	 */
	public function getSessionsOrdered() {
		return $this->get('sessions-ordered');
	}

}