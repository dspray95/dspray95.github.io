<?php
//Post must be set to carry on
if(!isset($_POST['submit']))
{
	
	echo "error; you need to submit the form!";
}

$email = $_POST['email'];
$subject = $_POST['subject'];
$body = $_POST['body'];
//Validate first
if(empty($email)
{
	echo "email required";
	exit;
}
if(empty($subject)
{
    echo "subject required";
    exit;
}
if(empty($body)
{
	echo "body required";
	exit;
}
if(IsInjected($email))
{
    echo "bad email value";
    exit;
}
else {
	mail("dspray95@gmail.com",$email_subject,$email_body,$headers);
}
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>