<?php

$errors = "";

$myemail = 'info@briancasey.com';//<—–Put Your email address here. if(empty($_POST[‘name’]) ||

empty($_POST['email']) ||

empty($_POST['description']);

{

$errors .= "\n Error: all fields are required";

}

$name = $_POST['first_name'].' '.$_POST['last_name'];

$email_address = $_POST['email'];

$phone = $_POST['phone'];

$message = $_POST['description'];

if (!preg_match(

"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))

{

$errors .= "\n Error: Invalid email address";

}

if( empty($errors))

{

$to = $myemail;

$email_subject = "Contact form submission: $name";

$email_body = "You have received a new message. ".

" Here are the details:\n Name: $name \n ".

"Email: $email_address\n Phone: $phone \n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to,$email_subject,$email_body,$headers);

//redirect to the ‘thank you’ page

header('Location: thankyou.html');

}

?>