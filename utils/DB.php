<?php

class DB
{
	private $pdo;

	private static $instance = null;

	/**
	 * DB constructor.
	 *
	 * Establishes a database connection using PDO.
	 */
	private function __construct()
	{
		$dsn = 'mysql:dbname=phptest;host=127.0.0.1';
		$user = 'root';
		$password = '';

		$this->pdo = new \PDO($dsn, $user, $password);
	}

	/**
	 * Get an instance of the DB class.
	 *
	 * @return DB The DB instance.
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
	 * Execute a SELECT query and fetch all rows.
	 *
	 * @param string $sql The SQL query.
	 * @return array An array of rows.
	 */
	public function select($sql)
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll();
	}

	/**
	 * Execute an SQL statement.
	 *
	 * @param string $sql The SQL statement to execute.
	 * @return int The number of affected rows.
	 */
	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}

	/**
	 * Get the ID of the last inserted row.
	 *
	 * @return string The last inserted ID.
	 */
	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}
