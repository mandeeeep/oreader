; <?php exit; ?> DO NOT REMOVE THIS LINE
[general]
 path.pdf = "D:\wamp\www\oreader\files\"
 path.swf = "D:\wamp\www\oreader\includes\flex\php\docs\"
 
[external commands]
 cmd.conversion.singledoc = "D:\wamp\www\oreader\includes\SWFTools\pdf2swf.exe {path.pdf}{pdffile} -o {path.swf}{pdffile}.swf -f -T 9 -t -s storeallcharacters"
 cmd.conversion.splitpages = "D:\wamp\www\oreader\includes\SWFTools\pdf2swf.exe {path.pdf}{pdffile} -o {path.swf}{pdffile}%.swf -f -T 9 -t -s storeallcharacters -s linknameurl"
 cmd.searching.extracttext = "D:\wamp\www\oreader\includes\SWFTools\swfstrings.exe {path.swf}{swffile}"
