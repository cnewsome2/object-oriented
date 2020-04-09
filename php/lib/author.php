<?php

namespace CNewsome2\ObjectOriented;
require_once (dirname(__DIR__,1)."/Classes/Author.php");


$secrets = new\Secrets("\etc\apache2\capstone-mysql\ddctwitter.ini");
$pdo = $secrets->getPdoObject();

	$authorId = "0a64a02c-885c-4ccf-8a28-2e1af3cfb84d";
	$authorActivationToken = bin2hex(random_bytes(16));
	$authorAvatarUrl = "https://dazedimg-dazedgroup.netdna-ssl.com/1050/azure/dazed-prod/1280/8/1288392.jpg";
	$authorEmail = "TigerMan@aol.com";
	$authorHash = password_hash("password", PASSWORD_ARGON2ID, ["time_cost" => 9]);;
	$authorUsername = "JoeExotic";

	$author = new Author($authorId, $authorActivationToken, $authorAvatarUrl, $authorEmail, $authorHash, $authorUsername);

	var_dump($author);

