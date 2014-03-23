<?php

$path = "../";
require $path . 'includes/session_chk.php';
require $path . 'includes/connect.php';
$id = $_GET[id];

$q1 = "DELETE FROM document WHERE do_id='$id'";
$result1 = mysql_query($q1, $connect);
if (!$result1) {
    $status = 2;
} else {
    $status = 1;
}
mysql_close($connect);
?>
<script type="text/javascript">
    window.location="remove_document_db.php?idd=<?php echo $id; ?>&&status=<?php echo $status; ?>";
</script>