<?php
$name = addslashes(trim($_POST['name']));
$email = addslashes(trim($_POST['email']));
$msg = addslashes(trim($_POST['message']));
$phone = addslashes(trim($_POST['phone']));
// $budget = addslashes(trim($_POST['budget']));

if ($name == '' || $email == '' || $msg == '' || $phone == '') {
  echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Fields are empty.
</div>';
} else {
  $subject = "New Consultation";
  $message = 'Client Name: ';
  $message .= $name . "<br>";
  $message .= "Email Address: ";
  $message .= $email . "<br>";
  $message .= "Message: ";
  $message .= $msg . "<br>";
  $message .= "Phone: ";
  $message .= $phone . "<br>";
  // $message .= "Budget: ";
  // $message .= $budget . "<br>";
  $headers = "From: info@trc.com.bd \r\n";
  $headers .= "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
  if (mail('zamantrc@gmail.com', $subject, $message, $headers)) {
    echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Your request has been sent to us. 
  </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> There was an error sending your request.
    <span class="mail-error-message text-1 d-block"></span>
  </div>';
  }
}