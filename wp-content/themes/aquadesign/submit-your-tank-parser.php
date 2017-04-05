<?php

if(isset($_FILES['aquascapeImages'])){
    $name_array = $_FILES['aquascapeImages']['name'];
    $tmp_name_array = $_FILES['aquascapeImages']['tmp_name'];
    $type_array = $_FILES['aquascapeImages']['type'];
    $size_array = $FILES['aquascapeImages']['size'];
    $error_array = $FILES['aquascapeImages']['error'];

    for($i=0; $i < count($tmp_name_array); $i++){
        move_uploaded_file($tmp_name_array[$i], "test_uploads/".$name_array[$i])
    }
}
?>