<html>
    <head>
        <script type="text/javascript" src="<?php echo $path; ?>includes/js/open.js">
        </script>
        <script type="text/javascript" src="<?php echo $path; ?>includes/js/jquery-lib.js">
        </script>
        <script type="text/javascript" src="<?php echo $path; ?>includes/js/jquery.validate.min.js">
        </script>

        <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>includes/styles/open.css">



    </head>
    <div class="wrapper">
        <body>

            <div class="upper">
                <fieldset><legend>Administration Menu</legend>
                    <table>
                        <tr valign="top">
                            <td class="bd">
                                <fieldset><legend>Add</legend>
                                    <ul>
                                        <li><a href="<?= $path ?>manager/add_document.php">Documents</a></li>
                                        <li><a href="<?= $path ?>manager/add_manager.php">Manager</a></li>                                        
                                    </ul>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset><legend>Remove</legend>
                                    <ul>
                                        <li><a href="<?= $path ?>manager/remove_document.php">Documents</a></li>                                        
                                        <li><a href="<?= $path ?>manager/remove_manager.php">Manager</a></li>                                        
                                    </ul>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset><legend>Details & Search</legend>
                                    <ul>
                                        <li><a href="<?= $path ?>manager/documents_search.php">Document Search </a></li>
                                        <li><a href="<?= $path ?>manager/documents_detail.php">Documents</a></li>
                                    </ul>
                                </fieldset>                            
                        <tr>
                            <td>                                
                                    <ul>
                                        <li><a href="<?= $path ?>includes/session_end.php">Log Out</a></li>
                                    </ul>                                
                            </td>
                        </tr>
                    </table>

                </fieldset>
            </div>
            <div style="clear:right;">&nbsp;</div>
