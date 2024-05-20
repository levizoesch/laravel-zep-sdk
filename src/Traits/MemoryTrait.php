<?php

namespace ZepSDK\Traits;

use JsonException;

trait MemoryTrait {

	/**
	 * Create New Session
	 *
	 * @throws JsonException
	 */
	public function createNewSession($data) {
		return $this->post('sessions', $data);
	}

	/**
	 * Get all sessions with optional page number, page size, order by field and order direction for pagination.
	 *
	 * @throws JsonException
	 */
	public function getSessionsOrdered($data = []) {
		return $this->get('sessions-ordered', $data);
	}

	/**
	 * Get session by id
	 *
	 * @throws JsonException
	 */
	public function getBySessionId($sessionId) {
		return $this->get('sessions/' . $sessionId);
	}

	/**
	 * Update Session Metadata
	 *
	 * @throws JsonException
	 */
	public function updateMetaDataBySessionId(string $sessionId, $data) {
		return $this->patch('sessions/' . $sessionId, $data);
	}

	/**
	 * Classify a session by session id
	 *
	 * @throws JsonException
	 */
	public function classifyBySessionId(string $sessionId, $data = []) {
		return $this->post('sessions/' . $sessionId . '/classify', $data);
	}

	/**
	 * End a session by ID
	 *
	 * @throws JsonException
	 */
	public function endBySessionId(string $sessionId, $data = []) {
		return $this->post('sessions/' . $sessionId.'/end', $data);
	}

	/**
	 * Extract data from a session by session id
	 *
	 * @throws JsonException
	 */
	public function extractBySessionId(string $sessionId, $data = []) {
		return $this->post('sessions/' . $sessionId . '/extract', $data);
	}

	/**
	 * Returns a memory (latest summary, list of messages and facts for models.MemoryTypePerpetual) for a given session
	 *
	 * @throws JsonException
	 */
	public function getMemoryBySessionId(string $sessionId, $data = []) {
		return $this->get('sessions/' . $sessionId . '/memory', $data);
	}

	/**
	 * Add memory to a session.
	 *
	 * @throws JsonException
	 */
	public function addMemoryBySessionId(string $sessionId, $data = []) {
		return $this->post('sessions/' . $sessionId . '/memory', $data);
	}

	/**
	 * Delete memory messages from session id.
	 *
	 * @throws JsonException
	 */
	public function destroyMemoryBySessionId(string $sessionId) {
		return $this->destroy('sessions/' . $sessionId . '/memory');
	}

	/**
	 * Lists messages for a session, specified by limit and cursor.
	 *
	 * @throws JsonException
	 */
	public function listMessagesBySessionId(string $sessionId, $data) {
		return $this->get('sessions/' . $sessionId . '/messages', $data);
	}

	/**
	 * Get a specific message from a session
	 *
	 * @throws JsonException
	 */
	public function getMessageIdBySessionId(string $messageId, string $sessionId) {
		return $this->get('sessions/' . $sessionId . '/messages/' . $messageId);
	}

	/**
	 * Updates a session message metadata by messageId, and sessionId
	 *
	 * @throws JsonException
	 */
	public function updateByMessageIdBySessionId(string $messageId, string $sessionId, $data) {
		return $this->patch('sessions/' . $sessionId . '/messages/' . $messageId, $data);
	}

	/**
	 * Search memory for the specified sessionId.
	 *
	 * @throws JsonException
	 */
	public function searchBySessionId(string $sessionId, $data) {
		return $this->post('sessions/' . $sessionId . '/search', $data);
	}

	/**
	 * Get session summaries by ID
	 *
	 * @throws JsonException
	 */
	public function getSummaryBySessionId(string $sessionId) {
		return $this->get('sessions/' . $sessionId . '/summary');
	}

	/**
	 * Synthesize a question from the last N messages in the chat history.
	 *
	 * @throws JsonException
	 */
	public function getSynthesizeQuestionBySessionId(string $sessionId, $data) {
		return $this->get('sessions/' . $sessionId . '/synthesize_question', $data);
	}

}