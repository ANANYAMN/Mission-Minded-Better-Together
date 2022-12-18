<?php


    $User_id = $_POST['User_id'];
    $Password = $_POST['Password'];

    $con= new mysqli("localhost","root","","test");
    if($con->error){
        die("Failed to connect:".$con->connect_error);
    } else {
        $stmt= $con->prepare("select * from login where User_id=?");
        $stmt->bind_param("s",$User_id);
        $stmt->execute();
        $stmt_result= $stmt->get_result();
        if($stmt_result->num_rows>0) {
            $data = $stmt_result->fetch_assoc();
            if($data['Password']===$Password){
                echo "<h2>Login Successful</h2>";

            }else{
                echo "<h2>Invalid Email or password</h2>";
            }
        }else {
            echo"<h2>Invalid Email or password</h2>";
        }
    }
    
?>
