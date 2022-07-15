<?php

$countfile = "counter.txt";
// location of site statistics.
$statsfile = "stats.txt";

// checks whether the file exist, if not then server will create it.
if (file_exists($countfile))
 {
// open the counter hit file.
$fp = fopen($countfile, "r"); 
// reads the counter hit file and gets the size of the file.
$output = fread($fp, filesize($countfile));

// close the counter hit file.
fclose($fp); 

// get the integer value of the variable.
$count = intval($output);
}

// if file is doesn't exist, the server will create the counter hit file and gives a value of zero.
else
 { 
$count = 0;
}

// showcount function starts here.
function ShowCount()
 { 

// declares the global variables.
global $ShowCount, $countfile, $statsfile, $count;

// get the current month.
$month = date('m');

// get the current day.
$day = date('d');

// get the current year.
$year = date('Y');

// get the current hour.
$hour = date('G');

// get the current minute.
$minute = date('i');

// get the current second.
$second = date('s');

// this is the date used in the stats file
$date = "$month/$day/$year $hour:$minute:$second";

// this is the remote IP address of the user.
$remoteip = getenv("REMOTE_ADDR");

// some of the browser details of the user.
$otherinfo = getenv("HTTP_USER_AGENT");

// retrieve the last URL where the user visited before visiting the current file.
$ref = getenv("HTTP_REFERER");

// open the statistics file. 
$fp = fopen($statsfile, "a");

// put the given data into the statistics file.
fputs($fp, "Remote Address: $remoteip | ");
fputs($fp, "Information: $otherinfo | ");
fputs($fp, "Date: $date | ");
fputs($fp, "Referer: $ref\n");

// close the statistics file.
fclose($fp);

// adds 1 count to the counter hit file.
$count++;

// open the counter hit file.
$fp = fopen($countfile, "w");

// write at the counter hit file.
// if the value is 34, it will be changed to 35.
fwrite($fp, $count);

// close the counter hit file.
fclose($fp);

// showcount variable is equal to count variable.
$ShowCount = $count;

// return the value of the count variable into showcount variable.
return $ShowCount;
}

// display the value in the counter hits file.
echo showcount(), " visits <br>";


?>