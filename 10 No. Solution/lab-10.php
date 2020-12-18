<?php
$color = array('white', 'green', 'red');
echo 'A. ';
foreach ($color as $c){
echo "$c, ";
}

sort($color);
echo "<ul>";
echo 'B. ';
foreach ($color as $y){
echo "<li>$y</li>";
}

echo "</ul>";
?>



