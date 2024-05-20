<?php

namespace ZepSDK\Traits;

use JsonException;

trait UserTrait {

	/**
	 * Add a user.
	 *
	 * @throws JsonException
	 */
	public function createNewUser($data) {
		return $this->post('users', $data);
	}

	/**
	 * List all users with pagination.
	 *
	 * @throws JsonException
	 */
	public function getAllUsers($data) {
		return $this->get('users-ordered', $data);
	}

	/**
	 * Get a user.
	 *
	 * @throws JsonException
	 */
	public function getByUserId(string $userId) {
		return $this->get('users/' . $userId);
	}

	/**
	 * destroy user by id
	 *
	 * @throws JsonException
	 */
	public function destroyByUserId(string $userId) {
		return $this->destroy('users/' . $userId);
	}

	/**
	 * Update a user.
	 *
	 * @throws JsonException
	 */
	public function updateByUserId(string $userId, $data) {
		return $this->patch('users/' . $userId, $data);
	}

	/**
	 * list all sessions for a user by user id
	 *
	 * @throws JsonException
	 */
	public function getSessionsByUserId(string $userId) {
		return $this->get('users/' . $userId . '/sessions');
	}

}