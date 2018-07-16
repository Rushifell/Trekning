<?php
function getExceptions() {
	$config = parse_ini_file('config.ini');
	$con = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
	if (mysqli_connect_errno()) {
  		die('Could not connect: ' . mysqli_connect_error());
  	}
	$sql="SELECT nummer FROM trukket ORDER BY nummer ASC";
	$return = array();	
	$result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result))
  	{
		array_push($return,$row[0]);
	}

	mysqli_close($con);
	return $return;	
}

function addException($exception) {
	$config = parse_ini_file('config.ini');
	$con = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
	if (mysqli_connect_errno()) {
  		die('Could not connect: ' . mysqli_connect_error());
  	}
	$sql="INSERT INTO trukket VALUES (".$exception.")";
	mysqli_query($con, $sql);
	mysqli_close($con);
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

