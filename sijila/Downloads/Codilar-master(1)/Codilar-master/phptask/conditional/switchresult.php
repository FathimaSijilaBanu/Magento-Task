<?php
$color=$_POST['favcolor'];
echo $color;
switch($color)
{
case "red":
echo "  is your favourite color";
break;
case "black":
echo "   is your favourite color";
break;
case "blue":
echo "  is  your favourite color";
break;
default:
echo "  is your favourite color";
}
?>

