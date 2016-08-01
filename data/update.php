<?php
  function getdb() {
    $host =     'localhost';
    $database = 'sahalagani1';
    $user =     'postgres';
    $pass =     'lkponm';
    $db = pg_connect("host=$host dbname=$database user=$user password=$pass") or die('connection failed');
    return $db;
  }
  function checknull($a){
    if (empty($a)){
      return 'N/A';
    }
  }
  function checknonull($b){
    if (empty($b)){
      return '0';
    }
  }

  $connection = getdb();
  try{
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $nepname = $_POST['nepname'];
    $pphase = $_POST['pphase'];
    $startdate = $_POST['startdate'];
    $completion = $_POST['completiondate'];
    $district = $_POST['district'];
    $vdc = $_POST['vdc'];
    $ward = $_POST['ward'];
    $population = $_POST['population'];
    $household = $_POST['household'];
    $usercomm = $_POST['usercomm'];
    $taps = $_POST['taps'];
    $publictaps = $_POST['publictaps'];


    $sql = "UPDATE projects SET englishnam = '$pname', nepaliname = '$nepname', phase = '$pphase', startdate = '$startdate', completion = '$completion', district = '$district', vdc = '$vdc', wards = '$ward', population = '$population', household = '$household', usercomm = '$usercomm', taps = '$taps', publictaps = '$publictaps' WHERE projectid = '$pid'";
    pg_query($connection,$sql);
    echo 'success';
  }
  catch(Exception $e){
    echo 'failed';
  }
?>>
