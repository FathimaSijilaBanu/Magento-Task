<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $photo = $_FILES['photo']['name'];
    $temp_name =$_FILES['photo']['tmp_name'];

    $data = array(
        'name' => $name,
        'email' => $email,
        'mobile' => $mobile,
        'photo' => $photo['name']
    );
    move_uploaded_file($temp_name,"uploads/".$photo);
    $jsonString = file_get_contents('info.json');
    $dataJson = json_decode($jsonString, true);

    $dataJson[] = $data;

    $jsonData = json_encode($dataJson);

    file_put_contents('info.json', $jsonData);

    echo 'Data saved successfully';
}
?>