<?php
require_once (dirname(__DIR__,1)."/Classes/Author.php");
//use Author;

function bar () {

	$authorId = "3134e90a-e3a5-4df2-abff-7cc7d8324530";

	$authorActivationToken = 'o9Ab6bi0la4erYkGE9xo9ZFoTGE9x750';

	$authorAvatarUrl = "https://avatars.com";

	$authorHash = "3ce7418e3ce7418e3ce7418e3ce7418e";

	$authorUsername = "David21";

	$authorEmail = "David21@gmail.com";

	$author = new CNewsome2\ObjectOriented\Author($authorId, $authorActivationToken, $authorAvatarUrl, $authorEmail, $authorHash, $authorUsername);
	var_dump($author);
	echo "$authorEmail, $authorActivationToken, $authorHash";
}

bar();
