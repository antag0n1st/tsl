<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function send_email($recipient, $sender, $subject, $message)
{
    require_once("phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();
    $body = $message;
    $mail->IsSMTP();

    $mail->CharSet = 'utf-8';
    $mail->ContentType = 'text/html';
    $mail->FromName = 'Triple S Group';
    $mail->From = $sender;
    $mail->Subject = $subject;
    $mail->AltBody = strip_tags($message);
    $mail->MsgHTML($body);
    $mail->AddAddress($recipient);
    $mail->AddReplyTo('office@tsgroup.mk', 'Triple S Group');
    
    $mail->SMTPDebug = 1;
    
        // added by jerome 5th June 2011
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
      //  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "mail.tsgroup.mk";//"smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 25;                   // set the SMTP port

        $mail->Username   = "vlado";//"info";  // GMAIL username
        $mail->Password   = "vlado123";//"bagatela123!@#";            // GMAIL password

        // end of added by jerome
    if ( ! $mail->Send())
    {
      //  echo 'Failed to Send';
        return false;
    }
    else
    {
        //echo 'Mail Sent';
        return true;
    }
}
?> 