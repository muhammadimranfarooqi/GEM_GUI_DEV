<?php include "head.php"?> 
<?php

           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               include_once "functions/functions.php";
                include_once "functions/generate_xml.php";
                include_once "functions/globals.php";
                if (isset($_POST['serial_number'])) {


                    $temp = array();
                    $arr = array();
                    /*
                    echo '<div role="alert" class="alert alert-success">
      <strong>Well done!</strong> You successfully created Gem Chamber <strong>ID:</strong> ' . $_POST['serial'] .
                    '</div>';*/
                //    $temp[$PART_ID] = $_POST['part_id'];
                    $temp[$SERIAL_NUMBER] = $_POST['serial_number'];
                    

//$temp[$NAME_LABEL] = $_POST['serial'];
               //     if (isset($_POST['location'])) {
                        //echo $_POST['location'];
                        $temp[$LOCATION] = $_POST['location'];
                 //   }

                   // $type = $_POST['type'];


                    $kindOfPart = $SUPER_CHAMBER_KIND_OF_PART_NAME;
                    //echo  $kindOfPart;
                    $temp[$KIND_OF_PART] = $kindOfPart;


                    $arr[] = $temp;
//print_r ($arr);

                    $res_arr = generateXml($arr);
                    
                    header('Location: edit_sup_chamber.php?id='.$temp[$SERIAL_NUMBER]);
                        die();
                    
                    
                }
            }

//include "head.php";
?>
<?php include "head_panel.php"; ?>
<?php 
include "foot.php";
?>
