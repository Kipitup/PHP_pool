<?php
$filename = "../private/passwd";
if ($_POST[login] === "" || $_POST[oldpw] === "" || $_POST[newpw] === "" || $_POST[submit] !== "OK")
{
	echo "ERROR\n";
	exit ;
}
$file_content = file_get_contents($filename);
$database = unserialize($file_content);
foreach ($database as $key => $value)
{
	if ($value[login] === $_POST[login])
	{
		if ($value[passwd] === hash("whirlpool", $_POST[oldpw]))
		{
			$database[$key][passwd] = hash("whirlpool", $_POST[newpw]);
			$passwd_str = serialize($database);
			file_put_contents($filename, $passwd_str);
			echo "OK\n";
			exit ;
		}
	}
}
echo "ERROR\n";
exit ;
?>
