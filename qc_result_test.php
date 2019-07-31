<?php include "head.php";
 include "head_panel.php"; ?>

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
	  <h2 class="sub-header"> <img src="images/ROPCB.png" width="4%"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> QC Results  </h2>

	  <?php

	      echo '<div style="display: none" role="alert" class="alert alert-danger ">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><strong>Error!</strong> Please fill the required fields.
  </div>';
	      ?>

	      <!--<form method="POST" action="qc3_leak_test.php" enctype='multipart/form-data'>-->
	      <form method="POST" action="convert_qc_result.php" enctype='multipart/form-data'>
			<input type="hidden" name="submited" value="true" /><br>
		  <div class="row">
		      <div class="col-xs-6 panel-info panel" style="padding-left: 0px; padding-right: 0px;">
			  <div class="panel-heading">
			      <h3 class="panel-title" >  <span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span>On which chamber test performed?</h3>
			  </div>
			  <div class="panel-body">



	
				      
  					<div class="form-group">
                                      <lable>Select Chamber:</lable><br>
                                       <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
                                   
					<select name="CHAMBER">

				        <?php list_chambers_combobox();
					?>
				        </select>
				      </div>
				      
	

					    <div class="form-group">
                                       <lable>Select QC Test:</lable><br>
                                       <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>

                                        <select name="QC_TEST">
                                        <option value="QC3 Test" selected  >QC3 Test</option>
                                        <option value="QC4 Test"   >QC4 Test</option>
			                <option value="QC5 Test"   >QC5 Test</option>
                                        <option value="QC6 Test"   >QC6 Test</option>
                                        <option value="QC7 Test"   >QC7 Test</option>
                                        <option value="QC8 Test"   >QC8 Test</option>
                             



                                        </select>

                                      </div>


			     

 					<div class="form-group">
                                       <lable>Select QC Result:</lable><br>
                                       <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>

                                        <select name="QC_RESULT">
                                        <option value="Passed" selected  >Passed</option>
                                        <option value="Barely passed"  >Barely passed</option>




                                        <option value="Not passed"  >Not passed</option>
                                        </select>

                                      </div>

 
				      <div class="form-group">
				      <lable>Elog Link:</lable><br>
				       <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
				      <input class="runinput" name='ELOG_LINK' required  >
				      </div>
				      
				      <div class="form-group">
				      <lable>Leave comments:</lable><br>
				      <textarea name='COMMENT_DESCRIPTION' required > Please Put the comment of the test:</textarea>
				      </div>
				      

				  </div>
			  
					

				 </div>
				</div>
			
		  <button type="submit" class="btn btn-default subbutt">Submit</button>   

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

