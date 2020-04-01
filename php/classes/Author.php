<?php
namespace CNewsome2\ObjectOriented;

require_once("autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");

use mysql_xdevapi\TableInsert;
use Ramsey\Uuid\Uuid;

class Author {
	use ValidateUuid;

	private $authorId;

	private $authorActivationToken;

	private $authorAvatarUrl;

	private $authorEmail;

	private $authorHash;

	private $authorUsername;

	//constructor method
	public function __construct($newAuthorId, $newAuthorActivationToken, $newAuthorAvatarUrl, $newAuthorEmail, $newAuthorHash, $newAuthorUsername) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorActivationToken($newAuthorActivationToken);
			$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
			$this->setNewAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUsername($newAuthorUsername);
		}
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function setAuthorId($newAuthorId): void {
		try {
			$uuid = self::validateUuid($newAuthorId);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getAuthorId() : Uuid {
		return($this->authorId);
	}

	public function setAuthorActivationToken($newAuthorActivationToken): void {
		try {
			$uuid = self::validateUuid($newAuthorActivationToken);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getAuthorActivationToken() : Uuid {
		return($this->authorActivationToken);
	}

	public function setAuthorAvatarUrl($newAuthorAvatarUrl): void {
		try {
			$uuid = self::validateUuid($newAuthorAvatarUrl);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getAuthorAvatarUrl() : Uuid {
		return($this->authorAvatarUrl);
	}

	public function setNewAuthorEmail($newAuthorEmail): void {
		try {
			$uuid = self::validateUuid($newAuthorEmail);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getAuthorEmail() : Uuid {
		return($this->authorEmail);
	}

	public function setAuthorHash($newAuthorId): void {
		try {
			$uuid = self::validateUuid($newAuthorId);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getAuthorHash() : Uuid {
		return($this->authorHash);
	}

	public function setAuthorUsername($newAuthorUsername): void {
		try {
			$uuid = self::validateUuid($newAuthorUsername);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getAuthorUsername() : Uuid {
		return($this->authorUsername);
	}
}

//Insert statement

/*INSERT INTO author (authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorUsername);
VALUES (:authorId, :authorActivationToken, :authorAvatarUrl, :authorEmail, authorUsername);

//Update Statement

UPDATE author
SET authorActivationToken = :authorActivationToken,
	authorAvatarUrl = :authorAvatarUrl,
	authorEmail = :authorEmail,
	authorUsername = :authorUsername;

WHERE authorId = someAuthorId,
	authorActivationToken = someAuthorActivationToken,
	authorAvatarUrl = someAvatarUrl,
	authorEmail = someAuthorEmail,
	authorUsername = someAuthorUsername;

//Delete Statement
DELETE FROM author
WHERE authorId = someauthorId,
	authorActivationToken = someAuthorActivationToken,
	authorAvatarUrl = someAvatarUrl,
	authorEmail = someAuthorEmail,
	authorUsername = someAuthorUsername;

//Foo By Bar
SELECT authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorUsername
WHERE
	authorId = someAuthorId,
	authorActivationToken = someAuthorActivationToken,
	authorAvatarUrl = someAvatarUrl,
	authorEmail = someAuthorEmail,
	authorUsername = someAuthorUsername;
*/
