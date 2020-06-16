<?php 
include "head.php";


?>
<?php include "head_panel.php"; ?>
<style>
<!--
input[type=checkbox]{
margin-bottom:10px;
margin-right: 10px;
margin-left: 10px;
}
-->


</style>
    <div class="container-fluid" align="left">
      <div class="row">
<?php  include "side.php"; ?>  
<?php $drifts=  get_list_part_ID($SUPER_CHAMBER_KIND_OF_PART_ID); ?>     
<script src="https://code.highcharts.com/6.0.0/highcharts.js"></script>
<script src="https://code.highcharts.com/6.0.0/modules/sunburst.js"></script>
 <div class="container-fluid">
	<div class="row">

	
	 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	  <h2 class="sub-header"> <img src="images/sc2.png" width="4%"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> GE1/1 Operations (WORK IN PROGRESS) </h2>
</div>   
<form method="POST" action=".php" enctype='multipart/form-data'> 
<div class="row" align="center">

        <div class="col-md-12 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">GE1/1 Operations</div>

                <div class="panel-body">

			<div class="container-fluid">

				<div class="form-group">

				<div class="row-fluid">
				
		                    <div  class="col-xs-6 col-md-6" id="wheel1">
</div>
 
		                    <div  class="col-xs-6 col-md-6" id="wheel2"></div>
		                </div>
		              
		            </div>
		           <div class="row"> <div class="col-sm-6" style="background-color:white;">
<input type="button" class="btn btn-primary" onclick="selectAllWheel1()" value="All Positive Endcap">
</div>
 <div class="col-sm-6" style="background-color:white;">
<input type="button" class="btn btn-primary" onclick="selectAllWheel2()" value="All Negative Endcap">
</div>
</div>
                <div class="row">

                 <div class="form-group">   
                    <input type="hidden" name="INSTALLATION_LOCATION" id ="tb2"  />
                
                <h3>Selected Locations: <!--<ul class="list-group list-group-horizontal-xl"> <li class="list-group-item"><span id="span" class="class="badge badge-danger">
				</span></li></ul> --!></h3>
				
				</div>
				</div>
				<div class="row">
				
				</div>


			<div class="scrollmenu">
				<div class="col-md-11 col-md-offset-1">
				<select class="form-control" id="mySelect" size="8" multiple>
				</select>
</div>
</div>

 <small class="text-muted">Use ctrl button to select multiple items</small>	
<hr>
<div class"row">
		 
<input type="button" class="btn btn-danger" onclick="removentry()" value="Remove"> 
<input type="button" class="btn btn-warning" onclick="resetAll()" value=" Reset ">
				
</div>				</div>
<hr>
				<div class="row">
						<div class="form-group">
                        <input type="hidden" name="submited" value="true" /><br>
					
						<input type="checkbox" name="scan" value="Y"><label> Scan</label>
						<label> Scan Type:</label>
						<select name="scan_type">

				      <option value="Connectivity Test">Connectivity Test</option>
				        <option value="DAC Scan">DAC Scan</option>
				         <option value="Scurves">Scurves</option>
				          <option value="sbitThreshold Scan">sbitThreshold Scan</option>
				           <option value="Trimming">Trimming</option>
				           <option value="HV Training">HV Training</option>
				        </select>
						<lable>Scan Date:</lable><input type="date" class="datepicker" name="scan_date" data-date-format="yyyy/mm/dd/hh/mm">
						 <lable>Comments:</lable>
						 <textarea name="scan_comments" rows="2" cols="50">

						</textarea> 
						<br><br>
						<button type="button" class="btn btn-success">Submit</button>
						</div>
				</div>
				
				<div class="row">
						<div class="form-group">
                        <input type="hidden" name="submited" value="true" /><br>

						<input type="checkbox" name="report" value="Y"><label> Report Issue:</label>
						<label> Issue Type</label>

					<select name="SC_SERIAL_NO">
						
				       <option value="Services">Services</option>
				        <option value="On-Chamber electronics">On-Chamber electronics</option>
				         <option value="Connectivity">Connectivity</option>
				          <option value="DAQ">DAQ</option>
				           <option value="Software">Software</option>
				           <option value="Other">Other</option>
				        </select>
						
						 <lable>Issue Report:</lable>
						 <textarea rows="2" cols="66">

						</textarea> 
<br><br>
						<button type="button" class="btn btn-danger">Report Issue</button>
						</div>
				</div>
				
				</div>
				</div>
				</div>
				</div>
				
                </div>
                </form>

            </div>

        </div>

    </div>

</div>
  <?php 
include "foot.php";

?>
<script>
var chambers=[]; 
var ch=['GE11-P-01L2-S','GE11-P-02L2-L','GE11-P-03L2-S','GE11-P-04L2-L,GE11-P-05L2-S,GE11-P-06L2-L,GE11-P-07L2-S,GE11-P-08L2-L,GE11-P-09L2-S,GE11-P-10L2-L,GE11-P-11L2-S,GE11-P-12L2-L,GE11-P-13L2-S,GE11-P-14L2-L,GE11-P-15L2-S,GE11-P-16L2-L,GE11-P-17L2-S,GE11-P-18L2-L,GE11-P-19L2-S,GE11-P-20L2-L,GE11-P-21L2-S,GE11-P-22L2-L,GE11-P-23L2-S,GE11-P-24L2-L,GE11-P-25L2-S,GE11-P-26L2-L,GE11-P-27L2-S,GE11-P-28L2-L,GE11-P-29L2-S,GE11-P-30L2-L,GE11-P-31L2-S,GE11-P-32L2-L,GE11-P-33L2-S,GE11-P-34L2-L,GE11-P-35L2-S,GE11-P-36L2-L,GE11-P-01L1-S,GE11-P-02L1-L,GE11-P-03L1-S,GE11-P-04L1-L,GE11-P-05L1-S,GE11-P-06L1-L,GE11-P-07L1-S,GE11-P-08L1-L,GE11-P-09L1-S,GE11-P-10L1-L,GE11-P-11L1-S,GE11-P-12L1-L,GE11-P-13L1-S,GE11-P-14L1-L,GE11-P-15L1-S,GE11-P-16L1-L,GE11-P-17L1-S,GE11-P-18L1-L,GE11-P-19L1-S,GE11-P-20L1-L,GE11-P-21L1-S,GE11-P-22L1-L,GE11-P-23L1-S,GE11-P-24L1-L,GE11-P-25L1-S,GE11-P-26L1-L,GE11-P-27L1-S,GE11-P-28L1-L,GE11-P-29L1-S,GE11-P-30L1-L,GE11-P-31L1-S,GE11-P-32L1-L,GE11-P-33L1-S,GE11-P-34L1-L,GE11-P-35L1-S,GE11-P-36L1-L'];

var data = [{
    id: '0.0',//GE1M01 - GE1M36
    parent: '',
    name: 'select All',
    flag: 'false'
},
{
    id: 'GE11-P-09L1-S',
    parent: '0.0',
   
  
    value: 1
}, {
    id: 'GE11-P-08L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-P-07L1-S',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11-P-06L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-05L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-04L1-L',
    parent: '0.0',
   
    value: 1
}, {
    id: 'GE11-P-03L1-S',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-P-02L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-01L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-36L1-L',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11-P-35L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-34L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-33L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-32L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-31L1-S',
    parent: '0.0',
 
    value: 1
}
, {
    id: 'GE11-P-30L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-29L1-S',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-P-28L1-L',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11-P-27L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-26L1-L',
    parent: '0.0',
 
    value: 1
}
, {
    id: 'GE11-P-25L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-24L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-23L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-22L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-21L1-S',
    parent: '0.0',
  
    value: 1
}
, {
    id: 'GE11-P-20L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-P-19L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-18L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-P-17L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-16L1-L',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11-P-15L1-S',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-P-14L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-P-13L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-P-12L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-P-11L1-S',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11-P-10L1-L',
    parent: '0.0',

    value: 1
}
//SECOND LAYER
,
{
    id: 'GE11-P-09L2-S',
    parent: 'GE11-P-09L1-S',
  
    value: 1
}, {
    id: 'GE11-P-08L2-L',
    parent: 'GE11-P-08L1-L',

    value: 1
}, {
    id: 'GE11-P-07L2-S',
    parent: 'GE11-P-07L1-S',
  
    value: 1
}, {
    id: 'GE11-P-06L2-L',
    parent: 'GE11-P-06L1-L',
 
    value: 1
}, {
    id: 'GE11-P-05L2-S',
    parent: 'GE11-P-05L1-S',
 
    value: 1
}, {
    id: 'GE11-P-04L2-L',
    parent: 'GE11-P-04L1-L',
   
    value: 1
}, {
    id: 'GE11-P-03L2-S',
    parent: 'GE11-P-03L1-S',

    value: 1
}, {
    id: 'GE11-P-02L2-L',
    parent: 'GE11-P-02L1-L',
 
    value: 1
}, {
    id: 'GE11-P-01L2-S',
    parent: 'GE11-P-01L1-S',
 
    value: 1
}, {
    id: 'GE11-P-36L2-L',
    parent: 'GE11-P-36L1-L',

    value: 1
}
, {
    id: 'GE11-P-35L2-S',
    parent: 'GE11-P-35L1-S',
 
    value: 1
}, {
    id: 'GE11-P-34L2-L',
    parent: 'GE11-P-34L1-L',
 
    value: 1
}, {
    id: 'GE11-P-33L2-S',
    parent: 'GE11-P-33L1-S',
 
    value: 1
}, {
    id: 'GE11-P-32L2-L',
    parent: 'GE11-P-32L1-L',
 
    value: 1
}, {
    id: 'GE11-P-31L2-S',
    parent: 'GE11-P-31L1-S',
 
    value: 1
}
, {
    id: 'GE11-P-30L2-L',
    parent: 'GE11-P-30L1-L',
 
    value: 1
}, {
    id: 'GE11-P-29L2-S',
    parent: 'GE11-P-29L1-S',

    value: 1
}, {
    id: 'GE11-P-28L2-L',
    parent: 'GE11-P-28L1-L',
  
    value: 1
}, {
    id: 'GE11-P-27L2-S',
    parent: 'GE11-P-27L1-S',
 
    value: 1
}, {
    id: 'GE11-P-26L2-L',
    parent: 'GE11-P-26L1-L',
 
    value: 1
}
, {
    id: 'GE11-P-25L2-S',
    parent: 'GE11-P-25L1-S',
 
    value: 1
}, {
    id: 'GE11-P-24L2-L',
    parent: 'GE11-P-24L1-L',
 
    value: 1
}, {
    id: 'GE11-P-23L2-S',
    parent: 'GE11-P-23L1-S',
 
    value: 1
}, {
    id: 'GE11-P-22L2-L',
    parent: 'GE11-P-22L1-L',
 
    value: 1
}, {
    id: 'GE11-P-21L2-S',
    parent: 'GE11-P-21L1-S',
  
    value: 1
}
, {
    id: 'GE11-P-20L2-L',
    parent: 'GE11-P-20L1-L',

    value: 1
}, {
    id: 'GE11-P-19L2-S',
    parent: 'GE11-P-19L1-S',
 
    value: 1
}, {
    id: 'GE11-P-18L2-L',
    parent: 'GE11-P-18L1-L',

    value: 1
}, {
    id: 'GE11-P-17L2-S',
    parent: 'GE11-P-17L1-S',
 
    value: 1
}, {
    id: 'GE11-P-16L2-L',
    parent: 'GE11-P-16L1-L',

    value: 1
}
, {
    id: 'GE11-P-15L2-S',
    parent: 'GE11-P-15L1-S',

    value: 1
}, {
    id: 'GE11-P-14L2-L',
    parent: 'GE11-P-14L1-L',

    value: 1
}, {
    id: 'GE11-P-13L2-S',
    parent: 'GE11-P-13L1-S',
 
    value: 1
}, {
    id: 'GE11-P-12L2-L',
    parent: 'GE11-P-12L1-L',

    value: 1
}, {
    id: 'GE11-P-11L2-S',
    parent: 'GE11-P-11L1-S',

    value: 1
}
, {
    id: 'GE11-P-10L2-L',
    parent: 'GE11-P-10L1-L',

    value: 1
}
];
var data1 = [{
    id: '0.0',//GE1M01 - GE1M36
    parent: '',
    name: '+1'
},
{
    id: 'GE11-M-09L1-S',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11-M-08L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-M-07L1-S',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11-M-06L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-05L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-04L1-L',
    parent: '0.0',
   
    value: 1
}, {
    id: 'GE11-M-03L1-S',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-M-02L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-01L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-36L1-L',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11-M-35L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-34L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-33L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-32L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-31L1-S',
    parent: '0.0',
 
    value: 1
}
, {
    id: 'GE11-M-30L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-29L1-S',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-M-28L1-L',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11-M-27L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-26L1-L',
    parent: '0.0',
 
    value: 1
}
, {
    id: 'GE11-M-25L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-24L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-23L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-22L1-L',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-21L1-S',
    parent: '0.0',
  
    value: 1
}
, {
    id: 'GE11-M-20L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-M-19L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-18L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-M-17L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-16L1-L',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11-M-15L1-S',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-M-14L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-M-13L1-S',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11-M-12L1-L',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11-M-11L1-S',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11-M-10L1-L',
    parent: '0.0',

    value: 1
}
//SECOND LAYER
,
{
    id: 'GE11-M-09L2-S',
    parent: 'GE11-M-09L1-S',
  
    value: 1
}, {
    id: 'GE11-M-08L2-L',
    parent: 'GE11-M-08L1-L',

    value: 1
}, {
    id: 'GE11-M-07L2-S',
    parent: 'GE11-M-07L1-S',
  
    value: 1
}, {
    id: 'GE11-M-06L2-L',
    parent: 'GE11-M-06L1-L',
 
    value: 1
}, {
    id: 'GE11-M-05L2-S',
    parent: 'GE11-M-05L1-S',
 
    value: 1
}, {
    id: 'GE11-M-04L2-L',
    parent: 'GE11-M-04L1-L',
   
    value: 1
}, {
    id: 'GE11-M-03L2-S',
    parent: 'GE11-M-03L1-S',

    value: 1
}, {
    id: 'GE11-M-02L2-L',
    parent: 'GE11-M-02L1-L',
 
    value: 1
}, {
    id: 'GE11-M-01L2-S',
    parent: 'GE11-M-01L1-S',
 
    value: 1
}, {
    id: 'GE11-M-36L2-L',
    parent: 'GE11-M-36L1-L',

    value: 1
}
, {
    id: 'GE11-M-35L2-S',
    parent: 'GE11-M-35L1-S',
 
    value: 1
}, {
    id: 'GE11-M-34L2-L',
    parent: 'GE11-M-34L1-L',
 
    value: 1
}, {
    id: 'GE11-M-33L2-S',
    parent: 'GE11-M-33L1-S',
 
    value: 1
}, {
    id: 'GE11-M-32L2-L',
    parent: 'GE11-M-32L1-L',
 
    value: 1
}, {
    id: 'GE11-M-31L2-S',
    parent: 'GE11-M-31L1-S',
 
    value: 1
}
, {
    id: 'GE11-M-30L2-L',
    parent: 'GE11-M-30L1-L',
 
    value: 1
}, {
    id: 'GE11-M-29L2-S',
    parent: 'GE11-M-29L1-S',

    value: 1
}, {
    id: 'GE11-M-28L2-L',
    parent: 'GE11-M-28L1-L',
  
    value: 1
}, {
    id: 'GE11-M-27L2-S',
    parent: 'GE11-M-27L1-S',
 
    value: 1
}, {
    id: 'GE11-M-26L2-L',
    parent: 'GE11-M-26L1-L',
 
    value: 1
}
, {
    id: 'GE11-M-25L2-S',
    parent: 'GE11-M-25L1-S',
 
    value: 1
}, {
    id: 'GE11-M-24L2-L',
    parent: 'GE11-M-24L1-L',
 
    value: 1
}, {
    id: 'GE11-M-23L2-S',
    parent: 'GE11-M-23L1-S',
 
    value: 1
}, {
    id: 'GE11-M-22L2-L',
    parent: 'GE11-M-22L1-L',
 
    value: 1
}, {
    id: 'GE11-M-21L2-S',
    parent: 'GE11-M-21L1-S',
  
    value: 1
}
, {
    id: 'GE11-M-20L2-L',
    parent: 'GE11-M-20L1-L',

    value: 1
}, {
    id: 'GE11-M-19L2-S',
    parent: 'GE11-M-19L1-S',
 
    value: 1
}, {
    id: 'GE11-M-18L2-L',
    parent: 'GE11-M-18L1-L',

    value: 1
}, {
    id: 'GE11-M-17L2-S',
    parent: 'GE11-M-17L1-S',
 
    value: 1
}, {
    id: 'GE11-M-16L2-L',
    parent: 'GE11-M-16L1-L',

    value: 1
}
, {
    id: 'GE11-M-15L2-S',
    parent: 'GE11-M-15L1-S',

    value: 1
}, {
    id: 'GE11-M-14L2-L',
    parent: 'GE11-M-14L1-L',

    value: 1
}, {
    id: 'GE11-M-13L2-S',
    parent: 'GE11-M-13L1-S',
 
    value: 1
}, {
    id: 'GE11-M-12L2-L',
    parent: 'GE11-M-12L1-L',

    value: 1
}, {
    id: 'GE11-M-11L2-S',
    parent: 'GE11-M-11L1-S',

    value: 1
}
, {
    id: 'GE11-M-10L2-L',
    parent: 'GE11-M-10L1-L',

    value: 1
}


/*for (i = 1; i <= 36; i++) {
	 document.write (",<br>{"+"id:"+i+ ",");
	 document.write	( "<br>parent:'0.0' ,");
	 document.write	 ("<br>value:1"+"<br>");
	 if(i==36){
		 document.write	 ("<br>}");
		 }
	  else{
	 document.write	 ("<br>},");}	 
}*/

//GE1M01 - GE1M36
//GE1P01- GE1P36
];
// Splice in transparent for the center circle
Highcharts.getOptions().colors.splice(0, 0, 'transparent');


Highcharts.chart('wheel1', {

    chart: {
        height: '60%'
    },
credits: {
	        enabled: false
	    },

    title: {
        text: 'GE11-P-01   -   GE11-P-36'
    },
    subtitle: {
        text: 'CMS - GEM'
    },
    series: [{
        type: "sunburst",
        data: data,
        allowDrillToNode: false,
        cursor: 'pointer',
        point: {
             events: {
                click: function () {
                    //alert("alert"+this.id);
                     
                    
                    chambers.push(this.id);
                single=this.id;
                    console.log(chambers);
                    console.log(this.name);
                 
                  	console.log(this.id);
                  	if(this.id == 0.0){
                  		//document.getElementById("tb2").value = ch;
                  		//document.getElementById("span").textContent  = ch;
                  		 var x = document.getElementById("mySelect");
                         var option = document.createElement("option");
                         option.text = ch;
                         x.add(option, x[0]);
                  	}
                  	else{
                  		// document.getElementById("tb2").value = chambers;
                        // document.getElementById("span").textContent  = chambers;
                        
                     /*    var ul = document.getElementById("list");
                         var li = document.createElement("li");
                        var span= document.createElement("span");
                         var children = single
                         li.setAttribute("id", "element"+children)
                         li.appendChild(document.createTextNode("Element" +children));
                         //<span id="span" class="close">&times;
 						//</span>
                         ul.appendChild(li)*/
                         var x = document.getElementById("mySelect");
                         var option = document.createElement("option");
                         option.text = single;
                         x.add(option, x[0]);
                  	}
                  		
                 	
                    
                }
            }
           },
        dataLabels: {
            format: '{}',
           /* filter: {
                property: 'innerArcLength',
                operator: '>',
                value: 16
            }*/
        },
        levels: [{
            level: 1,
            levelIsConstant: false,
            dataLabels: {
               
            }
        }, {
            level: 2,
            colorByPoint: true,
           // colorIndex: 1,
            color:'#2f7ed8'
            	 
        },
        {
            level: 3,
            colorVariation: {
               // key: 'brightness',
               // to: -0.5
            }
        }, {
            level: 4,
            colorVariation: {
               // key: 'brightness',
               // to: 0.5
            }
        }]

    }],
    tooltip: {
        headerFormat: "",
        pointFormat: '{point.id}'
    }
});
Highcharts.chart('wheel2', {

    chart: {
        height: '60%'
    },
credits: {
	        enabled: false
	    },
  
    title: {
        text: 'GE11-M-01   -   GE11-M-36'
    },
    subtitle: {
        text: 'CMS - GEM'
    },
    series: [{
        type: "sunburst",
        data: data1,
        allowDrillToNode: false,
        cursor: 'pointer',
        point: {
        	 allowPointSelect: true,
           events: {
                click: function () {
                    //alert("alert"+this.id);
                     
                    
                    chambers.push(this.id);
                single=this.id;
                    console.log(chambers);
                    console.log(this.name);
                 
                  	console.log(this.id);
                  	if(this.id == 0.0){
                  		//document.getElementById("tb2").value = ch;
                  		//document.getElementById("span").textContent  = ch;
                  		 var x = document.getElementById("mySelect");
                         var option = document.createElement("option");
                         option.text = ch;
                         x.add(option, x[0]);
                  	}
                  	else{
                  		// document.getElementById("tb2").value = chambers;
                        // document.getElementById("span").textContent  = chambers;
                        
                     /*    var ul = document.getElementById("list");
                         var li = document.createElement("li");
                        var span= document.createElement("span");
                         var children = single
                         li.setAttribute("id", "element"+children)
                         li.appendChild(document.createTextNode("Element" +children));
                         //<span id="span" class="close">&times;
 						//</span>
                         ul.appendChild(li)*/
                         var x = document.getElementById("mySelect");
                         var option = document.createElement("option");
                         option.text = single;
                         x.add(option, x[0]);
                  	}
                  		
                 	
                    
                }
            }
           },
        dataLabels: {
            format: '{}',
           /* filter: {
                property: 'innerArcLength',
                operator: '>',
                value: 16
            }*/
        },
        levels: [{
            level: 1,
            levelIsConstant: false,
            dataLabels: {
               
            }
        }, {
            level: 2,
            colorByPoint: true,
           // colorIndex: 1,
            color:'#2f7ed8'
            	 
        },
        {
            level: 3,
            colorVariation: {
               // key: 'brightness',
               // to: -0.5
            }
        }, {
            level: 4,
            colorVariation: {
               // key: 'brightness',
               // to: 0.5
            }
        }]

    }],
    tooltip: {
        headerFormat: "{point.value}",
        pointFormat: '{point.id}'
    }
});</script>
<script type="text/javascript">
function removentry()
{
var x=document.getElementById("mySelect");
x.remove(x.selectedIndex);
}</script>
<script type="text/javascript">
function selectAllWheel1()
{
var chamb=new Array("GE11-P-01L2-S","GE11-P-02L2-L","GE11-P-03L2-S","GE11-P-04L2-L","GE11-P-05L2-S","GE11-P-06L2-L","GE11-P-07L2-S","GE11-P-08L2-L","GE11-P-09L2-S","GE11-P-10L2-L","GE11-P-11L2-S","GE11-P-12L2-L","GE11-P-13L2-S","GE11-P-14L2-L","GE11-P-15L2-S",
"GE11-P-16L2-L","GE11-P-17L2-S","GE11-P-18L2-L","GE11-P-19L2-S","GE11-P-20L2-L","GE11-P-21L2-S","GE11-P-22L2-L","GE11-P-23L2-S","GE11-P-24L2-L","GE11-P-25L2-S","GE11-P-26L2-L","GE11-P-27L2-S","GE11-P-28L2-L","GE11-P-29L2-S","GE11-P-30L2-L","GE11-P-31L2-S","GE11-P-32L2-L","GE11-P-33L2-S","GE11-P-34L2-L",
"GE11-P-35L2-S","GE11-P-36L2-L","GE11-P-01L1-S","GE11-P-02L1-L","GE11-P-03L1-S","GE11-P-04L1-L","GE11-P-05L1-S","GE11-P-06L1-L","GE11-P-07L1-S","GE11-P-08L1-L","GE11-P-09L1-S","GE11-P-10L1-L","GE11-P-11L1-S","GE11-P-12L1-L","GE11-P-13L1-S","GE11-P-14L1-L","GE11-P-15L1-S","GE11-P-16L1-L",
"GE11-P-17L1-S","GE11-P-18L1-L","GE11-P-19L1-S","GE11-P-20L1-L","GE11-P-21L1-S","GE11-P-22L1-L","GE11-P-23L1-S","GE11-P-24L1-L","GE11-P-25L1-S","GE11-P-26L1-L","GE11-P-27L1-S","GE11-P-28L1-L","GE11-P-29L1-S","GE11-P-30L1-L","GE11-P-31L1-S","GE11-P-32L1-L","GE11-P-33L1-S","GE11-P-34L1-L","GE11-P-35L1-S","GE11-P-36L1-L");
var sel=document.getElementById("mySelect");
for (var i in chamb) { // loop through all elements
        var opt = document.createElement("option"); // Create the new element
        opt.value = chamb[i]; // set the value
        opt.text = chamb[i]; // set the text

        sel.appendChild(opt); // add it to the select
    }
}</script>
<script type="text/javascript">
function selectAllWheel2()
{
var chamb=new Array("GE11-M-01L2-S","GE11-M-02L2-L","GE11-M-03L2-S","GE11-M-04L2-L","GE11-M-05L2-S","GE11-M-06L2-L","GE11-M-07L2-S","GE11-M-08L2-L","GE11-M-09L2-S","GE11-M-10L2-L","GE11-M-11L2-S","GE11-M-12L2-L","GE11-M-13L2-S","GE11-M-14L2-L","GE11-M-15L2-S",
"GE11-M-16L2-L","GE11-M-17L2-S","GE11-M-18L2-L","GE11-M-19L2-S","GE11-M-20L2-L","GE11-M-21L2-S","GE11-M-22L2-L","GE11-M-23L2-S","GE11-M-24L2-L","GE11-M-25L2-S","GE11-M-26L2-L","GE11-M-27L2-S","GE11-M-28L2-L","GE11-M-29L2-S","GE11-M-30L2-L","GE11-M-31L2-S","GE11-M-32L2-L","GE11-M-33L2-S","GE11-M-34L2-L",
"GE11-M-35L2-S","GE11-M-36L2-L","GE11-M-01L1-S","GE11-M-02L1-L","GE11-M-03L1-S","GE11-M-04L1-L","GE11-M-05L1-S","GE11-M-06L1-L","GE11-M-07L1-S","GE11-M-08L1-L","GE11-M-09L1-S","GE11-M-10L1-L","GE11-M-11L1-S","GE11-M-12L1-L","GE11-M-13L1-S","GE11-M-14L1-L","GE11-M-15L1-S","GE11-M-16L1-L",
"GE11-M-17L1-S","GE11-M-18L1-L","GE11-M-19L1-S","GE11-M-20L1-L","GE11-M-21L1-S","GE11-M-22L1-L","GE11-M-23L1-S","GE11-M-24L1-L","GE11-M-25L1-S","GE11-M-26L1-L","GE11-M-27L1-S","GE11-M-28L1-L","GE11-M-29L1-S","GE11-M-30L1-L","GE11-M-31L1-S","GE11-M-32L1-L","GE11-M-33L1-S","GE11-M-34L1-L","GE11-M-35L1-S","GE11-M-36L1-L");
var sel=document.getElementById("mySelect");
for (var i in chamb) { // loop through all elements
        var opt = document.createElement("option"); // Create the new element
        opt.value = chamb[i]; // set the value
        opt.text = chamb[i]; // set the text

        sel.appendChild(opt); // add it to the select
    }
}</script>
<script type="text/javascript">
function resetAll()
{
var sel=document.getElementById("mySelect");
var length = sel.options.length;
for (i = length-1; i >= 0; i--) {
  sel.options[i] = null;
}
    
}</script>