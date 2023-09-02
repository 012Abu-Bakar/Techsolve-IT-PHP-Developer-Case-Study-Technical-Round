<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // here below lines of code help to validate eacha and every field present in the form
    $full_name = $_POST["$full_name"];
    $ph_num = $_POST["$ph_num"];
    $email = $_POST["$email"];
    $subject = $_POST["$subject"];
    $message = $_POST["$message"];
    
    // I am going to make an array to store and then show the errors
    
    $error = array();
    
    // now validate every field one by one
    
    
    // validate Full name
    if(empty($full_name)){
        $error[] = "Please enter your full nume!";
    }
    
    // validate phne number (according to India i.e. 10 number must be present)
    if(empty($ph_num) || !preg_match("/^[0-9]{10}$/", $ph_num)){
        $error[] = "Please enter valid Phone number!";
    }
    
    // validate Email id
    if(empty($email) || !filter_var($email)){
        $error[] = "Please enter valid Email id!";
    }
    
    // validate subject
    if(empty($subject)){
        $error[] = "Please add the subject!";
    }

    
    
    ////// Data_base connection
    
    $con = new mysqli("localhost", "username", "password", "database_name");
    if($con->connect_error){
        die("Database connecntion failed!! ", $con->connect_error);
    }
    
    // now insert the data into Database
    $db = "INSERT INTO form(full_name, ph_num, email, subject, message, ip_address)
            VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($db);
    $stmt->bind_param($full_name, $ph_num, $email, $subject, $message, $ip_address);
    
    if($stmt->execute()){
        
        //redirect to end page
        header("Loc: end.php");
        exit();
    }
    else{
        echo "Error: ".$stmt->error;
    }
    
    // now close all connecetions and statements
    $stmt->close();
    $con->close();
}

?>