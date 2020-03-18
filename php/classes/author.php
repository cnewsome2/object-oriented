<?php
namespace CNewsome2\ObjectOriented;

require_once("autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

class author {
	use ValidateUuid;

	private $authorId;

	private $authorActivationToken;

	private $authorAvatarUrl;

	private $authorEmail;

	private $authorHash;

	private $authorUsername;

	//constructor method
	public function __construct($authorId, $newAuthorActivationToken, $newAvatarUrl, $newAuthorEmail, $newAuthorHash, $newAuthorUsername) {
		try {
			$this->setAuthorId($authorId);
			$this->setnewAuthorActivationToken($newAuthorActivationToken);
			$this->setnewAvatarUrl($newAvatarUrl);
			$this->setNewAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUsername($newAuthorUsername);
		}
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	//mutator method

	public function setAuthorId($newAuthorId): void {
		try {
			$uuid = self::validateUuid($newAuthorId);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function setNewAuthorActivationToken($newAuthorActivationToken): void {
		try {
			$uuid = self::validateUuid($newAuthorActivationToken);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function setNewAvatarUrl($newAvatarUrl): void {
		try {
			$uuid = self::validateUuid($newAvatarUrl);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function setNewAuthorEmail($newAuthorEmail): void {
		try {
			$uuid = self::validateUuid($newAuthorEmail);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function setAuthorHash($newAuthorId): void {
		try {
			$uuid = self::validateUuid($newAuthorId);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function setAuthorUsername($newAuthorUsername): void {
		try {
			$uuid = self::validateUuid($newAuthorUsername);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
}

//accessor method

	public function getAuthorId() : Uuid {
		return($this->AuthorId);
	}

	public function getAuthorActivationToken() : Uuid {
		return($this->authorActivationToken);
	}

	public function getAuthorUrl() : Uuid {
		return($this->authorAvatarUrl);
	}

	public function getAuthorEmail() : Uuid {
		return($this->authorEmail);
	}

	public function getAuthorHash() : Uuid {
		return($this->authorHash);
	}
	public function getAuthorUsername() : Uuid {
		return($this->authorUsername);
	}
}




