<?php
set_time_limit(0);

$file_name = $_GET['f'];

$ext = pathinfo($file_name, PATHINFO_EXTENSION);

header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="download.'.$ext.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file_name));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');
// Envia o arquivo para o cliente
readfile($file_name);


?>