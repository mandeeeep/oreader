<?php
$path = "../";
require $path.'includes/connect.php';
/*never ever add session checking page at the login working page*/
$mgr = trim($_POST['mgr']);
$pwd = md5(trim($_POST['pwd']));
$q = "select up_id,up_uname from uploader where up_uname='$mgr' and up_pwd='$pwd'";
$result = mysql_query($q, $connect);
$check = mysql_num_rows($result);
if ($check > 0) {
    session_start();
    $login = mysql_fetch_array($result);
    $_SESSION[mid] = $login['up_id'];
    $_SESSION[manager] = $login['up_uname'];
    echo "<script type='text/javascript'>window.location='add_document.php'</script>";
} else {
    $status = 1;
    echo "<script type='text/javascript'>window.location='../index.php?status=$status'</script>";
}
?>




