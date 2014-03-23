<?php
$path = "../";
require $path . 'includes/session_chk.php';
require $path . "includes/header-manager.php";
?>
<script type="text/javascript">
    $(function(){
        $('#remove_document').validate({
            submitHandler:function(){
                document.remove_document.submit();
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
    <form name="remove_document" id="remove_document" method="post" action="remove_document_db.php">
        <fieldset><legend>Remove Document</legend>
            <table>
                <tr>
                    <td><label>Title</label></td>
                    <td><input type="text" name="title" class="required"></td>
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
                    <td><input type="checkbox" name="agree" value="yes" onclick="agreement_remove_document();"><label>Are the details correct?</label></td>
                </tr>

                <tr>
                    <td><input type="submit" name="btn" value="List" disabled></td>
                    <td><input type="button" name="c_btn" value="Back" ></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <?php
                            if ($_GET[status] == 1) {
                                echo "Document :" . $_GET[title] . " was removed.";
                            } elseif ($_GET[status] == 2) {
                                echo "Document :" . $_GET[title] . " was not removed.";
                            } else {

                            }
    ?>
    <?php require ($path . "includes/footer-manager.php"); ?>
