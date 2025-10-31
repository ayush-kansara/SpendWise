<?php

include "connection.php";

if(isset($_POST["sendMessage"])){
    $query = "INSERT INTO contact_us(name,email,subject,message) VALUES('$_POST[name]', '$_POST[email]', '$_POST[subject]', '$_POST[message]')";
    $result = mysqli_query($connection,$query);

    if($result){
        header("location:ContactUs_Form.php");
    }
}
else{
    header("location:ContactUs_Form.php");
}

?>