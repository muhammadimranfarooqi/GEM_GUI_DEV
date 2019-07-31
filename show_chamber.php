
<?php
include "head.php";
?>
<?php include "head_panel.php"; ?>



<div class="container-fluid">
    <div class="row">

        <?php include "side.php"; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"> <img src="images/c2.png" width="4%">Show Chamber  </h1>

            <!--<a href="edit_chamber.php?id=<?php /*echo $_GET["id"];*/ ?>"><button class="btn btn-success" type="button">Edit</button></a>-->
            <a href="list_chambers.php"><button class="btn btn-warning" type="button"><span aria-hidden="true" class="glyphicon glyphicon-backward"></span>Back to list</button></a>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Chamber [<?php echo $_GET["id"]; ?>] </h3>
                </div>
                <div class="panel-body">
                     <?php
                                $data = get_part_by_ID($_GET["id"]);
                                if (!empty($data)) {
                                    ?>
                   <div class="row">
                        <div class="col-md-8">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 "> 
                                    <table class="table table-user-information">
                                        <tbody>
                             <?php
                                    if (!empty($data[0]['PART_ID'])) {
                                        ?> <tr>
                                                <th>ID</th>
                                                <td><?= $data[0]['PART_ID'] ?></td>
                                            </tr> <?php
                                    }
                                    if (!empty($data[0]['SERIAL_NUMBER'])) {
                                        ?> <tr>
                                                <th>Serial Number:</th>
                                                <td><?= $data[0]['SERIAL_NUMBER'] ?></td>
                                            </tr> <?php
$serial_num = $data[0]['SERIAL_NUMBER'];
$check_long = '-L-';
if (strpos($serial_num, '-S-') !== false) {
  //  echo 'true';
    $check_long = '-S-';
//	echo $check_long;
}
                                    }

                                    if (!empty($data[0]['NAME_LABEL'])) {
                                        ?> 
                                            <tr>
                                                <th>Name Label:</th>
                                                <td><?= $data[0]['NAME_LABEL'] ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['BARCODE'])) {
                                        ?> 
                                            <tr>
                                                <th>Barcode:</th>
                                                <td> <?= $data[0]['BARCODE']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    
                                    if (!empty($data[0]['RECORD_INSERTION_TIME'])) {
                                        ?> 
                                            <tr>
                                                <th>Inserted at:</th>
                                                <td> <?= $data[0]['RECORD_INSERTION_TIME']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['RECORD_INSERTION_USER'])) {
                                        ?> 
                                            <tr>
                                                <th>Inserted by:</th>
                                                <td> <?= $data[0]['RECORD_INSERTION_USER']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['MANUFACTURER_ID'])) {
                                        ?> 
                                            <tr>
                                                <th>Manufacturer name:</th>
                                                <td><?= $data[0]['MANUFACTURER_ID']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['LOCATION_ID'])) {
                                        ?> 
                                             <tr>
                                                 <th>Location:</th>
                                                <td><?= $data[0]['LOCATION_ID']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['COMMENT_DESCRIPTION'])) {
                                        ?> 
                                            <tr>
                                                <th>Comment or description:</th>
                                                <td><?= $data[0]['COMMENT_DESCRIPTION']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                    </div>
</div>
</div>


<div class="row" class="col-md-12">
                                <div class="col-md-6"><div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Current Detector parts:</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="list-group">
                                                <?php get_attached_parts_show($data[0]['PART_ID']); ?>
                                            </ul>
                                        </div>

                                    </div>
</div>
                                 <div class="col-md-6"><div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">QC Result Status:</h3>
                                        </div>
                                        <div class="panel-body">
                                        


<div class="table-responsive">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th>QC Test</th>
                  <th>QC Result</th>
                <th> Elog Link</th>
                 <th>Comments</th>
                  <th>Record Insertion Time</th>
                </tr>
              </thead>
              <tbody>
                  <?php $chambers=  get_qc_result_data($serial_num);
          foreach( $chambers as $chamber){

              echo '<tr>
               <td>'.$chamber['QC_TEST'].'</td> 
                  <td>'.$chamber['QC_RESULT'].'</td>
		<td>'.$chamber['ELOG_LINK'].'</td> 
                  <td>'.$chamber['COMMENTS'].'</td>


 <td>'.$chamber['INSERTION_DATE'].'</td>
                </tr>';
          }

          ?>
              </tbody>
            </table>
          </div>





</div>

                                    </div>
</div>
</div>
















                                            <?php
                                } else {
                                    echo "No Item found for this ID";
                                }
                                ?>
                   



</div>
</div>

<?php
include "foot.php";
?>
<script>
$("#chamber").attr("class","active");
$(document).ready(function() { $('#example').DataTable(

{
        "order": [[ 1, "asc" ]]
    } 

); } );

</script>

