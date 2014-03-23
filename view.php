<?php
if($_GET['doc']!=''):
    $file = trim($_GET['doc']);
    $frag = explode('.',$file);
    $ext = strtolower($frag[count($frag)-1]);
    if($ext == 'pdf' && file_exists('files/'.$file)){
        $valid_pdf = TRUE;
    }else{
        $valid_pdf = FALSE;
        ob_clean(); //clear output buffer incase for header error
        header('Location:files/'.$file);
        exit;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Open Reader Web Viewer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css" media="screen">
			html, body	{ height:100%;background: white;
    font : 8pt/160% 'Lucida Grande',Tahoma; }
			body { margin:0; padding:0; overflow:auto; }
			#flashContent { display:none; }
        </style>

		<script type="text/javascript" src="<?=$path?>includes/js/jquery-lib.js"></script>
		<script type="text/javascript" src="<?=$path?>includes/flex/js/flexpaper_flash.js"></script>
    </head>
    <body>
    	<div align="center" style="margin:0 auto;width:760px;">
            <a href="javascript:void(0);" onclick="window.close();">[close this window]</a>
	        <p id="viewerPlaceHolder" style="width:760px;height:553px;display:block">Document loading..</p>

			<?php if($valid_pdf){ ?>
	        	<script type="text/javascript">
				var doc = '<?php print $file; ?>';

				var fp = new FlexPaperViewer(
						 'FlexPaperViewer',
						 'viewerPlaceHolder', { config : {
						 SwfFile : escape('includes/flex/php/services/view.php?doc='+doc),
						 Scale : 0.8,
						 ZoomTransition : 'easeOut',
						 ZoomTime : 0.5,
						 ZoomInterval : 0.2,
						 FitPageOnLoad : false,
						 FitWidthOnLoad : true,
						 PrintEnabled : true,
						 FullScreenAsMaxWindow : false,
						 ProgressiveLoading : false,
						 MinZoomSize : 0.2,
						 MaxZoomSize : 5,
						 SearchMatchAll : false,
						 InitViewMode : 'Portrait',

						 ViewModeToolsVisible : true,
						 ZoomToolsVisible : true,
						 NavToolsVisible : true,
						 CursorToolsVisible : true,
						 SearchToolsVisible : true,

  						 localeChain: 'en_US'
						 }});

				function onDocumentLoadedError(errMessage){
					$('#viewerPlaceHolder').html("Error displaying document. Make sure the conversion tool is installed and that correct user permissions are applied to the SWF Path directory ");
				}
	        </script>
		<?php }else{ ?>
			<script type="text/javascript">
				$('#viewerPlaceHolder').html('Cannot read pdf file path, please check your configuration');
			</script>
		<?php } ?>
        </div>
	
   </body>
</html>
<? endif;?>