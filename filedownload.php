<?php
$file ='';
$file = $_POST['fileAttachment'];
$file = 'C:\wamp\www\bug tracking\buglogs\\'.$file;
echo "<br>".$file;

if(file_exists($file))
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
else echo "does not exist";
?>