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
<script type="text/javascript" src="nepali.datepicker.v2.min.js"></script>
<title>welcome <?php print($userRow['user_name']); ?></title>

<style type="text/css">
/* LOOK AND FEEL */
body{
	background: #F5F5F5;
	background-size: cover;
	font-family: 'Roboto',sans-serif;
	font-size: 13px;
}

.form_table{
	width: 650px;
	margin-left: auto;
	margin-right: auto;
	border-radius: 4px;
	border: 0px solid #CCCCCC;
	background: #FFFFFF;
	background-size: cover;
	color: #333333;
	overflow: hidden;
	box-shadow: 0 1px 6px rgba(0,0,0,0.30);
}

.form_table a, .outside a{
	color: #0D47A1;
}
.form_table a:visited, .outside a:visited{
	color: #0D47A1;
}

.segment_header{
	width: auto;
	margin: 1px;
	color: #FFFFFF;
	background: #2196F3;
	background-size: cover;
	background-repeat: repeat;
	background-position: 50% 50%;
	border-radius: 4px;
}

.segment_header h1{
	border-radius: 4px;
	padding: 20px 10px;
	font-family: 'Roboto',sans-serif;
}

.q{
	padding: 10px;
	margin-bottom: 1px;
	margin-left: 1px;
	float: left;
	display: block;
}

.q .question{
	font-weight: bold;
}

.q .left_question_first{
	width: 15em;
}

.required .icon{
	background-image: none;
	background-position: left;
	background-repeat: no-repeat;
	font-size: 13px;
	padding-left: 14px;
}

.q .text_field{ /* input:text, input:password, textarea */
	background: #FAFAFA;
	border: 1px solid #CCCCCC;
	border-radius: 2px;
	border-width: 1px;
	color: #333333;
	font-family: 'Roboto',sans-serif;
	font-size: 13px;
	margin: 1px 0;
	padding: 10px;
}

.q .file_upload{ /* input:file */
	background: #FAFAFA;
	border: 1px solid #CCCCCC;
	border-radius: 2px;
	border-width: 1px;
	color: #333333;
	font-family: 'Roboto',sans-serif;
	font-size: 13px;
	margin-top: 1px;
	padding: 10px;
}

.q .file_upload_button{ /* upload button */
	margin-top: 2px;
}

.q .inline_grid td{ /* multi-choice choices */
	padding: 5px;
	vertical-align: baseline;
}

.q .drop_down{ /* select */
	background: #FAFAFA;
	border: 1px solid #CCCCCC;
	border-radius: 2px;
	border-width: 1px;
	color: #333333;
	font-family: 'Roboto',sans-serif;
	font-size: 13px;
	margin: 1px 0;
	padding: 9px;
}

.q .matrix th{
	color: #FFFFFF;
	background: #64B5F6;
	padding: 5px;
	font-weight: bold;
	text-align: center;
	vertical-align: bottom;
}

.q .matrix td{
	padding: 5px;
	text-align: center;
	white-space: nowrap;
	height: 26px;
	border-bottom: 1px solid #CCCCCC;
	border-top: 1px solid #CCCCCC;
}

.q .matrix td.question{
	border-right: 1px solid #CCCCCC;
	font-weight: normal;
}

.q .matrix .multi_scale_sub th{
	font-weight: normal;
	border-top: 1px solid #CCCCCC !important;
	background: #999999;
}

.q .matrix .multi_scale_break{
	border-right: 1px solid #CCCCCC;
}

.q .matrix_row_dark td{
	color: #333333;
	background: #FAFAFA;
}
.q .matrix_row_dark td.question{
	color: #333333;
	background: #FAFAFA;
}

.q .matrix_row_light td{
	color: #333333;
	background: #FFFFFF;
}
.q .matrix_row_light td.question{
	color: #333333;
	background: #FFFFFF;
}

.q .rating_ranking td{
	padding: 5px;
}

.q .scroller{
	border: 1px solid #CCCCCC;
}

.highlight, tr.highlight td{ /* active item highlight */
	background: #FFF9C4 !important;
}

.outside{
	color: #333333;
}

.outside_container{
	width: 650px;
	padding: 1em 0;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
	color: #333333;
}

.outside_container .submit_button{ /* submit buttons */
	color: #FFFFFF !important;
	background: #FF9800;
	background-size: auto;
	border-style: none;
	border-width: 1px;
	border-color: #FFFFFF;
	border-radius: 4px;
	text-align: center;
	font-family: 'Roboto',sans-serif;
	font-size: 14px;
	font-weight: bold;
	min-width: 30%;
	padding: 10px 20px;
	text-transform: uppercase;
	box-shadow: 0 1px 6px rgba(0,0,0,0.30);
}

.outside_container .submit_button:hover{
	background: #F57C00;
	border-color: #BBBBBB;
	background-size: auto;
}

.progressBarWrapper{
	border-radius: 4px;
	background: #FFFFFF;
	background-size: cover;
	border-color: #CCCCCC;
}

.progressBarBack{
	color: #FFFFFF;
	background-color: #FF9800;
}

.progressBarFront{
	color: #333333;
}

.ui-widget{
	font-family: 'Roboto',sans-serif;
}

.invalid{
	background: #FFEEEE;
}

.invalid .invalid_message{
	color: #FF0000;
	background: #FFEEEE;
	border: 1px solid #FF0000;
	border-radius: 2px;
}

.form_table.invalid{
	border: 2px solid #FF0000;
}

.invalid .matrix .invalid_row{
	background: #FFEEEE;
}
/* END LOOK AND FEEL */
</style>
</head>
<script>
$(document).ready(function () {
	//nepali date start date
	$('#start-date').nepaliDatePicker({
		ndpEnglishInput: 'englishDate'
	});

	//nepali date project completion date
	$('#termination-date').nepaliDatePicker({
		ndpEnglishInput: 'englishDate'
	});
	$('#edit').click(function(){
		//get the first element
		alert('edit mode');
	})
	//form submit click
	$('#FSsubmit').click(function(){
		// console.log('checking the forms filled')
		var pName = $('#RESULT_TextField-0').val();
		var npName = $('#RESULT_TextField-1').val();
		var district = $('#RESULT_TextField-2').val();
		var vdc = $('#RESULT_TextField-3').val();
		var ward = $('#RESULT_TextField-4').val();
		var population = $('#RESULT_TextField-5').val();
		var household = $('#RESULT_TextField-6').val();
		var taps = $('#RESULT_TextField-7').val();
		var pTaps = $('#RESULT_TextField-8').val();
		var pPhase = $('#RESULT_RadioButton-9').val();
		var sDate = $('#start-date').val();
		var cDate = $('#termination-date').val();
		var location = $('#RESULT_TextField-12').val();
		//debugger;
		 if (pName.length == 0){
		 	alert('Please Enter Name of Project');
		 }
		 else if (npName.length == 0) {
		 	alert('Please Enter Nepali Name of Project');
		 }
		 else if (district.length == 0) {
		 	alert('Please Enter District');
		 }
		 else if (vdc.length == 0) {
		 	alert('Please Enter VDC');
		 }
		 else if (ward.length == 0) {
		 	alert('Please Enter Ward');
		 }
		 else if (pPhase.length == 0) {
		 	alert('Please Enter Phase');
		 }
		 else if (sDate.length == 0) {
		 	alert('Please Enter Project Start Date');
		 }
		 else if (location.length == 0) {
		 	alert('Enter the Coordinates');
		 }
		else{
			$.ajax({
				url: "insertion.php",
				method: "POST",
				data: {
					name: pName,
					nepname: npName,
					district: district,
					vdc: vdc,
					ward: ward,
					population: population,
					household: household,
					taps: taps,
					pubTaps: pTaps,
					phase: pPhase,
					startdate: sDate,
					completionDate: cDate,
					location: location
				},
				datatype: 'json',
				success: function(data){
					debugger;
					alert('data entered successfully');
					//debugger;
				},
				error: function(xhr, textStatus, errorThrown){
				   alert(errorThrown)
				}
			});
		 }
	});
});

</script>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Add New Projects</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://gis.dwss.gov.np/sahalagani">Back to Maps</a></li>

          </ul>
		  <ul class = "nav navbar-nav">
			<li class="active"><a id = "edit" href="#">Edit Data</a></li>
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


    <div class="clearfix"></div>


<div class="container-fluid" style="margin-top:80px;">

    <div class="container">
        <!--addition module here-->
		<!--<form method="post" id="FSForm" action="insertion.php" enctype="application/x-www-form-urlencoded" onsubmit="">-->
		<form method="post" id="FSForm" onsubmit="">
<div style="display:none;">
<input type="hidden" name="locid" value="poshan/form1" />
<input type="hidden" name="EParam" value="AT1kKIiyxDzcpZ7AcjbkP6eLTfEDMMCuUSAE7pKjsPfOhm66yTYozk9d2/tfkxg1" />
<input type="hidden" name="ElapsedTime" id="ElapsedTime" value="0" />
<input type="hidden" name="Referrer" id="Referrer" value="" />
<input type="text" name="subject_line" id="subject_line" autocomplete="off" /><label for="subject_line">subject_line</label>
</div>

<!-- BEGIN_ITEMS -->
<div class="form_table">

<div class="clear"></div>

<div id="q0" class="q required">
<a class="item_anchor" name="ItemAnchor0"></a>
<label class="question top_question" for="RESULT_TextField-0">Project Name&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
<input type="text" name="RESULT_TextField-0" class="text_field" id="RESULT_TextField-0"  placeholder="Name of Project"  size="25" maxlength="255" value="" />
</div>
<div id="q1" class="q required">
<a class="item_anchor" name="ItemAnchor1"></a>
<label class="question top_question" for="RESULT_TextField-1">Nepali Name&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
<input type="text" name="RESULT_TextField-1" class="text_field" id="RESULT_TextField-1"  placeholder="Unicode Nepali Name"  size="25" maxlength="255" value="" />
</div>

<div class="clear"></div>

<div id="q2" class="q required">
<a class="item_anchor" name="ItemAnchor2"></a>
<label class="question top_question" for="RESULT_TextField-2">District&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
<input type="text" name="RESULT_TextField-2" class="text_field" id="RESULT_TextField-2"  placeholder="District"  size="25" maxlength="255" value="" />
</div>
<div id="q4" class="q required">
<a class="item_anchor" name="ItemAnchor3"></a>
<label class="question top_question" for="RESULT_TextField-3">VDC&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
<input type="text" name="RESULT_TextField-3" class="text_field" id="RESULT_TextField-3"  size="25" maxlength="255" value="" />
</div>
<div class="clear"></div>
<div id="q5" class="q required">
<a class="item_anchor" name="ItemAnchor4"></a>
<label class="question top_question" for="RESULT_TextField-4">Ward No&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
<input type="text" name="RESULT_TextField-4" class="text_field" id="RESULT_TextField-4"  size="25" maxlength="255" value="" />
</div>

<div class="clear"></div>
<hr>
<div id="q3" class="q">
<a class="item_anchor" name="ItemAnchor5"></a>
<label class="question top_question" for="RESULT_TextField-5">Population Affected</label>
<input type="text" name="RESULT_TextField-5" class="text_field number_field" id="RESULT_TextField-5"  size="25" maxlength="255" value="" />
</div>
<div id="q6" class="q">
<a class="item_anchor" name="ItemAnchor6"></a>
<label class="question top_question" for="RESULT_TextField-6">Households Affected</label>
<input type="text" name="RESULT_TextField-6" class="text_field number_field" id="RESULT_TextField-6"  size="25" maxlength="255" value="" />
</div>

<div class="clear"></div>

<div id="q7" class="q">
<a class="item_anchor" name="ItemAnchor7"></a>
<label class="question top_question" for="RESULT_TextField-7">Total No. of Taps</label>
<input type="text" name="RESULT_TextField-7" class="text_field number_field" id="RESULT_TextField-7"  size="25" maxlength="255" value="" />
</div>
<div id="q8" class="q">
<a class="item_anchor" name="ItemAnchor8"></a>
<label class="question top_question" for="RESULT_TextField-8">Total No. of  Public Taps</label>
<input type="text" name="RESULT_TextField-8" class="text_field number_field" id="RESULT_TextField-8"  size="25" maxlength="255" value="" />
</div>

<div class="clear"></div>
<hr>
<div id="q11" class="q required">
<a class="item_anchor" name="ItemAnchor9"></a>
<label class="question top_question" for="RESULT_RadioButton-9">Project Phase&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
<select id="RESULT_RadioButton-9" name="RESULT_RadioButton-9" class="drop_down">
<option></option>
<option value="Radio-0" selected="selected">Completed</option>
<option value="Radio-1">Under Construction</option>
<option value="Radio-2">DPR</option>
<option value="Radio-3">Feasibility Study Completed</option>
<option value="Radio-4">Probable</option>
</select>
</div>

<div class="clear"></div>
<div id="q13" class="q required">
<label class="question top_question" for="RESULT_TextField-10">Project Start Date&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
<input type="text" id="start-date" name = "startdate" class="nepali-calendar" value=""/>

</div>
<div id="q14" class="q">
<label class="question top_question" for="RESULT_TextField-11">Project Completed Date</label>
<input type="text" id="termination-date" name = "enddate" class="nepali-calendar" value=""/>

</div>

<div class="clear"></div>
<hr>
<div id="q15" class="q required">
<a class="item_anchor" name="ItemAnchor12"></a>
<label class="question top_question" for="RESULT_TextField-12">Location&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
<input type="text" name="RESULT_TextField-12" class="text_field number_field" id="RESULT_TextField-12"  placeholder="lon and lat seperated by comma"  size="25" maxlength="255" value="" />
</div>
<div class="clear"></div>

<div id = 'newField' class = "q">
	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</div>
<div class="clear"></div>
</div>
<!-- END_ITEMS -->
<input type="hidden" name="EParam" value="FzpUCZwnDno=" />
<div class="outside_container">
<div class="buttons_reverse"><input type="submit" name="Submit" value="Submit" class="submit_button" id="FSsubmit" /></div></div>
</form>

</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
