<?php 
// error_reporting(1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';	
//sendEmail();



$flag=0 ; // 1 for local system 


			$name=isset($_POST['fname'])?$_POST['fname']:'' ;
			$email=isset($_POST['email'])?$_POST['email']:'' ;
			$phone=isset($_POST['phone'])?$_POST['phone']:'' ;
			$message=isset($_POST['message'])?$_POST['message']:'' ;
			
			$msg="Name :".$name."<br>" ;
			$msg.="Email :".$email."<br>" ;
			$msg.="Phone :".$phone."<br>" ;
			$msg.="Message :".$message."<br>" ;  
			
			$subject = 'Eamil Form(zyenalabs.io)' ;  

			
			if($flag==0){
				sendEmail($subject,$msg);
				echo "succ" ;
					 
			}else{
			   	echo "false" ; 
			}
		    
			//return true ;
	


   
			function sendEmail($subject,$content){
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Mailer = "smtp";
			$mail->SMTPDebug  = 1;  
			//$mail->SMTPDebug  = 0; 
			$mail->SMTPAuth   = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Username   = "contactzyenalabs@gmail.com";
			$mail->Password   = "intigate@2003";
			$mail->Port       = 587;
			$mail->Host       = "smtp.gmail.com";
			//$mail->Host = 'tls://smtp.gmail.com:587';
			$mail->IsHTML(true);
			$mail->AddAddress("contactzyenalabs@gmail.com");
			$mail->SetFrom("contactzyenalabs@gmail.com","zyenalabs.io");   
			// $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
			// $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
			$mail->Subject = $subject;
			$content = $content ;
			$mail->MsgHTML($content); 
			if(!$mail->Send()) {
				return false ;
			} else {
				return true ;
			}
			exit ;

			}




 ?>