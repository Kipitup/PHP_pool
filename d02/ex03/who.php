#!/usr/bin/php
<?php
    date_default_timezone_set('Europe/Paris');
    $fp = fopen("/var/run/utmpx", "r");
    while ($utmpx = fread($fp, 628)){
        $unpacked = unpack("A256name/A4tty/A32tty_complete/iPID/iProcess/Iconnection_date", $utmpx);
        if ($unpacked['Process'] == 7) {
			$arr[] = $unpacked;
		}
    }
    fclose($fp);
    ksort($arr);
    foreach ($arr as $ele){
        echo $ele['name'], " ";
        echo $ele['tty_complete'], "  ";
        echo date("M j H:i ", $ele['connection_date']);
        echo "\n";
    }
?>
