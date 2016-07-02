<?php
  // echo 'query data and show all data';

  function getdb() {
  $host =     'localhost';
  $database = 'sahalagani1';
  $user =     'postgres';
  $pass =     'lkponm';
    $db = pg_connect("host=$host dbname=$database user=$user password=$pass") or die('connection failed');
    return $db;
  }
  $query = "SELECT * from projects";
  $connection = getdb();
  $res = pg_query($connection,$query);
  $data_inco = array();
  foreach (pg_fetch_all($res) as $row){
    $data_inco["projectid"] = $row["projectid"];
    $data_inco["nepaliname"] = $row["nepaliname"]; //OGR_FID
    $data_inco["englishnam"] = $row["englishnam"]; //mineral
    $data_inco["phase"] = $row["phase"];
    $data_inco["startdate"] = $row["startdate"];
    $data_inco["completion"] = $row["completion"];
    $data_inco["district"] = $row["district"];
    $data_inco["vdc"] = $row["vdc"];
    $data_inco["population"] = $row["population"];
    $data_inco["household"] = $row["household"];
    $data_inco["usercomm"] = $row["usercomm"];
    $data_inco["taps"] = $row["taps"];
    $data_inco["publictaps"] = $row["publictaps"];
    $data_inco["geom"] = $row["geom"];
    $data_inco["wards"] = $row["wards"];
    $data[] = $data_inco;
  }
  echo json_encode($data);
 ?>
