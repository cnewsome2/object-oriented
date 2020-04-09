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
		self::assertEquals($numRows + 1 , $numRowsAfterInsert);

		//get a copy of the record just inserted and validate the values
		// make sure the values that went into the record are the same ones that come out.
	}

//	public function testDeleteValidAuthor(): void {
//	}
//
//	public function testUpdateValidAuthor(): void {
//	}
//
//	public function testGetValidAuthorByAuthorId(): void {
//	}
//
//	public function testGetAuthorbyAuthorUsername(): void {
//	}
}

