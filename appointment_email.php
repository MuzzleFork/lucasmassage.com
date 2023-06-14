<?php

if (!isset($_REQUEST['safety_key'])) {

    die();
}

// Admin Email.

$to = "test.you@gmail.com"; // write your email address in here.
// Fetching Values from URL.

$email_subject = "Request An Appointment";

$user_name = isset( $_POST['user_name'] ) ? $_POST['user_name'] : '';
$user_email = isset( $_POST['user_email'] ) ? $_POST['user_email'] : '';
$user_phone = isset( $_POST['user_phone'] ) ? $_POST['user_phone'] : '';
$user_service = isset( $_POST['user_service'] ) ? $_POST['user_service'] : '';
$appointment_date = isset( $_POST['appointment_date'] ) ? $_POST['appointment_date'] : '';
$appointment_time = isset( $_POST['appointment_time'] ) ? $_POST['appointment_time'] : '';
$user_message = isset( $_POST['user_message'] ) ? $_POST['user_message'] : '';
 

$template = '<div>Hello ' . $user_name . ',<br/>'
        . '<br/>Thank you...! For Contacting Us.<br/><br/>'
        . 'Service Type:' . $user_service . '<br/>'
        . 'Appointment Date:' . $appointment_date . '<br/>'
        . 'Appointment Time:' . $appointment_time . '<br/>'
        . 'Name:' . $user_name . '<br/>'
        . 'Email:' . $user_email . '<br/>'
        . 'Phone No:' . $user_phone . '<br/><br/>'
        . 'Message:' . $user_message . '<br/></div>';
$message = "<div>" . $template . "</div>";


$headers = 'MIME-Version: 1.0' . "\r\n";
$headers.='Content-type: text/html; charset=utf-8; charset=iso-8859-1' . "\r\n";
$headers.='From:' . $user_email . "\r\n"; // Sender's Email
mail($to, $email_subject, $message, $headers, '');

$data = array(
    'status' => 1,
    'msg' => "Your Query has been received, We will contact you soon."
);

echo json_encode($data);