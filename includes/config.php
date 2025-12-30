<?php
# Konek ke Web Server Lokal
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "rental_eria";

$koneksidb = @mysqli_connect($myHost, $myUser, $myPass, $myDbs);
if (! $koneksidb) {
    $errno = mysqli_connect_errno();
    $err = mysqli_connect_error();
    if ($errno === 1049) { // Unknown database
        die("Fatal error: Unknown database '{$myDbs}' (MySQL error {$errno}).<br><br>Fix: Create the database and import the SQL dump at `database/rental_eria.sql` via phpMyAdmin (http://localhost/phpmyadmin) or from command line:<br><code>mysql -u {$myUser} -p {$myDbs} &lt; database/rental_eria.sql</code>");
    } else {
        die("Failed to connect to MySQL (Error {$errno}): {$err}");
    }
}

?>