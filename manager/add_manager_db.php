<?php
$path = "../";
require $path . 'includes/session_chk.php';
require $path . 'includes/connect.php';
$q="INSERT into uploader(up_uname,up_pwd,up_name)
    VALUES('$_POST[mgr_uname]',md5('$_POST[mgr_pwd]'),'$_POST[mgr_name]')";
$result=mysql_query($q,$connect);
echo $q;
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
    window.location="add_manager.php?status=<?php echo $status; ?>";
</script>
