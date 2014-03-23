<?php
if($_POST['manager']!=''):
    $path = "../";
    require $path . 'includes/session_chk.php';
    require $path . 'includes/connect.php';
    $manager = $_POST[manager];
    $q1 = "DELETE FROM uploader WHERE up_id='$manager'";
    $result1 = mysql_query($q1, $connect);
    if (!$result1) {
        $status = 2;
    } else {
        $status = 1;
    }
    mysql_close($connect);
endif;
?>
<script type="text/javascript">
    window.location="remove_manager.php?manager=<?php echo $manager; ?>&&status=<?php echo $status; ?>";
</script><?php
