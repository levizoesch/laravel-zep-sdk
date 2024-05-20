<?php

namespace ZepSDK\Traits;

use JsonException;

trait DocumentTrait {

	/**
	 * Returns a list of all DocumentCollections.
	 *
	 * @throws \JsonException
	 */
	public function getAllDocumentCollections() {
		return $this->get('collections');
	}

	/**
	 * Returns a DocumentCollection if it exists.
	 *
	 * @throws \JsonException
	 */
	public function getCollectionByName(string $collectionName) {
		return $this->get('collections/' . $collectionName);
	}

	/**
	 * Create new Collection
	 *
	 * *note* If a collection with the same name already exists, an error will be returned.
	 *
	 * @throws \JsonException
	 */
	public function createNewCollection($collectionName, $data) {
		return $this->post('collections/' . $collectionName, $data);
	}

	/**
	 * Destroys a document collection by name.
	 *
	 * *note* If a collection with the same name already exists, it will be overwritten.
	 * @throws \JsonException
	 */
	public function destroyCollectionByName(string $collectionName) {
		return $this->destroy('collections/' . $collectionName);
	}

	/**
	 * Updates a DocumentCollection
	 *
	 * @throws \JsonException
	 */
	public function updateCollectionByName(string $collectionName, $data) {
		return $this->patch('collections/' . $collectionName, $data);
	}

	/**
	 * Creates Documents in a specified DocumentCollection and returns their UUIDs.
	 *
	 * @throws \JsonException
	 */
	public function createManyDocumentsCollection(string $collectionName, $data) {
		return $this->post('collections/' . $collectionName . '/documents', $data);
	}

	/**
	 * Deletes specified Documents from a DocumentCollection.
	 * Expects a list of strings.
	 * @throws \JsonException
	 */
	public function batchDestroyDocumentsByCollectionName(string $collectionName, $data) {
		return $this->post('collections/' . $collectionName . '/documents/batch-destroy', $data);
	}

	/**
	 * Returns Documents from a DocumentCollection specified by UUID or ID.
	 *
	 * @throws \JsonException
	 */
	public function batchGetDocumentsByCollectionName(string $collectionName, $data) {
		return $this->post('collections/' . $collectionName . '/documents/batchGet', $data);
	}

	/**
	 * Batch Updates Documents in a specified DocumentCollection.
	 * @throws \JsonException
	 */
	public function batchUpdateDocumentsByCollectionName(string $collectionName, $data) {
		return $this->post('collections/' . $collectionName . '/documents/batchUpdate', $data);
	}

	/**
	 * Returns specified Document from a DocumentCollection.
	 *
	 * @throws \JsonException
	 */
	public function getDocumentIdByCollectionName(string $collectionName, string $documentId) {
		return $this->get('collections/' . $collectionName . '/documents/uuid/' . $documentId);
	}

	/**
	 * Delete specified Document from a DocumentCollection.
	 *
	 * @throws \JsonException
	 */
	public function destroyDocumentIdByCollectionName(string $collectionName, string $documentId) {
		return $this->destroy('collections/' . $collectionName . '/documents/uuid/' . $documentId);
	}

	/**
	 * Updates a Document in a DocumentCollection by UUID
	 *
	 * @throws \JsonException
	 */
	public function updateDocumentIdByCollectionName(string $collectionName, string $documentId, $data) {
		return $this->patch('collections/' . $collectionName . '/documents/uuid/' . $documentId, $data);
	}

	/**
	 * Searches over documents in a collection based on provided search criteria.
	 * One of text or metadata must be provided. Returns an empty list if no documents are found.
	 *
	 * @throws \JsonException
	 */
	public function searchDocumentsByCollectionName(string $collectionName, $data) {
		return $this->post('collections/' . $collectionName . '/documents/search', $data);
	}
}