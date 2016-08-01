<?php
  function getdb() {
    $host =     'localhost';
    $database = 'sahalagani1';
    $user =     'postgres';
    $pass =     'lkponm';
    $db = pg_connect("host=$host dbname=$database user=$user password=$pass") or die('connection failed');
    return $db;
  }
  $connection = getdb();
  try{
    $pid = $_POST['sn'];
    $sql = "DELETE from projects where projectid = '$pid'";
    pg_query($connection,$sql);
    echo 'success';
  }
  catch(Exception $e){
    echo 'failed';
  }
?>>
