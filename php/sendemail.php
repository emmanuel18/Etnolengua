<?php
	
	
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $subject = $_POST['subject']; 
    $message = $_POST['message']; 

    $email_from = $email;
    $email_to = 'etnolenguaplatform@gmail.com';

   

    mail($email_to, $subject, $message, $email_from);
	
	 
	
		echo '<script language="javascript">
		alert("Mensaje enviado con exito...Pronto nos pondremos en contacto contigo ");
		window.location.href="../default.php";
		</script>'; 
		

    