<?php
$path = "../";
require $path . 'includes/session_chk.php';
require $path . "includes/header-manager.php";
?>
<div class="lower">
    <form name="remove_manager" method="post" action="remove_manager_db.php">
        <fieldset><legend>Remove Manager</legend>
            <table>
                <tr>
                    <td><label>Manager</label></td>
                    <td><select name="manager">
                            <?php
                            require ($path . "includes/connect.php");
                            $q1 = "SELECT up_id, up_name FROM uploader WHERE up_id != $_SESSION[mid]";
                            $result1 = mysql_query($q1, $connect);
                            while ($array = mysql_fetch_array($result1)) {
                                echo "<option value=" . $array[0] . ">" . $array[1] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="agree" value="yes" onclick="agreement_remove_manager();"><label>Are the details correct?</label></td>
                </tr>

                <tr>
                    <td><input type="submit" name="btn" value="Remove" disabled></td>
                    <td><input type="button" name="c_btn" value="Back" ></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <?php
                            if ($_GET[status] == 1) {
                                echo "Manager:" . $_GET[manager] . " was removed.";
                            } elseif ($_GET[status] == 2) {
                                echo "Manager:" . $_GET[manager] . " was not removed.";
                            } else {

                            }
    ?>
    <?php require ($path . "includes/footer-manager.php"); ?>
