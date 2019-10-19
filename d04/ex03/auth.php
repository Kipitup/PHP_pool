<?php
function auth($login, $passwd)
{
	$filename = "../private/passwd";
	if ($login === NULL || $passwd === NULL || $login === "" || $passwd === "" )
		return (false);
	$file_content = file_get_contents($filename);
	$database = unserialize($file_content);
	foreach ($database as $key => $value)
	{
		if ($value[login] === $login)
		{
			if ($value[passwd] === hash("whirlpool", $passwd))
				return (true);
		}
	}
	return (false);
}
?>
