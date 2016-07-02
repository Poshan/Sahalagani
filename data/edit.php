<?php

	require_once("session.php");

	require_once("class.user.php");
	$auth_user = new USER();


	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<link rel="stylesheet" type="text/css" media="all" href="css/fonts7.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/screen7.css" />
<link rel="stylesheet" type="text/css" media="print" href="css/print7.css" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" type="text/css" media="screen" href="css/responsive7.css" />
<link rel="stylesheet" type="text/css" href="nepali.datepicker.v2.min.css" />
<link rel = "stylesheet" type = "text/css" href = "bootstrap.min.css" />
<script type="text/javascript" src="nepali.datepicker.v2.min.js"></script>

<title>welcome <?php print($userRow['user_name']); ?></title>
<body>
	<table id="myTable" class="table table-striped">
	<thead>
	<tr>
		<th id = "projectid">Project Id </th>
		<th id = "name">Project Name</th>
		<th id = "nepname" >Project Nepali Name</th>
		<th id = "phase">Phase</th>
		<th id = "sdate">Start Date</th>
		<th id = "cdate">Completion Date</th>
		<th id = "district">District</th>
		<th id = "vdc">VDC</th>
		<th id = "wards">Wards</th>
		<th id = "population">Population</th>
		<th id = "household">Household</th>
		<th id = "usercomm">User Community</th>
		<th id = "taps">Taps</th>
		<th id = "ptaps">Public Taps</th>
		<th>Edite</th>
		<th>Delete</th>
	</tr>
	</thead>
	<tbody class = "table-body">
	</tbody>
	</table>
	</body>
	<script type = "text/javascript">
	function editData(pid){

	}
	function deleteData(pid){

	}
	function populateTable(data){
    var data_list = JSON.parse(data);
    var length = data_list.length;
    var data_id = 0;
    var table = document.getElementById("myTable").getElementsByTagName("tbody")[0];


    for (data_id; data_id < length; data_id ++){
      var row = table.insertRow(data_id);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      var cell7 = row.insertCell(6);
      var cell8 = row.insertCell(7);
      var cell9 = row.insertCell(8);
      var cell10 = row.insertCell(9);
      var cell11 = row.insertCell(10);
      var cell12 = row.insertCell(11);
			var cell13 = row.insertCell(12);
			var cell14 = row.insertCell(13);
			var cell15 = row.insertCell(14);
			var cell16 = row.insertCell(15);
      //projectid,nepaliname,englishnam,phase,startdate,completion,district,vdc,population,household,usercomm,taps,publictaps
			//geom,wards

			cell1.innerHTML = data_list[data_id]["projectid"];
			var sn = data_list[data_id]["projectid"];

      //cell2.innerHTML ="<input type=text id = owner"+ sn +" name= owner value= " + data_list[data_id]["owner"] + ">" ;

      cell2.innerHTML ="<input type=text id = englishnam"+ sn +" name= mineral value=" + data_list[data_id]["englishnam"]  + ">" ;
      cell3.innerHTML = "<input type=text id = nepaliname"+ sn +" name= licenceno value=" + data_list[data_id]["nepaliname"]  + ">";
      cell4.innerHTML = "<input type=text id = phase"+ sn +" name= zone value=" + data_list[data_id]["phase"] + ">";
      cell5.innerHTML = "<input type=text id = startdate" + sn + " name= district value=" + data_list[data_id]["startdate"] + ">";
      cell6.innerHTML = "<input type=text id = completion" + sn + " name= location value=" + data_list[data_id]["completion"] + ">";
      cell7.innerHTML = "<input type=text id = district" + sn + " name= toposheet value=" + data_list[data_id]["district"] + ">";
      cell8.innerHTML = "<input type=text id = vdc" + sn + " name= area value=" + data_list[data_id]["vdc"] + ">";
			cell9.innerHTML = "<input type=text id = wards" + sn + " name= type value=" + data_list[data_id]["wards"] + ">";
      cell10.innerHTML = "<input type=text id = population" + sn + " name= type value=" + data_list[data_id]["population"] + ">";
			cell11.innerHTML = "<input type=text id = household" + sn + " name= type value=" + data_list[data_id]["household"] + ">";
			cell12.innerHTML = "<input type=text id = usercomm" + sn + " name= type value=" + data_list[data_id]["usercomm"] + ">";
			cell13.innerHTML = "<input type=text id = taps" + sn + " name= type value=" + data_list[data_id]["taps"] + ">";
			cell14.innerHTML = "<input type=text id = publictaps" + sn + " name= type value=" + data_list[data_id]["publictaps"] + ">";




      var button = document.createElement('button');
      button.innerHTML = "Edit";
      button.onclick = (function(opt){
        return function(){
          editData(opt);
        };
      })(data_list[data_id]["projectid"]);

     cell15.appendChild(button);

//addition of delete button
      var removeButton = document.createElement('button');
      removeButton.id = 'confirmation';
      removeButton.innerHTML = "Remove";
      removeButton.onclick = (function(opt){
        return function(){
          deleteData(opt);
        };
      })(data_list[data_id]["projectid"]);
      cell16.appendChild(removeButton);
    }

    $("#myTable").tablesorter();
  }
	$(document).ready(function() {
		$.ajax({
      url:"getprojectlist.php",
      success:function (r){
				debugger;
				console.log(r);
        populateTable(r);
      }
    });
	});


	</script>>
</html>
