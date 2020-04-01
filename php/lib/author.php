

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use CNewsome2\ObjectOriented\Author;

INSERT INTO author (authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorUsername);
VALUES (:authorId, :authorActivationToken, :authorAvatarUrl, :authorEmail, authorUsername);

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

DELETE
FROM author
WHERE authorId = someauthorId,
	authorActivationToken = someAuthorActivationToken,
	authorAvatarUrl = someAvatarUrl,
	authorEmail = someAuthorEmail,
	authorUsername = someAuthorUsername;

SELECT authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorUsername
WHERE
	authorId = someAuthorId,
	authorActivationToken = someAuthorActivationToken,
	authorAvatarUrl = someAvatarUrl,
	authorEmail = someAuthorEmail,
	authorUsername = someAuthorUsername;




