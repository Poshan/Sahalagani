<?php
  require_once("session.php");
  require_once("class.user.php");
  //include_once("geoPHP/geoPHP.inc");
  $auth_user = new USER();
  $user_id = $_SESSION['user_session'];
  $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

  $pName = $_POST['name'];
  $npName = $_POST['nepname'];
  $district = $_POST['district'];
  $vdc = $_POST['vdc'];
  $ward = $_POST['ward'];
  $population = (int)$_POST['population'];
  $household = (int)$_POST['household'];
  $taps = (int)$_POST['taps'];
  $pTaps = (int)$_POST['pubTaps'];
  $pPhase = $_POST['phase'];
  $sDate = $_POST['startdate'];
  $cDate = $_POST['completionDate'];
  $location = $_POST['location'];
  $pieces = explode(",", $location);
  $long = $pieces[0];
  $lat = $pieces[1];

  // $pName = "test";
  // $npName = "test";
  // $district = "test";
  // $vdc = "test";
  // $ward = "test";
  // $population = 1000;
  // $household = 500;
  // $taps = 50;
  // $pTaps = 5;
  // $pPhase = "completed";
  // $sDate = "test";
  // $cDate = "test";
  // $location = "87,26";
  // $pieces = explode(",", $location);
  // $long = $pieces[0];
  // $lat = $pieces[1];


  //get max project id

  //connect to the database


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
  $intval = (int)$val;
  $plusone = $intval + 1;


	$sql = "INSERT INTO projects(projectid, englishnam, nepaliname, phase, startdate, completion, district, vdc, wards, population, household, taps, publictaps geom) VALUES('$plusone', '$pName', '$npName', '$pPhase', '$sDate', '$cDate', '$district', '$vdc', '$ward', '$population', '$household', '$taps', '$pTaps' ST_SetSRID(ST_MakePoint($long, $lat), 4326))";
	pg_query($connection, $sql);
	// echo $sql;


?>
