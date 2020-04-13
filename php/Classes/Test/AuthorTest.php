<?php
namespace CNewsome2\ObjectOriented\Test;

use CNewsome2\ObjectOriented\Author;

//TODO remember to add this class to my Test class!!!
///Hack!! - added so this class could see DataDesignTest
require_once(dirname(__DIR__) . "/Test/DataDesignTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/autoload.php");

// grab the uuid generator
require_once(dirname(__DIR__, 2) . "/lib/uuid.php");

/**
 * Full PHPUnit test for the Author class
 *
 * This is a complete PHPUnit test of the Tweet class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Author
 * @author Corrigan Newsome
 **/

class AuthorTest extends DataDesignTest {

	private $VALID_ACTIVATION_TOKEN; //this will be done in setup
	private $VALID_AVATAR_URL = "https://dazedimg-dazedgroup.netdna-ssl.com/1050/azure/dazed-prod/1280/8/1288392.jpg";
	private $VALID_AUTHOR_EMAIL = "cnewsome2@cnm.edu";
	private $VALID_AUTHOR_HASH; //this will be done in setup
	private $VALID_USERNAME = "cnewsome2";

	public function setUp(): void {
		parent::setUp();

		$password = "password";
		$this->VALID_AUTHOR_HASH = password_hash("password", PASSWORD_ARGON2ID, ["time_cost" => 9]);;
		$this->VALID_ACTIVATION_TOKEN = bin2hex(random_bytes(16));
	}


	public function testInsertValidAuthor(): void {
		//get count of author records in db before we run the test.
		$numRows = $this->getConnection()->getRowCount("author");

		//insert an author record in the db
		$authorId = generateUuidV4()->toString();
		$author = new Author($authorId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_AVATAR_URL, $this->VALID_AUTHOR_EMAIL, $this->VALID_AUTHOR_HASH, $this->VALID_USERNAME);
		$author->insert($this->getPDO());


		//check count of author records in the db after the insert
		$numRowsAfterInsert = $this->getConnection()->getRowCount("author");
		self::assertEquals($numRows + 1, $numRowsAfterInsert);

		//get a copy of the record just inserted and validate the values
		// make sure the values that went into the record are the same ones that come out.
		$pdoAuthor = Author::getAuthorByAuthorId($this->getPDO(), $author->getAuthorId()->toString());
		self::assertEquals($authorId, $pdoAuthor->getAuthorId());
		self::assertEquals($this->VALID_ACTIVATION_TOKEN, $pdoAuthor->getAuthorActivationToken());
		self::assertEquals($this->VALID_AVATAR_URL, $pdoAuthor->getAuthorAvatarUrl());
		self::assertEquals($this->VALID_AUTHOR_EMAIL, $pdoAuthor->getAuthorEmail());
		self::assertEquals($this->VALID_AUTHOR_HASH, $pdoAuthor->getAuthorHash());
		self::assertEquals($this->VALID_USERNAME, $pdoAuthor->getAuthorUsername());

	}

	public function testUpdateValidAuthor(): void {
		//get count of author records in db before we run the test.
		$numRows = $this->getConnection()->getRowCount("author");

		//insert an author record in the db
		$authorId = generateUuidV4()->toString();
		$author = new Author($authorId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_AVATAR_URL, $this->VALID_AUTHOR_EMAIL, $this->VALID_AUTHOR_HASH, $this->VALID_USERNAME);
		$author->insert($this->getPDO());

		//update a value on the record I just inserted
		$changedAuthorUsername = $this->VALID_USERNAME . "changed";
		$author->setAuthorUsername($changedAuthorUsername);
		$author->update($this->getPDO());


		//check count of author records in the db after the insert
		$numRowsAfterInsert = $this->getConnection()->getRowCount("author");
		self::assertEquals($numRows + 1, $numRowsAfterInsert);

		//get a copy of the record just inserted and validate the values
		// make sure the values that went into the record are the same ones that come out.
		$pdoAuthor = Author::getAuthorByAuthorId($this->getPDO(), $author->getAuthorId()->toString());
		self::assertEquals($authorId, $pdoAuthor->getAuthorId());
		self::assertEquals($this->VALID_ACTIVATION_TOKEN, $pdoAuthor->getAuthorActivationToken());
		self::assertEquals($this->VALID_AVATAR_URL, $pdoAuthor->getAuthorAvatarUrl());
		self::assertEquals($this->VALID_AUTHOR_EMAIL, $pdoAuthor->getAuthorEmail());
		self::assertEquals($this->VALID_AUTHOR_HASH, $pdoAuthor->getAuthorHash());
		self::assertEquals($$changedAuthorUsername, $pdoAuthor->getAuthorUsername());
	}

	public function testDeleteValidAuthor() : void {

		//get count of author records in db before we run the test.
		$numRows = $this->getConnection()->getRowCount("author");

		$rowsInserted = 2;
		//now insert multiple rows of data
		for ($i=0; $i<$rowsInserted; $i++){
			$authorId = generateUuidV4()->toString();
			$author = new Author($authorId, $this->VALID_ACTIVATION_TOKEN,
				$this->VALID_AVATAR_URL,
				$this->VALID_AUTHOR_EMAIL . $i,
				$this->VALID_AUTHOR_HASH,
				$this->VALID_USERNAME . $i);
			$author->insert($this->getPDO());
		}

		$numRowsAfterInsert = $this->getConnection()->getRowCount("author");
		self::assertEquals($numRows + $rowsInserted, $numRowsAfterInsert);

		//now delete the last record we inserted
		$author->delete($this->getPDO());

		//try to get the last record we inserted. it should not exist.
		$pdoAuthor = Author::getAuthorByAuthorId($this->getPDO(), $author->getAuthorId()->toString());

		//validate that only one record was deleted.
		$numRowsAfterDelete = $this->getConnection()->getRowCount("author");
		self::assertEquals($numRows + $rowsInserted - 1, $numRowsAfterDelete);

	}

	public function testGetValidAuthorByAuthorId() : void {
		//how many records were in the db before we start?
		$numRows = $this->getConnection()->getRowCount("author");

		//now insert a row of data
		$authorId = generateUuidV4()->toString();
		$author = new Author($authorId, $this->VALID_ACTIVATION_TOKEN, $this->VALID_AVATAR_URL, $this->VALID_AUTHOR_EMAIL, $this->VALID_AUTHOR_HASH, $this->VALID_USERNAME);
		$author->insert($this->getPDO());

		//validate new row count in the table - should be old row count + 1 if insert is successful
		$numRowsAfterInsert = $this->getConnection()->getRowCount("author");
		self::assertEquals($numRows + 1, $numRowsAfterInsert);

		//now get the row we just inserted and verify that the data coming out of the db matches the data we put in the db
		$pdoAuthor = Author::getAuthorByAuthorId($this->getPDO(), $author->getAuthorId()->toString());
		self::assertEquals($pdoAuthor->getAuthorId(), $authorId);
		self::assertEquals($pdoAuthor->getAuthorActivationToken(), $this->VALID_ACTIVATION_TOKEN);
		self::assertEquals($pdoAuthor->getAuthorAvatarUrl(), $this->VALID_AVATAR_URL);
		self::assertEquals($pdoAuthor->getAuthorEmail(), $this->VALID_AUTHOR_EMAIL);
		self::assertEquals($pdoAuthor->getAuthorHash(), $this->VALID_AUTHOR_HASH);
		self::assertEquals($pdoAuthor->getAuthorUsername(), $this->VALID_USERNAME);
	}

	public function testGetValidAuthors() : void {
		//how many records were in the db before we start?
		$numRows = $this->getConnection()->getRowCount("author");
		$rowsInserted = 5;

		//now insert 5 rows of data
		for ($i=0; $i<$rowsInserted; $i++){
			$authorId = generateUuidV4()->toString();
			$author = new Author($authorId, $this->VALID_ACTIVATION_TOKEN,
				$this->VALID_AVATAR_URL,
				$this->VALID_AUTHOR_EMAIL . $i,
				$this->VALID_AUTHOR_HASH,
				$this->VALID_USERNAME . $i);
			$author->insert($this->getPDO());
		}

		//validate new row count in the table - should be old row count + 1 if insert is successful
		self::assertEquals($numRows + $rowsInserted, $this->getConnection()->getRowCount("author"));

		//validate number of rows coming back from our function.
		self::assertEquals($numRows + $rowsInserted, $author->getAllAuthors($this->getPDO())->count());
	}

}

