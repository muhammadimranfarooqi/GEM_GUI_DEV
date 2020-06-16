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
	  <h2 class="sub-header"> <img src="images/sc2.png" width="4%"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Open Issues (Work in progress!) </h2>

	  <?php

	      echo '<div style="display: none" role="alert" class="alert alert-danger ">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><strong>Error!</strong> Please fill the required fields.
  </div>';
	      ?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Selected Issue !</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	      <!--<form method="POST" action="qc3_leak_test.php" enctype='multipart/form-data'>-->
	      <form method="POST" action="convert_qc_result.php" enctype='multipart/form-data'>
			<input type="hidden" name="submited" value="true" /><br>
		  <div class="row">
		      <div class="col-xs-12 panel-default panel" style="padding-left: 0px; padding-right: 0px;">
			  <div class="panel-heading">
			      <h3 class="panel-title" >  <span aria-hidden="true" class="glyphicon glyphicon-folder-open"></span>  GE1/1 Open Issues</h3>
			  </div>
			  <div class="panel-body">


			<div class="row"> <div class="col-sm-8" style="background-color:white;">
				<div class="form-group">
					<label> Issue Type: </label>

					<select name="SC_SERIAL_NO">
						<option value="Services" selected>All</option>
				       <option value="Services">Services</option>
				        <option value="On-Chamber electronics">On-Chamber electronics</option>
				         <option value="Connectivity">Connectivity</option>
				          <option value="DAQ">DAQ</option>
				           <option value="Software">Software</option>
				           <option value="Other">Other</option>
				        </select>
				</div>
			<div class="form-group">
<table class="table table-hover" id="display-table">
    <thead>
        <th>Issue #</th>
        <th>Type</th>
<th>Chambers</th>
<th>Comments</th>
<th>Solved?</th>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Services</td>
		<td>GE1/1-X-S-PAK-0003</td>
<td>Constructed in pakistan</td>
<td>No</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Software</td>
		<td>GE1/1-X-S-NCP-3536</td>
<td>Constructed in pakistan</td>
<td>No</td>
        </tr>
        <tr>
            <td>3</td>
            <td>DAQ</td>
		<td>GE1/1-X-S-CERN-7777</td>
<td>Constructed at CERN</td>
<td>No</td>
        </tr>
<tr>
             <td>4</td>
            <td>On-Chamber electronics</td>
		<td>GE1/1-X-S-CERN-0004</td>
<td>Constructed at CERN</td>
<td>No</td>
        </tr>
<tr>
            <td>5</td>
            <td>Connectivity</td>
		<td>GE1/1-X-L-BARI-9867</td>
<td>Constructed at CERN</td>
<td>No</td>
        </tr>
    </tbody>
<tfoot>
        <th>Issues #</th>
        <th>Type</th>
<th>Chambers</th>
<th>Comments</th>
<th>Solved?</th>
    </tfoot>
</table>
	<div class="row" align="center">
	<small class="text-muted">Note:- <b>Click row to select the issue</b></small></div>		</div>
			</div>
 			<div class="col-sm-4" style="background-color:white;" align="center">
			<label> Additional Comments: </label>
			<div class="form-group">
				
 					<textarea rows="5" cols="45">

						</textarea> <br>
		<button type="button" class="btn btn-dafult">Submit</button>
			</div>
<hr>
			<div class="form-group" align="center">
				<label> Solution : </label><br>
				 <textarea rows="5" cols="45">

						</textarea> <br>
<button type="button" class="btn btn-success">Solved!</button>
			</div>
			</div>
	
				      
  					

			 </div>
			  
					

		</div>
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

<style>
.table-layout {
    text-align: center;
    border: 1px solid black;
    border-collapse: collapse;
    font-family:"Trebuchet MS";
    margin: 0 auto 0;
}
.table-layout td, .table-layout th {
    border: 1px solid grey;
    padding: 5px 5px 0;
}
.table-layout td {
    text-align: left;
}
.selected {
    color: white;
}
</style>
<script>
highlight_row();
function highlight_row() {
    var table = document.getElementById('display-table');
    var cells = table.getElementsByTagName('td');

    for (var i = 0; i < cells.length; i++) {
        // Take each cell
        var cell = cells[i];
        // do something on onclick event for cell
        cell.onclick = function () {
            // Get the row id where the cell exists
            var rowId = this.parentNode.rowIndex;

            var rowsNotSelected = table.getElementsByTagName('tr');
            for (var row = 0; row < rowsNotSelected.length; row++) {
                rowsNotSelected[row].style.backgroundColor = "";
                rowsNotSelected[row].classList.remove('selected');
            }
            var rowSelected = table.getElementsByTagName('tr')[rowId];
            rowSelected.style.backgroundColor = "   #3498db ";//#a569bd
            rowSelected.className += " selected";

            msg =  rowSelected.cells[0].innerHTML;
    $('#myModal').modal('toggle');
	//$(".modal-body").html('<div align="centre">You have selected the issue # <span class="label label-primary">'+msg+'</span>');
$(".modal-body").html('<div align="center"><button class="btn btn-primary" type="button"> You have selected issue # <b><span class="badge">'+msg+'</span></b></button></div>');
            //alert(msg);
        }
    }

}
</script>
