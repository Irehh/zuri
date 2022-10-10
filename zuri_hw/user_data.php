<?php

function safe($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(isset($_POST['submit'])){
  $name = safe($_POST["name"]);
  $place = safe($_POST["place"]);
  $email = safe($_POST["email"]);
  $dob = safe($_POST["dob"]);
  $gender = safe($_POST["gender"]);
  
  



 

  $opencsv = fopen("./userdata.csv", 'a');
    $data = array(
        'name' => $name,
        'email' => $email,
        'dob' => $dob,
        'gender' => $gender,
        'place' => $place
        
    );

     fputcsv($opencsv, $data);
    


    //  $open = fopen('./userdata.csv', 'r');
    //     $test = fgetcsv($open);
    //     // $output = '$test[0] . "using" . $test[1]. "is a" . $test[2] . "born" . $test[3] . "is from" . $test[4]';
    //     print_r($test, $output);

    $read = fopen('./userdata.csv', 'r');

while(!feof($read)) {

    $row = fgetcsv($read);

    if (!empty($row)) {
           $r = "$row[0] using $row[1] born on $row[2] is a $row[3] from $row[4] " . "<br>";
           print_r($r);
    }
}

fclose($read);

}

}




?>