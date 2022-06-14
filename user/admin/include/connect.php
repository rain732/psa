<?php
/*

check on the admin ...
*/

$sname= "localhost";

$unmae= "root";

$password = "732000";

$db_name = "psa";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";
}
