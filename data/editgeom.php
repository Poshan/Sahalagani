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
<style>
	.topbar{
		display: block;
		height: 50px;
		background-color: #f1f1f1;
	}
	.search-master{
		position:absolute;top:0;left:0;height:100%; width:100%; background:rgba(0,0,0,0.5);visibility:hidden;
	}
	.col-lg-12 .container{
		padding-top: 55px;
	}
</style>

<title>welcome <?php print($userRow['user_name']); ?></title>
<body>
	<!-- <table id="myTable" class="table table-striped">
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
	</table>-->
	<nav class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">Edit Mode</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li class="inactive"><a href="http://gis.dwss.gov.np/sahalagani">Back to Maps</a></li>

	          </ul>
			  <ul class = "nav navbar-nav">
					<li class="inactive"><a id = "edit" href="http://gis.dwss.gov.np/sahalagani/data/home.php">Add New Records</a></li>
			  </ul>
				<ul class = "nav navbar-nav">
					<li class="active"><a id = "edit" href="http://gis.dwss.gov.np/sahalagani/data/editgeom.php">Edit Geometry</a></li>
			  </ul>
	          <ul class="nav navbar-nav navbar-right">

	            <li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log Out</a></li>
	              </ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
	<div class = "col-lg-12" >
		<div class = "container">
			<div class="row" style="padding-bottom:30px">
				<form class="form" id="lhForm">
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="pid">Project Id</label>
						<div class="col-sm-10">
							<input type="text" class=" form-control" id="pid" name="pid" placeholder="Project Id">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="pname"> Project Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="pname" name="pname" placeholder="Project Name">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="nepname">Project Nepali Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nepname" name="nepname" placeholder="Nepali Name (Unicode)">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="pphase">Project Phase</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="pphase" name="pphase" placeholder="Project Phase">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="registration">Start Date</label>
						<div class="col-sm-10">
							<input type="text" id="startdate" name = "startdate" class="nepali-calendar" value=""/>
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="renew">Completion date</label>
						<div class="col-sm-10">
							<input type="text" id="completiondate" name = "completiondate" class="nepali-calendar" value=""/>
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="district">District</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="district" name="district" placeholder="Project District/s">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="vdc">VDC</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="vdc" name="vdc" placeholder="VDC/s">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="ward">Ward</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="ward" name="ward" placeholder="Ward/s">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="population">Population</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="population" name="population" placeholder="Population Affected">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="household">Household</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="household" name="household" placeholder="household Affected">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="usercomm">User Community</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="usercomm" name="usercomm" placeholder="Name of User Community">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="pan">Taps</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="taps" name="taps" placeholder="Total No. of Taps">
						</div>
					</div>
					<div class="col-sm-12 form-group">
							<label class="col-sm-2" for="publictaps">Public Taps</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="publictaps" name="publictaps" placeholder="No. of public Taps">
						</div>
					</div>
				</form>
			</div>
			<div class = "row" style="padding-bottom:30px">
				<div class="btn-group btn-group-justified" role="group" aria-label="...">
					<div class="btn-group" role="group">
								<button type="button" id="first" class="btn btn-default">|&lt;</button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" id="prev" class="btn btn-default">&lt;</button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" id="update" class="btn btn-default" disabled>Update</button>
							</div>
							<!-- <div class="btn-group" role="group">
								<button type="button" id="add" class="btn btn-default" disabled>Add</button>
							</div> -->
							<div class="btn-group" role="group">
								<button type="button" id="search" class="btn btn-default">Search</button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" id="del" class="btn btn-default" >Delete</button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" id="next" class="btn btn-default">&gt;</button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" id="last" class="btn btn-default">&gt;|</button>
							</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="search-master">
	<div style="margin:5%;padding:5%;background:white;overflow:auto;max-height:80%;max-width:100%">
		<div id="search-box" >
			<div class="col-sm-12 form-group">
				<div class="col-sm-10">
					<input class="form-control" id="quicksearch" placeholder="QuickSearch">
				</div>
			</div>
		</div>
		<table class="table search-table">

		</table>
		<button type="button" id="sea_ok" class="btn btn-default">Ok</button>
		<button type="button" id="sea_cancel" class="btn btn-default">Cancel</button>
	</div>
</div>

	</body>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type = "text/javascript">
	/*function editData(pid){

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
  }*/
	$(document).ready(function() {
		// $.ajax({
    //   url:"getprojectlist.php",
    //   success:function (r){
		// 		debugger;
		// 		console.log(r);
    //     populateTable(r);
    //   }
    // });
		function updateView(){  /****----function to update the form view----****/
			$("#pid").val(list[cIndex].projectid);
			$("#pname").val(list[cIndex].englishnam);
			$("#nepname").val(list[cIndex].nepaliname);
			$("#pphase").val(list[cIndex].phase);
			$("#startdate").val(list[cIndex].startdate);
			$("#completiondate").val(list[cIndex].completion);
			$("#district").val(list[cIndex].district);
			$("#vdc").val(list[cIndex].vdc);
			$("#ward").val(list[cIndex].wards);
			$("#population").val(list[cIndex].population);
			$("#household").val(list[cIndex].household);
			$("#usercomm").val(list[cIndex].usercomm);
			$("#taps").val(list[cIndex].taps);
			$("#publictaps").val(list[cIndex].publictaps);
		}
		function refreshList(){
			$.ajax({
				url:"getprojectlist.php",
				success:function (r){
					list  = JSON.parse(r);
					cIndex = 0;
					updateView();
					pop_lh_search(list);	//in search licenseholder.php
				}
			});
		}
		var ready = false,
			list,
			search_arr = [],
			sel_index_list,
			cIndex = -1,
			state_changed = false;

		refreshList();

		/****--------navigation controls--------****/
		$("#first").on("click",function(e){
			if (cIndex>0){
				cIndex = 0;
				updateView();
			}
		});
		$("#prev").on("click",function(e){
			if (cIndex>0) {
				cIndex--;
				updateView();
			}
		});
		$("#next").on("click",function(e){
			if ((cIndex>=0) && (cIndex<(list.length-1)) ){
				cIndex++;
				updateView();
			}
		});
		$("#last").on("click",function(e){
			if (cIndex<(list.length-1)){
				cIndex = list.length-1;
				updateView();
			}
		});
		$("#update").on("click",function(e){
			c = confirm("Are u sure you want to update the entry with new values?");
			if (c){
        $.ajax({
  				url:"update.php",
  				data:$("#lhForm").serialize(),
  				type: 'POST',
  				success: function(r){
						debugger;
            refreshList();
  				}
        });
			}
		});
		// $("#add").on("click",function(e){
		// 	c = confirm("Are u sure you want to and new entry with values above?");
		// 	if (c){
		// 		$.ajax({
		// 			url:"db/addLicenseHolder.php",
		// 			data:$("#lhForm").serialize(),
		// 			type:'POST',
		// 			success:function(r){
		// 				if (r=="success") alert ("entry successfully added!");
		// 				refreshList();
		// 			}
		// 		});
		// 	}
		// });
		$("#del").on("click",function(e){
			c = confirm("Are u sure you want to delete current entry?");
			if (c){
				$.ajax({
					url:"delete.php",
					data:{sn:list[cIndex].projectid},
					type:'POST',
					success:function(r){
						debugger;
						if (r=="success") alert ("the entry has been successfully deleted!");
						refreshList();
					}
				});
			}
		});
		$("#search").on("click",function(e){
			$(".search-master").css("visibility","visible");
		});


		/****----------operation controls---------****/
		$("input").on("change",function(e){
			state_changed = true;
			$("#update").removeAttr("disabled");
			$("#add").removeAttr("disabled");
		});


		/***-------------search box popup --------------***/
		$("#search-box").on('load',function(){
			pop_lh_search(list);
		});

		var select_ind, qs_trigger = false,select_tr;

		function pop_lh_search(list){
			var tt = "";

			tt += "<tr><th>Project Id</th>";
			tt += "<th>Project Name</th>";
			tt += "<th>Project Nepali Name</th>";
			tt += "<th>Project Phase</th>";
			tt += "<th>Start Date</th>";
			tt += "<th>Completion Date</th>";
			tt += "<th>District</th>";
			tt += "<th>VDC</th>";
			tt += "<th>Wards</th>";
			tt += "<th>Population</th>";
			tt += "<th>Household</th>";
			tt += "<th>User Community</th>";
			tt += "<th>Taps</th>";
			tt += "<th>Public Taps</th></tr>";
			for (i=0;i<list.length;i++){
				tt += "<tr class='data-row' ind="+i+">";
				tt += "<td>"+list[i].projectid+"</td>";
				tt += "<td>"+list[i].englishnam+"</td>";
				tt += "<td>"+list[i].nepaliname+"</td>";
				tt += "<td>"+list[i].phase+"</td>";
				tt += "<td>"+list[i].startdate+"</td>";
				tt += "<td>"+list[i].completion+"</td>";
				tt += "<td>"+list[i].district+"</td>";
				tt += "<td>"+list[i].vdc+"</td>";
				tt += "<td>"+list[i].wards+"</td>";
				tt += "<td>"+list[i].population+"</td>";
				tt += "<td>"+list[i].household+"</td>";
				tt += "<td>"+list[i].usercomm+"</td>";
				tt += "<td>"+list[i].taps+"</td>";
				tt += "<td>"+list[i].publictaps+"</td>";
				tt += "</tr>";

				search_arr_text = list[i].projectid+"*-*"+list[i].englishnam+"*-*"+list[i].nepaliname+"*-*"+list[i].phase+"*-*"+list[i].startdate+"*-*"+list[i].completion;
				search_arr_text += "*-*"+list[i].district +"*-*"+list[i].vdc +"*-*"+list[i].wards +"*-*"+list[i].population +"*-*"+list[i].household +"*-*"+list[i].usercomm;
				search_arr_text += "*-*"+list[i].taps +"*-*"+list[i].publictaps;
				search_arr.push(search_arr_text);

			}

			$(".search-table").empty();
			$(".search-table").append(tt);

			/*$(".data-row").hover(
				function(){
					$(this).css("background-color","lightgray");
				},
				function(){
					$(this).css("background-color","inherit");
				}
			);*/

			$(".data-row").on("click",function(){
				select_ind = $(this).attr("ind");
				$(this).css("background-color","gray");
				if (select_tr !== undefined) select_tr.css("background-color","inherit");
				select_tr = $(this);
			});
		}

		$("#sea_ok").on('click',function(){
			if (qs_trigger){
				cIndex = sel_ind_list[select_ind];
			}
			else cIndex = select_ind;
			updateView();
			$(".search-master").css("visibility","hidden");
		});

		$("#sea_cancel").on('click',function(){
			$(".search-master").css("visibility","hidden");
		});

		$("#quicksearch").on("keyup",function(e){
			qs_text = $("#quicksearch").val().trim();
			var temp_list = [];
			if (qs_text!= ""){
				qs_trigger = true;
				sel_ind_list = [];
				for (var i = 0; i < list.length; i++){
					if (search_arr[i].indexOf(qs_text) > -1 ){
						temp_list.push(list[i]);
						sel_ind_list.push(i);
					}
				}
			}
			else {
				qs_trigger = false;
				temp_list = list;
				sel_ind_list = [];
			}
			pop_lh_search(temp_list);
		});

		$('#start-date').nepaliDatePicker({
			ndpEnglishInput: 'englishDate'
		});

		//nepali date project completion date
		$('#termination-date').nepaliDatePicker({
			ndpEnglishInput: 'englishDate'
		});
	});


	</script>
</html>
