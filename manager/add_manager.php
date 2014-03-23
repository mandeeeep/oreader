<?php
$path = "../";
require $path . 'includes/session_chk.php';
require $path . "includes/header-manager.php";
?>
<script type="text/javascript">
    $(function(){
        $('#add_manager').validate({
            submitHandler:function(){
                document.add_manager.submit();
            }
        });
          });

        </script>
<div class="lower">

        <form name="add_manager" id="add_manager" action="add_manager_db.php" method="post" onsubmit="return validate_add_manager(this);">
            <fieldset><legend>Add Manager</legend>
            <table>
            <tr>
                    <td><label>Manager Name</label></td>
                    <td><input type="text" name="mgr_name" class="required"></td>
                </tr>
            <tr>
                    <td><label>Username</label></td>
                    <td><input type="text" name="mgr_uname" class="required"></td>
                </tr>

                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" name="mgr_pwd" class="required"></td>
                </tr>

            <tr>
                <td>
                    <input type="submit" name="btn" value="Add Manager">
                    <input type="reset" name="btn_r" value="Cancel">
                </td>
            </tr>
                </table>
                </fieldset>
        </form>

    <?php if ($_GET['status'] == 1) {
    echo "Manager succesfully added";
} elseif ($_GET['status'] == 2) {
    echo "Manager not added";
} else {

}
?>
    <?php require ($path . "includes/footer-manager.php"); ?>
