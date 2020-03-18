<?php
namespace cnewsome2/objectoriented;

require_once("autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

class author
use ValidateDate;
use ValidateUuid;



	public function jsonSerialize() : array {
	$fields = get_object_vars($this);

	$fields["tweetId"] = $this->tweetId->toString();
	$fields["tweetProfileId"] = $this->tweetProfileId->toString();

	//format the date so that the front end can consume it
	$fields["tweetDate"] = round(floatval($this->tweetDate->format("U.u")) * 1000);
	return($fields);