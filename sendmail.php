<?php

include 'email/PHPMailerAutoload.php';

class Email {

    public function generate_rand_passwd($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

    public function sendSMS($mobile,$msgBody) {
        $ch = curl_init();
        $user = "ytrivedi1@hotmail.com:sms123";
        $receipientno = $mobile;
        $senderID = "BMIIT Placements";
        $msgtxt = $msgBody;
        curl_setopt($ch, CURLOPT_URL, "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
        $buffer = curl_exec($ch);
        curl_close($ch);
    }

    static public function send($from, $subject, $message, $to) {
        $mail = new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->Username = "bmiitpms@gmail.com";
        $mail->Password = "bmiitPms123";
        $mail->SetFrom($from);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddAddress($to);

        if (!$mail->Send()) {
            return false;
        } else {
            return true;
        }
    }

}
