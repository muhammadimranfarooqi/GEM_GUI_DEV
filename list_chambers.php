
<?php 
include "head.php";


?>
<?php include "head_panel.php"; ?>


    <div class="container-fluid">
      <div class="row">
<?php  include "side.php"; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><img src="images/c2.png" width="4%"> Chambers List</h1>

<a href="new_chamber.php"><button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new chamber</button></a>
<!--<form class="navbar-form navbar-right">
           <span class="glyphicon glyphicon-search" aria-hidden="true"></span> <input class="form-control" placeholder="Search for chamber" type="text">
          </form> -->
          <h2 class="sub-header">List</h2>
          
          
                  <div class="table-responsive">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
<!--                  <th>#</th>-->
                  <th>Serial</th>
<!--                  <th>Status</th>-->
                  <th>User responsible</th>
                <th> Record Insertion Date / Time</th> 
		 <th>Show</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                  <?php $chambers=  get_list_part_ID($CHAMBER_KIND_OF_PART_ID);
          //print_r($chambers);
          foreach( $chambers as $chamber){
               
              echo '<tr>
             <!--  <td>'.$chamber['PART_ID'].'</td> -->
                  <td>'.$chamber['SERIAL_NUMBER'].'</td>
                  
                  <td><span aria-hidden="true" class="glyphicon glyphicon-user"> '.$chamber['RECORD_INSERTION_USER'].' </span></td>
 <td><span aria-hidden="true" class="glyphicon glyphicon-user"> '.$chamber['INSERTION_DATE'].' </span></td>           
       <td><a href="show_chamber.php?id='.$chamber['SERIAL_NUMBER'].'"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show</button></a></td>
                  <td><a href="edit_chamber_new.php?id='.$chamber['SERIAL_NUMBER'].'"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Edit</button></a></td>
                </tr>';
          }
          
          ?>
              </tbody>
            </table>
          </div>
<!--          <nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>-->
        </div>
          
      </div>
        
         
    </div>



  <?php 
include "foot.php";

?>
<script>
$("#chamber").attr("class","active");
$(document).ready(function() { $('#example').DataTable(); } );

</script>
