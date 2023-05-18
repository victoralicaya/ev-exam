<?php

class CommentManager
{
	private static $instance = null;

	/**
	 * CommentManager constructor.
	 *
	 * Initializes the CommentManager object and includes necessary files.
	 */
	private function __construct()
	{
		require_once(ROOT . '/utils/DB.php');
		require_once(ROOT . '/class/Comment.php');
	}

	/**
	 * Get an instance of the CommentManager.
	 *
	 * @return CommentManager The CommentManager instance.
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}

	/**
	 * Get a list of comments.
	 *
	 * @return array An array of Comment objects representing the comments.
	 */
	public function listComments()
	{
		$db = DB::getInstance();
		$rows = $db->select('SELECT * FROM `comment`');

		$comments = [];
		foreach ($rows as $row) {
			$comment = (new Comment())
				->setId($row['id'])
				->setBody($row['body'])
				->setCreatedAt($row['created_at'])
				->setNewsId($row['news_id']);
			$comments[] = $comment;
		}

		return $comments;
	}

	/**
	 * Add a comment for a news item.
	 *
	 * @param string $body The body of the comment.
	 * @param int $newsId The ID of the news item.
	 * @return int The ID of the newly added comment.
	 */
	public function addCommentForNews($body, $newsId)
	{
		$db = DB::getInstance();
		$createdAt = date('Y-m-d');
		$sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES (?, ?, ?)";
		$db->exec($sql, [$body, $createdAt, $newsId]);
		return $db->lastInsertId();
	}

	/**
	 * Delete a comment.
	 *
	 * @param int $id The ID of the comment to delete.
	 * @return int The number of affected rows.
	 */
	public function deleteComment($id)
	{
		$db = DB::getInstance();
		$sql = "DELETE FROM `comment` WHERE `id` = ?";
		return $db->exec($sql, [$id]);
	}
}
