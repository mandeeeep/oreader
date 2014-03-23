<?php
$path = "../";
require $path . "includes/connect.php";
require $path . "includes/session_chk.php";
require $path . "includes/header-manager.php";
?>
<script type="text/javascript">
    $(function(){
        $('#documents_search').validate({
            submitHandler:function(){
                document.documents_search.submit();
            }
        });
<?php
require ($path . "includes/connect.php");
$q1 = "SELECT su_id,su_name,su_se_id FROM subject WHERE 1";
$result1 = mysql_query($q1, $connect);
$subjects = array();
while ($array = mysql_fetch_array($result1)) {
    array_push($subjects, "[" . $array[0] . ",'" . $array[1] . "'," . $array[2] . "]");
}
$subjects = implode(',', $subjects);
?>
                    var subject = [<?= $subjects; ?>];
                    var lastchk = <?= ($_POST[semester] != '') ? $_POST[semester] : 0; ?>;
                    $('#semester-cl').change(function(){
                        var currentSemester = $(this).val();
                        $('#subject-cl').html('');
                        for(x in subject){
                            if(subject[x][2] == currentSemester){
                                $('#subject-cl').append('<option value="'+subject[x][0]+'" >'+subject[x][1]+'</option>');
                            }
                        }
                    });
                    $('#semester-cl').trigger('change');

                });
</script>
<div class="lower">
    <form name="documents_search" id="documents_search" action="documents_search_db.php" method="post" onsubmit="return validate_add_document(this);">
        <fieldset><legend>Documents Search</legend>
            <table>
                <tr>
                    <td><label>Title</label></td>
                    <td><input type="text" class="required" name="title" value="<?=$_POST[title]?>"></td>
                </tr>
                <tr>
                    <td><label>Author</label></td>
                    <td><input type="text" name="author" value="<?=$_POST[author]?>"></td>
                </tr>
                <tr>
                    <td><label>Tags(if any)</label></td>
                    <td><input type="text" name="tags" value="<?=$_POST[tags]?>"></td>
                </tr>
                <tr>
                    <td><label>Description(if any)</label></td>
                    <td><input type="text" name="description" value="<?=$_POST[description]?>"></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td><select name="semester" id="semester-cl">
                            <option value="">Select semester</option>
                             <?php
                            $lastchk = $_POST[semester];
                            $q1 = "SELECT * FROM semester WHERE 1";
                            $result1 = mysql_query($q1, $connect);
                            while ($array = mysql_fetch_array($result1)) {
                                $sel = ($lastchk == $array[0]) ? 'selected' : '';
                                echo "<option value=" . $array[0] . " $sel>" . $array[1] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>Subject</td>
                    <td><select name="subject" id="subject-cl">
                        </select>
                    </td>
                </tr>
                 <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="submit" name="btn" value="Search">
                                    <input type="reset" name="btn_r" value="Cancel">
                                </td>
                            </tr>
            </table>
        </fieldset>
    </form>
    <?php
                            require $path . "includes/footer-manager.php";
    ?>


