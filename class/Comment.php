<?php

class Comment
{
	protected $id;
	protected $body;
	protected $createdAt;
	protected $newsId;

	/**
	 * Get the comment ID.
	 *
	 * @return int The comment ID.
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the comment ID.
	 *
	 * @param int $id The comment ID.
	 * @return Comment The Comment object.
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * Get the comment body.
	 *
	 * @return string The comment body.
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Set the comment body.
	 *
	 * @param string $body The comment body.
	 * @return Comment The Comment object.
	 */
	public function setBody($body)
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * Get the creation date of the comment.
	 *
	 * @return string The creation date of the comment.
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * Set the creation date of the comment.
	 *
	 * @param string $createdAt The creation date of the comment.
	 * @return Comment The Comment object.
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * Get the news ID associated with the comment.
	 *
	 * @return int The news ID associated with the comment.
	 */
	public function getNewsId()
	{
		return $this->newsId;
	}

	/**
	 * Set the news ID associated with the comment.
	 *
	 * @param int $newsId The news ID associated with the comment.
	 * @return Comment The Comment object.
	 */
	public function setNewsId($newsId)
	{
		$this->newsId = $newsId;
		return $this;
	}
}
