<?php

class NewsManager
{
	private static $instance = null;

	/**
	 * NewsManager constructor.
	 *
	 * Initializes the NewsManager object and includes necessary files.
	 */
	private function __construct()
	{
		require_once(ROOT . '/utils/DB.php');
		require_once(ROOT . '/utils/CommentManager.php');
		require_once(ROOT . '/class/News.php');
	}

	/**
	 * Get an instance of the NewsManager.
	 *
	 * @return NewsManager The NewsManager instance.
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
	 * List all news items.
	 *
	 * @return array An array of News objects representing the news items.
	 */
	public function listNews()
	{
		$db = DB::getInstance();
		$rows = $db->select('SELECT * FROM `news`');

		$all_news = [];
		foreach ($rows as $row) {
			$news = (new News())
				->setId($row['id'])
				->setTitle($row['title'])
				->setBody($row['body'])
				->setCreatedAt($row['created_at']);
			$all_news[] = $news;
		}

		return $all_news;
	}

	/**
	 * Add a news item.
	 *
	 * @param string $title The title of the news item.
	 * @param string $body The body of the news item.
	 * @return int The ID of the newly added news item.
	 */
	public function addNews($title, $body)
	{
		$db = DB::getInstance();
		$createdAt = date('Y-m-d');
		$sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES (?, ?, ?)";
		$db->exec($sql, [$title, $body, $createdAt]);
		return $db->lastInsertId();
	}

	/**
	 * Delete a news item and its associated comments.
	 *
	 * @param int $id The ID of the news item to delete.
	 * @return int The number of affected rows.
	 */
	public function deleteNews($id)
	{
		$comments = CommentManager::getInstance()->listComments();
		$idsToDelete = [];

		foreach ($comments as $comment) {
			if ($comment->getNewsId() == $id) {
				$idsToDelete[] = $comment->getId();
			}
		}

		foreach ($idsToDelete as $id) {
			CommentManager::getInstance()->deleteComment($id);
		}

		$db = DB::getInstance();
		$sql = "DELETE FROM `news` WHERE `id` = ?";
		return $db->exec($sql, [$id]);
	}
}
