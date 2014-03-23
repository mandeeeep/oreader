<?php
if($_GET[status]==1)
{
    echo "Invalid manager or password";
}
$path="../";
?>
<html>
    <head>
        <script type="text/javascript" src="<?php echo $path; ?>includes/js/jquery-lib.js">
        </script>
        <script type="text/javascript" src="<?php echo $path; ?>includes/js/jquery.validate.min.js">
        </script>
<!--        <script type="text/javascript" src="<?php echo $path; ?>includes/js/open.js">
        </script>-->
        <link rel="stylesheet" type="text/css" href="../includes/styles/open.css">
        
        <script type="text/javascript">
    $(function(){
        $('#manager_frm').validate({
            submitHandler:function(){
                document.manager_frm.submit();
            }
        });
          });

        </script>
            
        
    </head>
    <body>
        <form  name="manager_frm" id="manager_frm" method="post" action="mgr_indx_db.php" onsubmit="return validate_manager(this);">
            <table>
                <tr>
                    <td><label>Username</label></td>
                    <td><input type="text" name="mgr" class="required"></td>
                </tr>

                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" name="pwd" class="required"></td>
                </tr>

                <tr>
                    <td><input type="submit" name="submit" value="Login"></td>
                    <td><input type="reset" name="reset" value="Cancel"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
