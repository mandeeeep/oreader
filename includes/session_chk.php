<?php session_start();
if (!isset($_SESSION[manager])) {
    $status = 2;  
?>
<!-- echo "<script type='text/javascript'>window.location='".$path."'</script>";-->
<script type="text/javascript">
    window.location="../index.php?status=<?php echo $status; ?>";
</script>
<? }?>