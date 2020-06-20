<?php

$servername = "50.62.209.195";
$username = "spark_training";
$password = "spark@2018";
$dbname = "db_spark";

if(!isset($_POST['submit']))
{
    
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}

$fname=$_POST['fname'];
$email=$_POST['emailid'];//The person applying email address...
$phone=$_POST['Phone'];
$messages=$_POST['messages'];




//$email_from = 'thesparkplus@gmail.com';//<== update the email address // //sender will receive from this person.....
$email_from='info@sparkplustech.com';
$email_subject = "Message for Dimple";
$email_body = " $fname your message has successfully submited. We will get back to you soon.\n\n Thankyou \n\n Regards, \n\n Dimple\n\n";

// " Below are the details:\n $fname \n $mobile\n".
    
$to = "$email";//<== update the email address
//$to1="divya@sparkplustech.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";
//Send the email!
$x=mail($to,$email_subject,$email_body,$headers);

//Sparkplus side........
$email_subject_company="Message from $fname";
$email_body_company="You have received message  from $fname with email id: $email \n\n Thankyou \n\n Regards";

if($x)
{
	echo "Hello";
	mail($email_from,$email_subject_company,$email_body_company,$headers);
}
else
{
	echo "email not send";
}

//done. redirect to thank-you page.
// header('Location: thank-you.html');





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tb_dimple(fname, email, phone, messages) VALUES ('$fname', '$email', '$phone', '$messages')";

if ($conn->query($sql) === TRUE) {
    echo "Submited Sucessfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?> 