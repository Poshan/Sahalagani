<html>
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/global.css"/>
</head>
<body onload = "loaded()" style="height:100%;width:100%:overflow:hidden;">
	<div class="master" style="height:100%;width:100%;overflow:auto;">

		<?php include "navbar.php" ?>

		<div class = "col-lg-12" >
			<div class = "container">
				<div class="row" style="padding-bottom:30px">
					<form class="form" id="lhForm">
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="lid">Project Name</label>
							<div class="col-sm-10">
								<input type="text" class=" form-control" id="pname" name="pname" placeholder="Project Name">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="name">Nepali Name of Project</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nepName" name="nepName" placeholder="Nepali Name">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="investor">District</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="district" name="district" placeholder="District">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="capital">VDC</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="vdc" name="vdc" placeholder="vdc">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="registration">Wards</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="ward" name="ward">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="renew">Population Affected</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="population" name="population">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="email">Household Affected</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="household" name="household" placeholder="household">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="zone">Zone</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="zone" name="zone" placeholder="Zone">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="district">Project Commencement Date</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="startdate" name="startdate" placeholder="Start Date">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="vdc">Number of Taps</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" id="taps" name="taps" placeholder="Taps">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="location">Number of Public Taps</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" id="publictap" name="publictap" placeholder="publictap">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="contact">Project Phase</label>
							<div class="col-sm-10">
								<input type="Text" class="form-control" id="phase" name="phase" placeholder="Project Phase">
							</div>
						</div>
						<div class="col-sm-12 form-group">
						    <label class="col-sm-2" for="pan">User Community</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" id="usercom" name="usercom" placeholder="User Community">
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
				      	<div class="btn-group" role="group">
				        	<button type="button" id="add" class="btn btn-default" disabled>Add</button>
				      	</div>
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


	<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>




	<script type="text/javascript">
		function loaded(){
			var ready = false,
				list,
				search_arr = [],
				sel_index_list,
				cIndex = -1,
				state_changed = false;

			refreshList();



			function refreshList(){
				$.ajax({
					url:"db/getLicenseHOlders.php",
					success:function (r){
						list  = JSON.parse(r);
						cIndex = 0;
						updateView();
						pop_lh_search(list);	//in search licenseholder.php
					}
				});
			}

			function updateView(){  /****----function to update the form view----****/
				$("#lid").val(list[cIndex].id);
				$("#name").val(list[cIndex].name);
				$("#investor").val(list[cIndex].investor);
				$("#capital").val(list[cIndex].capital);
				$("#registration").val(list[cIndex].registration);
				$("#renew").val(list[cIndex].renew);
				$("#email").val(list[cIndex].email);
				$("#zone").val(list[cIndex].zone);
				$("#district").val(list[cIndex].district);
				$("#vdc").val(list[cIndex].vdc);
				$("#location").val(list[cIndex].location);
				$("#pan").val(list[cIndex].pan);
				$("#postal").val(list[cIndex].postal);
				$("#contact").val(list[cIndex].contact);
			}

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
					alert("update");
				}
			});
			$("#add").on("click",function(e){
				c = confirm("Are u sure you want to and new entry with values above?");
				if (c){
					$.ajax({
						url:"db/addLicenseHolder.php",
						data:$("#lhForm").serialize(),
						type:'POST',
						success:function(r){
							if (r=="success") alert ("entry successfully added!");
							refreshList();
						}
					});
				}
			});
			$("#del").on("click",function(e){
				c = confirm("Are u sure you want to delete current entry?");
				if (c){
					$.ajax({
						url:"db/delLicenseHolder.php",
						data:{sn:list[cIndex].sn},
						type:'POST',
						success:function(r){
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

				tt += "<tr><th>License Id</th>";
				tt += "<th>Name</th>";
				tt += "<th>Investor Name</th>";
				tt += "<th>Capital</th>";
				tt += "<th>Registration Date</th>";
				tt += "<th>Renew Date</th>";
				tt += "<th>Email</th>";
				tt += "<th>zone</th>";
				tt += "<th>District</th>";
				tt += "<th>VDC</th>";
				tt += "<th>Location</th>";
				tt += "<th>Contact</th>";
				tt += "<th>Pan no.</th>";
				tt += "<th>Postal Address</th></tr>";
				for (i=0;i<list.length;i++){
					tt += "<tr class='data-row' ind="+i+">";
					tt += "<td>"+list[i].id+"</td>";
					tt += "<td>"+list[i].name+"</td>";
					tt += "<td>"+list[i].investor+"</td>";
					tt += "<td>"+list[i].capital+"</td>";
					tt += "<td>"+list[i].registration+"</td>";
					tt += "<td>"+list[i].renew+"</td>";
					tt += "<td>"+list[i].email+"</td>";
					tt += "<td>"+list[i].zone+"</td>";
					tt += "<td>"+list[i].district+"</td>";
					tt += "<td>"+list[i].vdc+"</td>";
					tt += "<td>"+list[i].location+"</td>";
					tt += "<td>"+list[i].contact+"</td>";
					tt += "<td>"+list[i].pan+"</td>";
					tt += "<td>"+list[i].postal+"</td>";
					tt += "</tr>";

					search_arr_text = list[i].id+"*-*"+list[i].name+"*-*"+list[i].investor+"*-*"+list[i].capital+"*-*"+list[i].registration+"*-*"+list[i].renew;
					search_arr_text += "*-*"+list[i].email +"*-*"+list[i].zone +"*-*"+list[i].district +"*-*"+list[i].vdc +"*-*"+list[i].location +"*-*"+list[i].contact;
					search_arr_text += "*-*"+list[i].pan +"*-*"+list[i].postal;
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

		}
	</script>
</body>
</html>
