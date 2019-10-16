#!/usr/bin/php
<?php
if ($argc != 2)
	return ;
$tab = explode(" ", $argv[1]);
$day = $tab[0];
$nb = intval($tab[1]);
$month = $tab[2];
$year = intval($tab[3]);
$time = explode(":", $tab[4]);
$hour = intval($time[0]);
$min = intval($time[1]);
$sec = intval($time[2]);
$check = true;
if (preg_match("/(^[Ll]undi$|^[Mm]ardi$|^[Mm]ercredi$|^[Jj]eudi$|^[Vv]endredi$|^[Ss]amedi$|^[Dd]imanche$)/", $day) === 0)
	$check = false;
if (strlen($tab[1]) > 2 || $nb < 1 || $nb > 31)
	$check = false;
if (preg_match("/(^[Jj]anvier$|^[Ff]evrier$|^[Mm]ars$|^[Aa]vril$|^[Mm]ai$|^[Jj]uin$|^[Jj]uillet$|^[Aa]oût$|^[Ss]eptembre$|^[Oo]ctobre$|^[Nn]ovembre$|^[Dd]écembre$)/", $month) === 0)
	$check = false;
if (strlen($tab[3]) > 4)
	$check = false;
if (count($time) != 3 || strlen($time[0]) > 2 || strlen($time[1]) > 2 || strlen($time[2]) > 2 || $hour > 23 || $min > 59 || $sec > 59)
	$check = flase;
if ($check == false) {
	echo "Wrong Format\n";
	return ;
}
$tmp = array("janvier" => "01", "février" => "02", "mars" => "03", "avril" => "04",
				"mai" => "05", "juin" => "06", "juillet" => "07", "août" => "08",
				"septembre" => "09", "octobre" => "10", "novembre" => "11", "décembre" => "12");
$month[0] = strtolower($month[0]);
$month = $tmp[$month];
$timestamp = $year."-".$month."-".$nb;
$ret = date('w', strtotime($timestamp)) - 1;
$tmp = array("0" => "lundi", "1" => "mardi", "2" => "mercredi", "3" => "jeudi", "4" => "vendredi", "5" => "samedi", "6" => "dimanche");
$day_verif = $tmp[$ret];
$day[0] = strtolower($day[0]);
if ($day != $day_verif) {
	echo "Wrong Format\n";
	return ;
}
echo mktime($hour, $min, $sec, $month, $nb, $year), "\n";
?>
