
<?php

include('smtp/PHPMailerAutoload.php');
$message = "this is your one time password for sbi yono login - 632666";
$html = "test";

if(isset($_GET['email'])){
   $email = $_GET['email'];
    $otp = random_int(100000,999999);

    function smpt_mailer($emailsend, $subject, $msg) {
  
       $otp = random_int(100000,999999);
        $backupOtp = $otp;
        $subjectsend = "OTP VERIFICATION";
        $msgsend = "Hi, ".$_GET['email']." this your One Time password " . $backupOtp;
        $otp = random_int(100000,999999);
        $otpBackup = $otp;
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->Username = "vk049757@gmail.com";
        $mail->Password = "cdxkbwkqvlsmyqie";
        $mail->SetFrom('vk049757@gmail.com');
        $mail->Subject = $subjectsend;
        $mail->Body = $msgsend;
        $mail->AddAddress($emailsend);
        $mail->SMTPOptions = array('ssl' =>array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));

        
        if(!$mail->send()){
            echo "Email Not send ";
        }else{
            echo $backupOtp;
        }

    }

    
    smpt_mailer($email, "hg", "nfghf");
}

