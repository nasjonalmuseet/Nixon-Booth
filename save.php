<?php
// Remove the headers (data:,) part.
$filteredData=substr($GLOBALS['HTTP_RAW_POST_DATA'], strpos($GLOBALS['HTTP_RAW_POST_DATA'], ",")+1);

// Need to decode before saving since the data we received is already base64 encoded
$decodedData=base64_decode($filteredData);

if(preg_match('/[0-9]+/', $_GET['nxnID'])) {
	$nxnID = $_GET['nxnID'];
}
$filename = 'NMK-NXN-'.$nxnID; 
$upload_dir = 'nixons/';

$fp = fopen( $upload_dir.$filename.'.png', 'wb' );
fwrite( $fp, $decodedData);
fclose( $fp );

$image = imagecreatefrompng($upload_dir.$filename.'.png');
imagejpeg($image, $upload_dir.$filename.'.jpg', 95);
imagedestroy($image);
unlink($upload_dir.$filename.'.png');
?>