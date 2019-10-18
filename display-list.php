<?php
$pictures = glob("nixons/*.jpg"); 
$no_pictures = count($pictures)-1;
$limit = $no_pictures-14;
for( $i = $no_pictures; $i >= $limit; $i--){
echo "<li><div><img src=\"".$pictures[$i]."\" /></div></li>\n"; 
}  
?>