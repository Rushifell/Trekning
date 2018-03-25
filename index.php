<html>
<head>
<title>Loddtreking</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
$lower = 1;
$upper = 6000;

require("getnumber.php");
if(isset($_POST["forrige"]))
{
	$exceptions = getExceptions();
	$lodd = randWithout($lower,$upper,$exceptions);
	Print "<h1>".$lodd."<//h1>";
	addException($lodd);
	Print "<form action=\"index.php\" method=\"post\">";
	Print "<input type=\"hidden\" name=\"forrige\" value=\"".$lodd."\" //>";
	Print "<input type=\"submit\" value=\"Neste Tall\" //>";
	Print "<//form>";
}
else
{
	Print "<form action=\"index.php\" method=\"post\">";
	Print "<input type=\"hidden\" name=\"forrige\" value=\"forste\" //>";
	Print "<input type=\"submit\" value=\"Trekk et tall\" //>";
	Print "<//form>";
}
?>
</body>
</html>
