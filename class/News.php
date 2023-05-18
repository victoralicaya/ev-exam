<?php

class News
{
	protected $id;
	protected $title;
	protected $body;
	protected $createdAt;

	/**
	 * Set the news ID.
	 *
	 * @param int $id The news ID.
	 * @return News The News object.
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * Get the news ID.
	 *
	 * @return int The news ID.
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the news title.
	 *
	 * @param string $title The news title.
	 * @return News The News object.
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * Get the news title.
	 *
	 * @return string The news title.
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set the news body.
	 *
	 * @param string $body The news body.
	 * @return News The News object.
	 */
	public function setBody($body)
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * Get the news body.
	 *
	 * @return string The news body.
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Set the creation date of the news.
	 *
	 * @param string $createdAt The creation date of the news.
	 * @return News The News object.
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * Get the creation date of the news.
	 *
	 * @return string The creation date of the news.
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}
}
