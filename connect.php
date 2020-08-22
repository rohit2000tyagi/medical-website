<?php
  $phone = $POST['phone']; 
   $email = $POST['email']; 
    $your_name = $POST['your_name'];  
     $message = $POST['message']; 


  if(!empty($phone) || !empty($email) || !empty($your_name) || !empty($message)) {
     $host = "localhost";
     $dbUsername = "root";
     $dbPassword = "";
     $dbname = "youtube";

     //connection.....

     $conn = new mysqli($host, $dbUsername, $dbPassword, $dpname);

     if(mysqli_connect_error()){
     	die('Connect Error('. mysqli_connect_error().')' . mysqli_connect_error());
     } else{
     	$SELECT = "SELECT email From register where email =? Limit 1";
        $INSERT = "INSERT Into register(phone, email, your_name, message) values(?, ?, ?, ?)"
    
         //prepare statement

        $stmt = $conn->prepare($SELECT);
        $stmt->$bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum==0){
        	$stmt = $conn->prepare($INSERT);
        	$stmt->bind_param("ssssii",$phone, $email, $your_name, $message);
        	$stmt->execute();
        	echo "New record inserted sucessfully..."

        }else{

        	echo "Someone already register using this email";
        }
        $stmt->close();
        $conn->close();


     }

     
     }else{
     	echo "All field are required";
     	die();
     }
     ?>