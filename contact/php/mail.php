<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';


    $name = $_POST['Name']; // required

    $company = $_POST['Company']; // required

    $type_of_project = $_POST['Type-of-Project']; // not required

    $autres_compagnies = $_POST['Autres-compagnies']; // required
    
    $reason = $_POST['Reason']; // required

    $budget_range = $_POST['Budget-range']; // required

    $phone = $_POST['Phone']; // not required

    $email = $_POST['Email']; // required

    $details = $_POST['Details']; // required


    $email_subject = "New form submission from ".  $name ;

    $email_message = "Form details below <br><br>";

    $email_message .= "Name: ".$name."<br>";

    $email_message .= "Company: ".$company."<br>";

    $email_message .= "Email: ".$email."<br>";

    $email_message .= "Type-of-Project: ".$type_of_project."<br>";

    $email_message .= "Autres-compagnies: ".$autres_compagnies."<br>";

    $email_message .= "Reason: ".$reason."<br>";

    $email_message .= "Budget-range: ".$budget_range."<br>";

    $email_message .= "Phone: ".$phone."<br>";

    $email_message .= "Details: ".$details."<br>";
    if(empty($name) || empty($company) || empty($type_of_project) || empty($autres_compagnies) || empty($reason) || empty($budget_range) || empty($phone)){
        echo 'Please Fill all filed';
        die();
    };



    $mail = new PHPMailer(true);

    try {
    $mail->IsSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                     // Specify main and backup server
    $mail->Port = 587;                                    // Set the SMTP port
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ryanxcr@gmail.com';   // SMTP username
    $mail->Password = 'Xcr19890711.'; // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

    $mail->setFrom('ryanxcr@gmail.com', 'ryanxu.com');
    $mail->AddAddress("ryanxcr@gmail.com");             // Add a recipient


    $mail->IsHTML(true);                    // Set email format to HTML

    $mail->Subject = $email_subject;
    $mail->Body    = $email_message;
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }


} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

