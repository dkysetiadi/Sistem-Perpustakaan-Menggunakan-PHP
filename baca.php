<?php
$file = $_GET["pdf"];
$filename = "ypathfile/".$file ;
header ('Content-type:application/pdf');
header ('Content-Disposition:inline; filename="$filename"');
header ('Content-Transfer-Encoding: binart');
header ('Accept-Ranges: bytes');
@readfile ($filename);
?>