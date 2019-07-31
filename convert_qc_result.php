<?php
include "head.php";

if(isset($_POST["submited"])){
include_once "functions/functions.php";
include_once "functions/generate_xml.php";
include_once "functions/globals.php";
include_once "functions/generate_xml.php";
$conn = database_connection();
$CHAMBERS= $_POST['CHAMBER'];
$CHAMBER= trim($CHAMBERS);
$QC_TEST = $_POST['QC_TEST'];
$QC_RESULT = $_POST['QC_RESULT'];
$ELOG_LINK = $_POST['ELOG_LINK'];
$COMMENT_DESCRIPTION = $_POST['COMMENT_DESCRIPTION'];
$FileName = 'QC_RESULT'; 
$output=shell_exec("my_env_new/bin/python QC_Result.py '$FileName' '$CHAMBER' '$QC_TEST' '$QC_RESULT' '$ELOG_LINK' '$COMMENT_DESCRIPTION'");
$LocalFilePATH =  $FileName .".xml";
$check = shell_exec ("zip  archive-$(date +'%Y-%m-%d-%H-%M-%S').zip $LocalFilePATH");
{
//foreach (glob("images/*.jpg") as $large) 
foreach (glob("*.zip") as $filename) { 
//echo "$filename\n";
//echo str_replace("","","$filename\n");
echo str_replace("","","<a href='$filename'>$filename</a>\n");
}
}
// Send the file to the spool area
$res_arr = SendXML($filename);
//echo $res_arr;
//echo var_dump($res_arr) ;
}
?>
<?php
function unlinkr($dir, $pattern = "*") {
    // find all files and folders matching pattern
    $files = glob($dir . "/$pattern"); 

    //interate thorugh the files and folders
    foreach($files as $file){ 
    //if it is a directory then re-call unlinkr function to delete files inside this directory     
        if (is_dir($file) and !in_array($file, array('..', '.')))  {
            //echo "<p>opening directory $file </p>";
            unlinkr($file, $pattern);
            //remove the directory itself
            //echo "<p> deleting directory $file </p>";
            rmdir($file);
        } else if(is_file($file) and ($file != __FILE__)) {
            // make sure you don't delete the current script
            //echo "<p>deleting file $file </p>";
            unlink($file); 
        }
    }
}
$dir= getcwd();
//echo $dir;
unlinkr ($dir, "*.xml");
unlinkr ($dir, "*.zip");
 $_SESSION['post_return'] = $res_arr;
                    $_SESSION['new_chamber_ntfy'] = '<div role="alert" class="alert alert-success">
       You successfully created zip file QC Result.  <strong>ID:</strong> ' . $filename .
                    '</div>';
                    // redirect to confirm page
                    header('Location: confirmation.php'); //?msg='.$msg."&statusCode=".$statusCode."&return=".$return
                        die();
?>
<//?php include "side.php"; ?>
<?php
 include "foot.php";
 ?>
