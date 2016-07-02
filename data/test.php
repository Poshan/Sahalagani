<?php
// require_once("session.php");
function getdb() {
$host =     'localhost';
$database = 'sahalagani1';
$user =     'postgres';
$pass =     'lkponm';
  $db = pg_connect("host=$host dbname=$database user=$user password=$pass") or die('connection failed');
  return $db;
}
$connection = getdb();
$maxid = "SELECT max(projectid) from projects";
$res = pg_query($connection,$maxid);
$row = pg_fetch_all($res);
print_r($row);
$first = $row[0];
print_r($first);
$val = $first['max'];
echo $val;
?>
