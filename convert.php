<?php

if(isset($_POST["submited"])){
include_once "functions/functions.php";
include_once "functions/generate_xml.php";
include_once "functions/globals.php";
$conn = database_connection();
//if(isset($_FILES["file"])){
//$output = shell_exec("python my_code.py PATH_TO_XLS_FILE");
//$out="xlsm";
//$temp=array();
$CHAMBER= $_POST['CHAMBER'];
$CHAMBER=htmlspecialchars($CHAMBER, ENT_QUOTES, 'UTF-8');
$CHAMBER= htmlentities($CHAMBER);
$RUN_NUMBER = $_POST['RUN_NUMBER'];
$RUN_TYPE = $_POST['RUN_TYPE'];
$RUN_BEGIN_TIMESTAMP = date($_POST['RUN_BEGIN_TIMESTAMP'].':s');
$RUN_END_TIMESTAMP = date($_POST['RUN_END_TIMESTAMP'].':s');
$LOCATION = $_POST['LOCATION'];
$INITIATED_BY_USER = $_POST['INITIATED_BY_USER'];
$COMMENT_DESCRIPTION = $_POST['COMMENT_DESCRIPTION'];
$ELOG= $_POST['Elog_Link'];
$FILE= $_POST['File_Name'];
$COMMENT= $_POST['comment'];
//$sql="SELECT KIND_OF_CONDITION_ID, NAME FROM CMS_GEM_CORE_COND.KINDS_OF_CONDITIONS WHERE IS_RECORD_DELETED = 'F'";
//sql="select NAME FROM CMS_GEM_CORE_COND.KINDS_OF_CONDITIONS WHERE IS_RECORD_DELETED = 'F'";
//sql = "SELECT SERIAL_NUMBER FROM CMS_GEM_CORE_CONSTRUCT.PARTS WHERE KIND_OF_PART_ID='" . $part_id . "' ORDER BY SUBSTR(SERIAL_NUMBER, -4)  asc ";
//$sql = "select nvl(max(run.RUN_NUMBER), 0) + 1 from cms_gem_core_cond.cond_data_sets dat join cms_gem_core_cond.kinds_of_conditions koc on dat.KIND_OF_CONDITION_ID = 'koc.KIND_OF_CONDITION_ID' join CMS_GEM_CORE_CONSTRUCT.PARTS par on par.PART_ID = 'dat.PART_ID' join CMS_GEM_CORE_COND.COND_RUNS run on dat.COND_RUN_ID = 'run.COND_RUN_ID' where koc.IS_RECORD_DELETED = 'F' and par.IS_RECORD_DELETED = 'F' and koc.name = 'GEM Chamber QC3 Gas Leak Calib Data'and par.SERIAL_NUMBER ='GE1/1-VII-S-CERN-0006'";

//$query = oci_parse($conn, $sql);
//$arr = oci_execute($query);
//echo $arr;
//$result = array();
//$item = array();
     
//      echo '<a href="#" >' . $row['DISPLAY_NAME'] ."<=>".  $row['KIND_OF_PART_ID']. '</a><br>';
      //    $result [$row['NAME']] = $row['KIND_OF_CONDITION_ID'];
     // }
      //return $result;
$FileName= $_FILES['file']['name'];
$FileTmp= $_FILES['file']['tmp_name'];
$FileType= $_FILES['file']['type'];
$FileSize= $_FILES['file']['size'];
$FileError=$_FILES['file']['error'];
$FileName = preg_replace("#[^a-z0-9.]#i","_",$FileName);

//$extension = array_pop(explode(".", $_FILES["file"]["name"])); // return file extension

//if(in_array($extension, array("xls", "txt", "xlsx","dat","xlsm"))) // check if extension is valid
//{
  // if($_FILES['file']['size'] > 512*1024) // check file size is above limit
   //{
     //  echo "File size above limit";
   //}
  // else
   //{
     //  move_uploaded_file($_FILES['file']['tmp_name'],"".$_FILES['file']['name']); // moving uploaded file
   //}
//}
//else
//{
//echo "Invalid file type";
//echo "<div align='center'>File is Invalid</div>";
//echo "<div align='center'>Please upload a correct File Formate</div>";
//if (($FileSize > 2000000)){
//	die("Error - File is too Long");
//}
//if (!$FileTmp){
//	die("No File Selected, Please Upload Again");
//}else{
//	move_uploaded_file($FileTmp,"$FileName");
//}}
//}}
}
?>
<!--$LocalFilePATH = "gen_xml/" . $serialNum . ".xml";-->

<?php
  include "head.php";
  ?>
<?php include "side.php"; ?>
<?php
//$LocalFileName =  $FileName;
//Generate the file and save it on directory
//$xml->save("gen_xml/" . $FileName . ".xml"); // or die("Error");
// Send the file to the spool area
//$res_arr = SendXML($LocalFilePATH);
 
//return $res_arr;
// Set session variables with the return 
   //                 session_start() ;
     //               $_SESSION['post_return'] = $res_arr;
       //             $_SESSION['new_chamber_ntfy'] = '<div role="alert" class="alert alert-success">
      //<strong>Well done!</strong> You successfully generated XML file for a list of GEM FOIL(s) data 
                   // </div>';
                    // redirect to confirm page
        //            header('Location: https://gemdb.web.cern.ch/gemdb/confirmation.php'); //?msg='.$msg."&statusCode=".$statusCode."&return=".$return
          //              die();

//$output = shell_exec("python QC_Data_SERVER_COPY.py QC3_GE11.xlsm $out" );
//$output = shell_exec("python QC_Data_SERVER_COPY.py QC3_GE11.xlsm 2>&1" );
//$output = shell_exec("which python " );
//$output = shell_exec("/afs/cern.ch/user/m/mimran/www/dev/my_env_new/bin/python QC_Data_SERVER_COPY.py QC3_GE11.xlsm $Run 2>&1" );
$output = shell_exec("/afs/cern.ch/user/m/mimran/www/dev/my_env_new/bin/python QC3_Data_SERVER_COPY.py $FileName $RUN_NUMBER $LOCATION $INITIATED_BY_USER $COMMENT_DESCRIPTION $RUN_BEGIN_TIMESTAMP $RUN_END_TIMESTAMP $ELOG $FILE $COMMENT ");
//$output = shell_exec("/afs/cern.ch/user/m/mimran/www/dev/my_env_new/bin/python QC_Data_SERVER_COPY.py QC3_GE11.xlsm $chamber $RUN_NUMBER 2>&1" );
//$output = shell_exec("python QC_Data_SERVER_COPY.py QC3_GE11.xlsm $out" );
//echo "Output by Python Code ::: ".$output;
//$output = shell_exec("python QC_Data_SERVER_COPY.py QC3_GE11.xlsm $out" );
$output = json_decode($output);
echo var_dump($_POST);
//echo $out;
echo $output;
#echo $output->var+1000 ;
//echo "\n";
//echo "Chamber Name::" .$CHAMBER;
//echo "Run Number::".$RUN_NUMBER;
//echo "Star ::".$RUN_BEGIN_TIMESTAMP;
//echo "Stop::".$RUN_END_TIMESTAMP;
//echo "Location::".$LOCATION;
//echo "User::".$INITIATED_BY_USER;
//echo "Comment::".$COMMENT_DESCRIPTION;
//echo "File Name::".$FileName;
//echo "New Run::".$arr;
?>
<?php
 include "foot.php";
 ?>

