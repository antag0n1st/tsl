<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author Vladimir
 */
class Test extends MY_Controller {
    public function index(){
        echo "Hello!";
    }
    
    
    public function send_email()
    {
        $recipient = 'nikoletas@fgdgdfgdfg.com';//'vladimir.apostolski@gmail.com'; //'nikoletas@esmak.com.mk';
        $sender    = 'debug@tsgroup.mk';
        $subject   = 'test debug email';
        $message   = 'go testiram vrakjanjeto na email adresi';
        if(send_email($recipient, $sender, $subject, $message))
        {
            echo 'success';
        }
        else
        {
            echo 'failure';
        }
    }
    
    public function open_mailbox()
    {
            $mailbox = imap_open("{mail.tsgroup.mk:143/notls}INBOX", "debug@tsgroup.mk", "debug123");  //connects to mailbox on your server

        if ($mailbox == false) {
            echo "<p>Error: Can't open mailbox!</p>";
            //echo imap_last_error();
        } else {

            //Check number of messages
            $num = imap_num_msg($mailbox);

            //if there is a message in your inbox
            if ($num > 0) { //this just reads the most recent email. In order to go through all the emails, you'll have to loop through the number of messages
                $email = imap_fetchheader($mailbox, $num); //get email header

                $lines = explode("\n", $email);

                // data we are looking for
                $from = "";
                $subject = "";
                $to = "";
                $splittingheaders = true;

                for ($i = 0; $i < count($lines); $i++) {
                    if ($splittingheaders) {
                        // this is a header
                        $email .= $lines[$i] . "\n";

                        // look out for special headers
                        if (preg_match("/^Subject: (.*)/", $lines[$i], $matches)) {
                            $subject = $matches[1];
                        }
                        if (preg_match("/^From: (.*)/", $lines[$i], $matches)) {
                            $from = $matches[1];
                        }
                        if (preg_match("/^To: (.*)/", $lines[$i], $matches)) {
                            $to = $matches[1];
                        }
                    }
                }

                $body = utf8_decode(imap_utf8((imap_body($mailbox, $num))) );
                
                //We can just display the relevant information in our browser, like below or write some method, that will put that information in a database
                echo "FROM: " . $from . "<br>";
                echo "TO: " . $to . "<br>";
                echo "SUBJECT: " . $subject . "<br>";
                echo "BODY: " . htmlentities($body);

                echo '<br />----------<br />';
                
                $emails = $this->extract_emails(htmlentities($body));
                
                print_r($emails);
                
                
                
                
                echo '<br />----------<br />';
                
                
                imap_clearflag_full($mailbox,$num,'\\Seen');
                
                //delete message
                //imap_delete($mailbox, $num);
                //imap_expunge($mailbox);
            } else {
                echo "No more messages";
            }

            imap_close($mailbox, CL_EXPUNGE);
       }
    }
    
    public function read_dir()
    {
       $read_files = $this->read_returned_emails();
       
       $emails = array();
       
       foreach($read_files as $file)
       {
           $str = file_get_contents($file);
           $read_emails = $this->extract_emails(htmlentities($str));
           
           if(count($read_emails))
           {
               
               foreach($read_emails as $read_email)
               {
                   if(!in_array($read_email, $emails) and
                           strpos($read_email, '@tsgroup.mk') === false and
                           strpos($read_email, 'MAILER-DAEMON') === false and
                           strpos($read_email,'@gateway' ) === false and
                           strpos($read_email, '@gator') === false
                           //strpos($read_email, 'postmaster@') === false
                           )
                   {
                       $emails[] = $read_email;
                   }
               }
               
               
               
               
               //$emails = array_merge($emails, $read_emails);
               
               //$emails[] = $read_emails[0];
           }
       }
       echo '<pre>';
       
       echo implode('","', $emails);
       
       //print_r($emails);
       echo '</pre>';
    }
    
    public function extract_emails($text)
    {
                $pattern='/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
                preg_match_all($pattern, $text, $matches);
                
                return $matches[0];
    }
    
    
    
    public function read_returned_emails($extension = '.eml')
    {
        //path to directory to scan
        $directory = "public/returned_emails/";

        //get all image files with a .jpg extension.
        $files = glob($directory . "*" . $extension);

        return $files;
    }
    

}