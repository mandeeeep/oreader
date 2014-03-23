<?php
$path = "../";
require $path . 'includes/session_chk.php';
require $path . 'includes/connect.php';
$mgr=$_SESSION[mid];
if($_FILES['file_path']['error'] == 0){
    $tst = strtotime(date("Y-m-d h:i:s"));
    $frag = explode('.', $_FILES['file_path']['name']);
    //extension will always be the last array and also lower case it
    $ext = strtolower($frag[count($frag)-1]);
    $filename = $tst.'.'.$ext;
    //finally move uploaded tempo file to destination dir 
    move_uploaded_file($_FILES['file_path']['tmp_name'], $path.'files/'.$filename);
}
$q="INSERT into document(do_title,do_author,do_su_id,do_tags,do_desc,do_up_id,do_filepath)
    VALUES('$_POST[title]','$_POST[author]','$_POST[subject]','$_POST[tags]','$_POST[description]','$mgr','$filename')";
$result=mysql_query($q,$connect);
//echo $q;
if(!$result)
{
    $status=2;
}
else{
    $status=1;
}
mysql_close($connect);
?>
<script type="text/javascript">
    window.location="add_document.php?status=<?php echo $status; ?>";
</script>
