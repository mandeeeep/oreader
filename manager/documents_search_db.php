<?php
$path = "../";
require "../includes/connect.php";
require "../includes/session_chk.php";
require "../includes/header-manager.php";
?>
<div class="lower">
    <fieldset><legend>Documents Search</legend>
        <?php
        $q1 = "
SELECT d.do_title, d.do_author,s.su_name
       FROM document d
       JOIN subject s ON d.do_su_id=s.su_id
       WHERE 1=1 ";
        if ($_POST['title'] != '')
            $q1 .= " AND d.do_title like '%$_POST[title]%' ";
        if ($_POST['author'] != '')
            $q1 .= " AND d.do_author like '%$_POST[author]%' ";
        if ($_POST['subject'] != '')
            $q1 .= " AND d.do_su_id = '$_POST[subject]' ";
        if ($_POST['tags'] != '')
            $q1 .= " AND d.do_tags like '%$_POST[tags]%' ";
        if ($_POST['description'] != '')
            $q1 .= " AND d.do_desc like '%$_POST[description]%' "; $result = mysql_query($q1, $connect);
        echo "<table class='tab'><tr><td>Title</td><td>Author</td><td>Subject</td></tr>";
        while ($array = mysql_fetch_array($result)) {
            echo "<tr>";
            for ($i = 0; $i < 3; $i++) {
                echo "<td>" . $array[$i] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </fieldset>
<?php require "../includes/footer-manager.php" ?>