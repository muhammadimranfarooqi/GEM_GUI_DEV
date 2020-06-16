<?php
	  //  Form Submitted , need to generate XML 
	 //if (isset($_POST['foilsnumbersubmitted'])) {
	     if(isset($_POST["submit"])) {


	      include_once "functions/functions.php";
	      include_once "functions/generate_xml.php";
	      include_once "functions/globals.php";
		  $head = array();
		  $headRun =array();
		  $headType =array();
		  $foils =array();
		  $foil = array();
		  $part = array();
		  $partdata = array();
		  $data = array();
		  
		  // Header Data
		  $headType['EXTENSION_TABLE_NAME'] ="GEM_VFAT_STRIP_MASKING";
		  $headType['NAME'] = "GEM VFAT STRIP MASKING"; 
		  $head['TYPE'] = $headType;
		  
		  
		  $headRun['RUN_NUMBER'] = $_POST['RUN_NUMBER'];
		  $headRun['RUN_TYPE'] = $_POST['RUN_TYPE'];
		  $headRun['RUN_BEGIN_TIMESTAMP'] = date($_POST['RUN_BEGIN_TIMESTAMP'].':s');
		  $RUN = "check";
		  $headRun['RUN_END_TIMESTAMP'] = date($_POST['RUN_END_TIMESTAMP'].':s');
		  $headRun['LOCATION'] = $_POST['LOCATION'];
		  $headRun['INITIATED_BY_USER'] = $_POST['INITIATED_BY_USER'];
		  $headRun['COMMENT_DESCRIPTION'] = $_POST['COMMENT_DESCRIPTION'];
		  $head['RUN'] = $headRun;
		  
		  
		  //Foils Data
	       for($i = 1; $i <= $_POST['foilsnumbersubmitted']; $i++){
		  //$_POST['foil'.$i];   
		  $foil['COMMENT_DESCRIPTION'] = $_POST['COMMENT_DESCRIPTION_foil'.$i];
		  $foil['VERSION'] = $_POST['VERSION_foil'.$i];
		  
		  $part['SERIAL_NUMBER'] = $_POST['foil'.$i];
		  $part['VERSION'] = "Batch ".$_POST['VERSIONbatch'.$i];
		  $part['KIND_OF_PART'] = $FOIL_KIND_OF_PART_NAME;
		  $foil['PART'] = $part;
		  
		  $partdata['TEST_TIME'] = $_POST['HUMIDITY_PERCENT_foil'.$i];
		  $partdata['INCRMNT_SEC'] = $_POST['TEMP_DEG_CENT_foil'.$i];
		  $partdata['MANF_PRSR_MBAR'] = $_POST['PRESSURE_MBAR_foil'.$i];
		  $partdata['AMB_PRSR_MBAR'] = $_POST['PRESSURE_MBAR_foil'.$i];
		  $partdata['TEMP_DEGC'] = $_POST['PRESSURE_MBAR_foil'.$i];
		  $foil['DATA'] = $partdata;
		  
		  $foils['foil'.$i] = $foil;
		
		 }
		 $data['head'] = $head;
		 $data['foils'] = $foils;
		 //print_r($data);
		 $res_arr = generateDatasetXml($data);
		  
		  // Set session variables with the return 
		  session_start() ;
		  $_SESSION['post_return'] = $res_arr;
		  $_SESSION['new_chamber_ntfy'] = '<div role="alert" class="alert alert-success">
    <strong>Well done!</strong> You successfully generated XML file for a list of GEM FOIL(s) data 
		  </div>';
		  // redirect to confirm page
		  header('Location: https://gemdb.web.cern.ch/gemdb/confirmation.php'); //?msg='.$msg."&statusCode=".$statusCode."&return=".$return
		      die();
		 
	  }
	  ?>

<?php
include "head.php";
?>
<?php include "head_panel.php"; ?>
<style>

input[type=checkbox]{
margin-bottom:10px;
margin-right: 10px;
margin-left: 10px;
}

</style>
<style>
.panel-height {
  height: 100px;
  width: 300px; // change according to your requirement/
}
</style>
<style>
    .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
    /* Flashing */
    .hover13 a:hover img {
        opacity: 1;
        -webkit-animation: flash 1.5s;
        animation: flash 1.5s;
        border: 1px inset;
    }
    @-webkit-keyframes flash {
        0% {
            opacity: .4;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes flash {
        0% {
            opacity: .4;
        }
        100% {
            opacity: 1;
        }
    }


    .rellists{
        display: none;
    }

    .rellists .dropdown{
        margin: 15px;
    }

</style>


<div class="container-fluid">
  <div class="row">

<?php include "side.php"; ?>
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	  <h2 class="sub-header"> <img src="images/ROPCB.png" width="4%"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  QC7 Test  </h2>

	  <?php

	      echo '<div style="display: none" role="alert" class="alert alert-danger ">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><strong>Error!</strong> Please fill the required fields.
  </div>';
	      ?>

	      <!--<form method="POST" action="qc3_leak_test.php" enctype='multipart/form-data'>-->
	      <form method="POST" name="myForm" action="convert_strip_masking.php" enctype='multipart/form-data'>
			<input type="hidden" name="submited" value="true" /><br>
		  <div class="row">
		      <div class="col-xs-10 panel-info panel" style="padding-left: 0px; padding-right: 0px;">
			  <div class="panel-heading">
			      <h3 class="panel-title" >  <span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span>Enter following details:</h3>
			  </div>
 
			  <div class="panel-body">
		   <div class="form-group">
			<div class="panel-body">
				     <!-- <div class="form-group">
				      <lable>RUN Number:</lable><br>
				       <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
				      <input class="runinput" name='RUN_NUMBER' >
				      </div>
				      
				     <div class="form-group">
				      <lable>RUN Type:</lable><br>
				       <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
				      <input class="runinput" name='RUN_TYPE' >
				      </div>-->
				      <div class="form-group">
                                      <lable>Select Chamber:</lable><br>
                                       <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
                                   
					<select name="chambers">

				       <?php list_chambers_combobox();
					?>
				        </select>
				      </div>
				</div>
				       <div class="form-group">
				      <lable>e-log link:</lable><br>
				       <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
				      <input class="runinput" name='INITIATED_BY_USER' >
				      </div>
				      <div class="form-group">
				      <lable>Test Date:</lable><br>
				      <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
				      <input class="runinput date" name="RUN_BEGIN_TIMESTAMP"  >
				      </div>
				      <div class="panel panel-primary">
				       <div class="panel-heading">Test Type</div>
				       <div class="panel-body">
					    <input type="checkbox" name="On-detector" value="Y" style="display: inline"><label> On-detector</label><br>
					    <input type="checkbox" name="W/Cooling" value="Y" style="display: inline"><label> W/Cooling</label><br>
					    <input type="checkbox" name="W/Chimney" value="Y" style="display: inline"><label> W/Chimney</label><br>
					    </div>
					  </div>
					  <div class="panel panel-default">
				       <div class="panel-heading">Scan-dates</div>
				       <div class="panel-body">
					     <lable>S-curve:</lable><br><span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
				      <input class="runinput date" name="RUN_BEGIN_TIMESTAMP" ><br>
					   <lable>ARM DAC:</lable><br><span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
				      <input class="runinput date" name="RUN_BEGIN_TIMESTAMP" ><br>
					   <lable>S-bit Rate:</lable><br><span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
				      <input class="runinput date" name="RUN_BEGIN_TIMESTAMP" ><br>
					    </div>
					  </div>
					   <div class="panel panel-danger">
				       <div class="panel-heading">Component Replacement:</div>
				       <div class="panel-body">
				         <div class="checkbox">
				        <div class="col-xs-6">
				        
					    <input type="checkbox" name="On-detector" id="check_geb" value="Y" style="display: inline"><label> GEB</label><br>
					    <input type="checkbox" name="W/Cooling" id="check_opto_hybrid" value="Y" style="display: inline"><label> Opto Hybrid</label><br>
					    <input type="checkbox" name="W/Chimney" id="check_vfat" value="Y" style="display: inline"><label> VFAT</label><br>
					    </div>
					     <div class="col-xs-6">
					    <input type="checkbox" name="On-detector" id="check_feast" value="Y" style="display: inline"><label> FEAST</label><br>
					    <input type="checkbox" name="W/Cooling" id="check_vttx" value="Y" style="display: inline"><label> VTTx</label><br>
					    <input type="checkbox" name="W/Chimney" id="check_vtrx" value="Y" style="display: inline"><label> VTRx</label><br>
					    </div>
					    </div>
					 <div class="col-xs-6">  
					    <div class="row">
						  <div class="col-md-6">
						  	<div id="panel_geb">
						    <div class="panel panel-default">
						      <div class="panel-heading">GEB</div>
						      <div class="panel-body panel-height"></div>
						      <?php $drifts=  get_list_part_ID($GEB_KIND_OF_PART_ID);
         			foreach( $drifts as $drift){ 
							 echo '<tr> 
                  				<br><td><input type="checkbox" name="On-detector" id="check_feast" value="Y" style="display: inline">'.$drift['SERIAL_NUMBER'].'</td>
								 </tr>';
									
}
 ?>
						      <div class="panel-footer"><button type="button" class="btn btn-danger">Reset</button>
					    </div>
						    </div>
						    </div>
						  </div>
						</div>
					</div>
				 <div class="col-xs-6">  		
						<div class="row">
						  <div class="col-md-6">
						  <div id="panel_opto">
						    <div class="panel panel-default">
						      <div class="panel-heading">OptoHybrid</div>
						      <?php $drifts=  get_list_part_ID($OPTOHYBRID_KIND_OF_PART_ID);
         			foreach( $drifts as $drift){ 
							 echo '<tr> 
                  				<br><td><input type="checkbox" name="On-detector" id="check_feast" value="Y" style="display: inline">'.$drift['SERIAL_NUMBER'].'</td>
								 </tr>';
									
}
 ?>
						      <div class="panel-body"></div>
						      <div class="panel-footer"><button type="button" class="btn btn-danger">Reset</button>
					    </div>
						    </div>
						    </div>
						  </div>
						</div>
				</div>		
					 <div class="col-xs-6">  	
						<div class="row">
						  <div class="col-md-6">
						  <div id="panel_vfat">
						    <div class="panel panel-default">
						      <div class="panel-heading">VFAT</div>
						      <div class="panel-body"></div>
						      <?php $drifts=  get_list_part_ID($VFAT_KIND_OF_PART_ID);
         			foreach( $drifts as $drift){ 
							 echo '<tr> 
                  				<br><td><input type="checkbox" name="On-detector" id="check_feast" value="Y" style="display: inline">'.$drift['SERIAL_NUMBER'].'</td>
								 </tr>';
									
}
 ?>
						      <div class="panel-footer"><button type="button" class="btn btn-danger">Reset</button>
					    </div>
						    </div>
						    </div>
						  </div>
						</div>
					</div>
					 <div class="col-xs-6">  
						<div class="row">
						  <div class="col-md-4">
						  <div id="panel_feast">
						    <div class="panel panel-default">
						      <div class="panel-heading">FEAST</div>
						      <div class="panel-body"></div>
						      <div class="panel-footer"><button type="button" class="btn btn-danger">Reset</button>
					    </div>
						    </div>
						    </div>
						  </div>
						</div>
					</div>
					 <div class="col-xs-6">  
						<div class="row">
						  <div class="col-md-4">
						  <div id="panel_vtrx">
						    <div class="panel panel-default">
						      <div class="panel-heading">VTRx</div>
						      <div class="panel-body"></div>
						      <div class="panel-footer"><button type="button" class="btn btn-danger">Reset</button>
					    </div>
						    </div>
						    </div>
						  </div>
						</div>
						</div>
					<div class="col-xs-6">  
						<div class="row">
						  <div class="col-md-4">
						  <div id="panel_vttx">
						    <div class="panel panel-default">
						      <div class="panel-heading">VTTx</div>
						      <div class="panel-body"></div>
						      <div class="panel-footer"><button type="button" class="btn btn-danger">Reset</button>
					    </div>
						    </div>
						    </div>
						  </div>
						</div>
						</div>
					    </div>
					    <div class="panel-footer"><button type="button" class="btn btn-info">Save Locally</button>
					    </div>
					    </div>
					  </div>
				      
				      
				      
				      
				     
				      
				      <div class="form-group">
				      <lable>COMMENTS:</lable><br>
				      <textarea name='COMMENT_DESCRIPTION'  rows="4" cols="70"> Please Put the comment of your test:</textarea>
				      </div>
				      <div class="panel panel-warning">
				       <div class="panel-heading">Status</div>
				       <div class="panel-body">
					    <input type="checkbox" name="On-detector" value="Y" style="display: inline"><label> Needs Hospital</label><br>
					    <input type="checkbox" name="W/Cooling" value="Y" style="display: inline"><label> Ready for Reset</label><br>
					    <input type="checkbox" name="W/Chimney" value="Y" style="display: inline"><label> Finished</label><br>
					    </div>
					  </div>

				  </div>
			      </div>
			  
				  
				 </div>
				</div> 
				<div class="row">

		  <button type="submit" class="btn btn-default subbutt">Submit</button>   
			<button type="button" class="btn btn-default">Cancel</button>

</div>
			</div>








	      </form>


<?php
include "foot.php";
?>
<script type="text/javascript">
  //$(document).ready(function () {
    //  $("#add").click(function () {
//	  $('#mytable tbody>tr:last').clone(true).insertAfter('#mytable tbody>tr:last');
  //          alert($('#mytable tbody>tr:last').find("input").first().val());
    //        $('#mytable tbody>tr:last').find("input").first().val( $(this).val()+100);
      //      return false;
        //});
	jQuery(document).ready(function ($) {
        $( ".date" ).datetimepicker();
        $.fn.datetimepicker.defaults = {
            pickSeconds: false        // disables seconds in the time picker
        };        
            $(".imon").focus(function() {
    console.log('in');
}).blur(function() {
    console.log('out');
    $(this).parent().next().find("input").attr("value","3300")
});
    });
</script>
<script type="text/javascript" language="javascript">
function checkfile(sender) {
    var validExts = new Array(".xlsx", ".xls", ".xlsm");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Invalid file selected, valid files are of " +
               validExts.toString() + " types.");
      return false;
    }
    else return true;
}
</script>
<script>
jQuery(document).ready(function ($) {
var form = $('#myForm'),
check_geb = $('#check_geb'),
check_opto=$('#check_opto_hybrid'),
check_vfat = $('#check_vfat'),
check_feast = $('#check_feast'),
check_vttx = $('#check_vttx'),
check_vtrx = $('#check_vtrx'),
gebBlock = $('#panel_geb'),
optoBlock=$('#panel_opto'),
vfatBlock=$('#panel_vfat'),
feastBlock=$('#panel_feast'),
vtrxBlock=$('#panel_vtrx'),
vttxBlock=$('#panel_vttx');

gebBlock.hide();
optoBlock.hide();
vfatBlock.hide();
feastBlock.hide();
vtrxBlock.hide();
vttxBlock.hide();


//geb
check_geb.on('click', function() {
if($(this).is(':checked')) {
	gebBlock.show();
 
} else {
	gebBlock.hide();
  
}
})
//
//opto
check_opto.on('click', function() {
if($(this).is(':checked')) {
	optoBlock.show();
 
} else {
	optoBlock.hide();
 
}
})
//
//vfat
check_vfat.on('click', function() {
if($(this).is(':checked')) {
	vfatBlock.show();
 
} else {
	vfatBlock.hide();
 
}
})
//
//FEAST
check_feast.on('click', function() {
if($(this).is(':checked')) {
	feastBlock.show();
 
} else {
	feastBlock.hide();
 
}
})
//
//VTRx
check_vtrx.on('click', function() {
if($(this).is(':checked')) {
	vtrxBlock.show();
 
} else {
	vtrxBlock.hide();
 
}
})
//
//VTTx
check_vttx.on('click', function() {
if($(this).is(':checked')) {
	vttxBlock.show();
 
} else {
	vttxBlock.hide();
 
}
})
//

});
</script>
