<?php
	
	

    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $subject = $_POST['subject']; 
    $message = $_POST['message']; 

    $email_from = $email;
    $email_to = 'emmanuelestrada544@gmail.com';

   

    mail($email_to, $subject, $message, $email_from);

    header("location: ../index.php");