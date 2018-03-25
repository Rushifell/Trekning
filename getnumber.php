<?php
function getExceptions() {
	$con = mysql_connect('localhost', 'root', 'password');
	if (!$con) {
  		die('Could not connect: ' . mysql_error());
  	}
	mysql_select_db("lodd", $con);
	$sql="SELECT nummer FROM trukket ORDER BY nummer ASC";
	$return = array();	
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
  	{
		array_push($return,$row[0]);
	}

	mysql_close($con);
	return $return;	
}

function addException($exception) {
	$con = mysql_connect('localhost', 'root', 'password');
	if (!$con) {
  		die('Could not connect: ' . mysql_error());
  	}
	mysql_select_db("lodd", $con);
	$sql="INSERT INTO trukket VALUES (".$exception.")";
	mysql_query($sql);
	mysql_close($con);
}

function randWithout($from, $to, array $exceptions) {
    //sort($exceptions); // lets us use break; in the foreach reliably
    $number = rand($from, $to - count($exceptions)); // or mt_rand()
    foreach ($exceptions as $exception) {
        if ($number >= $exception) {
            $number++; // make up for the gap
        } else /*if ($number < $exception)*/ {
            break;
        }
    }
    return $number;
}
?>

