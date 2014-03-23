<?php
$path = "../";
require $path . 'includes/session_chk.php';
require $path . "includes/header-manager.php";
?>
<script type="text/javascript">
    $(function(){
        $('#add_document').validate({
            submitHandler:function(){
                document.add_document.submit();
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

    <form name="add_document" id="add_document" enctype="multipart/form-data" action="add_document_db.php" method="post" onsubmit="return validate_add_document(this)">
        <fieldset><legend>Add Book</legend>
            <table>
                <tr>
                    <td><label>Title</label></td>
                    <td><input type="text" name="title" class="required"></td>
                </tr>
                <tr>
                    <td><label>Author</label></td>
                    <td><input type="text" name="author" ></td>
                </tr>
                <tr>
                    <td><label>Tags(if any)</label></td>
                    <td><input type="text" name="tags"></td>
                </tr>
                <tr>
                    <td><label>Description(if any)</label></td>
                    <td><textarea name="description"></textarea></td>
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
<!--                            <td>&nbsp;</td>-->

                </tr>
                <tr>
                    <td><label>File</label></td>
                    <td><input type="file" name="file_path"></td>
                </tr>
                <tr>
                <tr>
                    <td><input type="checkbox" name="agree" value="yes" onclick="agreement_add_document();"><label>Are the details correct?</label></td>
                </tr>
                <td>
                    <input type="submit" name="btn" value="Add" disabled>
                    <input type="reset" name="btn_r" value="Cancel">
                </td>
                </tr>
            </table>
        </fieldset>
    </form>

    <?php
                            if ($_GET['status'] == 1) {
                                echo "Book succesfully added";
                            } elseif ($_GET['status'] == 2) {
                                echo "Book not added";
                            } else {
                                
                            }
    ?>
    <?php require ($path . "includes/footer-manager.php"); ?>
