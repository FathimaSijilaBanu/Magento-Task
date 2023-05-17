<?php
$arr=array("apple","Banana","lemon");
echo "******Indexed Array---ARRAY ELEMENTS******\n";
foreach($arr as $x)
{
echo $x."\n";
}
echo "******Associative Array---ARRAY ELEMENTS******\n";
$arr1=array();
$arr1["name"]="sijila";
$arr1["place"]="Thalassery";
$arr1["age"]=24;
foreach($arr1 as $key=>$value)
{
echo $key.":"."$value"."\n";
}
echo "******Multidimensional Array---ARRAY ELEMENT******\n";
$details = array(
     array(
        "name" => "Sijila",
        "email" => "sijila@mail.com",
    ),
    array(
        "name" => "Fathima",
        "email" => "fathima@mail.com",
    ),
    array(
        "name" => "Banu",
        "email" => "banu@mail.com",
    )
);
 
// Printing all the keys and values one by one
$keys = array_keys($details);
for($i = 0; $i < count($details); $i++) {
    echo $keys[$i] . "\n";
    foreach($details[$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "\n";
    }
    echo "\n";
    }
?>
