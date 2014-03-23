<?php

$path = "../";
require $path . 'includes/session_chk.php';
require $path . 'includes/connect.php';
require "../includes/header-manager.php";
$title = $_POST[title];
$semster = $_POST[semester];
$subject = $_POST[subject];

$q1 = "
SELECT d.do_id,d.do_title, d.do_author,s.su_name
       FROM document d
       JOIN subject s ON d.do_su_id=s.su_id
       WHERE 1=1 ";
if ($_POST['title'] != '')
    $q1 .= " AND d.do_title like '%$_POST[title]%' ";
if ($_POST['subject'] != '')
    $q1 .= " AND d.do_su_id = '$_POST[subject]' ";
$result = mysql_query($q1, $connect);
?>
<script type="text/javascript">
    $(function(){
        $('.del-btn').click(function(){
            if(confirm('Are you sure you want to delete this document?')){
                return true;
            }else{
                return false;
            }
        });
    });
</script>
<?

echo "<div class='lower'>";
echo "<fieldset><legend>Remove Document</legend>";
echo "<table class='tab'><tr><td>Title</td><td>Author</td><td>Subject</td></tr>";
while ($array = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $array[1] . "</td>";
    echo "<td>" . $array[2] . "</td>";
    echo "<td>" . $array[3] . "</td>";
    $del_title = $array[1];
    $del_subject = $array[2];
    echo "<td>" . "<a class='del-btn' href='document_remover_alt.php?id=" . $array[0] . "'>Delete</a>" . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</fieldset>";

if (!$result1) {
    $status = 2;
} else {
    $status = 1;
}
mysql_close($connect);
?>
<?php

if ($_GET[status] == 1) {
    echo "Document " . $_GET[idd] . " was removed.";
} elseif ($_GET[status] == 2) {
    echo "Document " . $_GET[idd] . " was not removed.";
} else {

}
?>
