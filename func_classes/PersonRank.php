<?php
require_once 'dbConnect.php';
$con = new dbConnect();
//if session not started -> start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
////////////////////////////////////////////////////////////////////////////////
//Do the query
$query = "SELECT * FROM ranks";
$result = mysql_query($query);
//iterate over all the rows
while($row = mysql_fetch_row($result))
{
    $_SESSION["$row[1]"] = $row[0];
}