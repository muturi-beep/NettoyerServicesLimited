<?php
   
   include 'connect.php';

   if(isset($_POST['send']))
   {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    // Validate input
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill in all fields.";
    } else{

    // Insert data into the database
    $sql = "INSERT INTO `mails`(`name`, `email`, `subject`, `message`) 
    VALUES ('$name','$email','$subject','$message')";

    if ($con->query($sql) === TRUE) {
        header ('location:services.php?error');
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
   }
}
   // Close the database connection
$con->close();
?>