<?php
if($_GET['doc']!='' && is_file('files/'.$_GET['doc'])):
    $file = 'files/'.$_GET['doc'];
    ob_clean();
    header('Accept-Ranges: bytes');
    header('Content-Length: ' . filesize($file));
    header('Content-Disposition: attachment; filename=' . $_GET['doc']);
    // uncomment  the following three lines if you wish to avoid browser cache.
    header('Expires: Thu, 01 Jan 1970 00:00:00 GMT, -1');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    echo file_get_contents('files/'.$_GET['doc']);
endif;
exit;