<?php

$path = "./";
require $path . 'includes/connect.php';
require 'index.php';

echo "<div class='lower'>";
$q1 = "
SELECT d.do_title, d.do_author,s.su_name,d.do_filepath
       FROM document d
       JOIN subject s ON d.do_su_id=s.su_id
       WHERE 1=1 ";
if($_POST['title']!='')
    $q1 .= " AND d.do_title like '%$_POST[title]%' ";
if($_POST['author']!='')
    $q1 .= " AND d.do_author like '%$_POST[author]%' ";
if($_POST['subject']!='')
    $q1 .= " AND d.do_su_id = '$_POST[subject]' ";
if($_POST['tags']!='')
    $q1 .= " AND d.do_tags like '%$_POST[tags]%' ";
if($_POST['description']!='')
    $q1 .= " AND d.do_desc like '%$_POST[description]%' ";
//echo $q1;
$result1 = mysql_query($q1, $connect);?>
<fieldset>
    <legend>Result</legend>
    <table class='tab'><tr><td>Title</td><td>Author</td><td>Subject</td><td>Actions</td></tr>
        <? while ($array = mysql_fetch_array($result1)) {?>
        <tr>
            <td><a href='./manager/add_document.php'><?=$array[0]?></a></td>
            <td><?=$array[1]?></td>
            <td><?=$array[2]?></td>
            <td><a target="_blank" href="view.php?doc=<?=$array[3]?>">View</a> | <a href="down.php?doc=<?=$array[3]?>">Download</a></td>
        </tr>
        <? }?>
    </table>
</fieldset>
</div>



