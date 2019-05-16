<?php 
require "../../vendor/phpmailer/PHPMailerAutoload.php";
include "../00_config/connect.php";
sleep(2);
// Give security access
set_time_limit(10);

if(isset($_POST['mail_to'])){
    $mail_to = $_POST["mail_to"];
    $mail_cc = $_POST["mail_cc"];
    $subject = $_POST['subject'];
    $description = $_POST["description"];
    $footer = $_POST["footer"];
    echo '<h1 class="text-primary">ส่งอีเมลสำเร็จ</h1>';
}else{
        try{
            $statement = $pdo->prepare("SELECT * From 00_mail_config WHERE mail_id = 'mail_cf_pk' ");
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $row) :
            $mail_to = $row['mail_to'];
            $mail_cc = $row['mail_cc'];
            $subject = $row['subject'];
            $description = $row['description'];
            $footer = $row['footer'];
        endforeach;
        } //try
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
}

// ดึงข้อมูล Email มาจากตาราง feedback_email โดย avtive = 0
header('Content-Type: text/html; charset=utf-8');
$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->SMTPSecure = false;
//$mail->SMTPDebug = 2; mailDebug 
 
 
$gmail_username = "poomwattanaklang@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "Anisong1234"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1
 

 
$sender = "Phonebook Support"; // ชื่อผู้ส่ง
$email_sender = "poomwattanaklang@gmail.com"; // เมล์ผู้ส่ง 
$email_receiver = ("poomwattanaklang@gmail.com"); // เมล์ผู้รับ ***
 
$subject = "[Phonebook] ข้อความจากระบบ phonebook"; // หัวข้อเมล์
$mail->Username = $gmail_username;
$mail->Password = $gmail_password;
$mail->setFrom($email_sender, $sender);
$mail->addAddress('poomwattanaklang@gmail.com');
$mail->Subject = $subject;

// ส่วนของ
// header('Content-Type: text/html; charset=utf-8');
// $mail = new PHPMailer;
// $mail->CharSet = MAIL_CHARSET;
// $mail->isSMTP();
// $mail->Timeout = MAIL_TIMEOUT;
// $mail->Host = MAIL_HOST;
// $mail->Port = MAIL_PORT;
// $mail->SMTPAuth = true;
// $mail->SMTPSecure = 'tls';
// //$mail->SMTPAuth = true;
// $mail->SMTPSecure = false;
// $mail->SMTPDebug = 2; //mailDebug 

// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1
 


// $subject = "[Phonebook] ข้อความจากระบบ phonebook"; // หัวข้อเมล์
// $mail->Username = MAIL_USR;
// $mail->Password = MAIL_PWD;
// $mail->setFrom(MAIL_SENDER_ADDRESS, MAIL_SENDER_NAME);
// $mail->addAddress('poomwattanaklang@gmail.com');
// $recipients = ['dss'];

// foreach($recipients as $email => $name)
// {
//    $mail->addAddress($email, $name);
//    // เพิ่ม email Address
// }



$mail->Subject = MAIL_SUBJECT;
 
$email_content =' <!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8"/>
        <title>ทดสอบการส่ง Email</title>
    </head>
    <body style="position: absolute;
    width: 700px;">
        <h1 style="background: #3b434c;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;" >
            <img src="https://upload.wikimedia.org/wikipedia/th/3/38/Ch7_Logo.png" href="http://phonebook.bbtv.co.th" style="width: 80px;">
            PhoneBook
            <hr>
        </h1>
        <div style="padding:20px;">
            <div>
          
                <h2>จากคุณ  <strong style="color:#0000ff;"></strong></h2>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">To : <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="mail_to" value="everyone@kubota.com" class="form-control form-control-sm" required="" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Cc : </label>
                      <div class="col-sm-9">
                        <input type="text" name="mail_cc" value="ccc" class="form-control form-control-sm" autocomplete="off">
                    </div>
                    </div>

                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Subject : <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="subject" value="แจ้งเตือน ECN ใกล้ถึง Effective Date / ECN รายการใหม่" class="form-control form-control-sm" required="" autocomplete="off">
                    </div>
                    </div>

                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Description (เพิ่มเติม) : </label>
                      <div class="col-sm-9">
                      <textarea name="description" rows="5" class="form-control form-control-sm">เรียน : ทุกท่าน
จาก : ระบบแจ้งเตือนอัตโนมัติ</textarea>
                    </div>
                    </div>
                                                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Detail : </label>
                      <div class="col-sm-9">
                                <p class="col-form-label">ระบบขอแจ้งให้ทราบว่า มีรายการ ECN รายการใหม่ 
                                ของวันที่ 15/05/2019                                จำนวน 39  รายการ ดังนี้</p>
                              
                                        <ul class="list-group">
                                                                                     <li class="list-group-item">1) 1G700-1953</li>
                                                                                     <li class="list-group-item">2) 1G700-1953</li>
                                                                                     <li class="list-group-item">3) 1G700-1953</li>
                                                                                     <li class="list-group-item">4) 1G700-1953</li>
                                                                                     <li class="list-group-item">5) 1G700-1953</li>
                                                                                     <li class="list-group-item">6) 1G700-1953</li>
                                                                                     <li class="list-group-item">7) 1G700-1953</li>
                                                                                     <li class="list-group-item">8) 1G700-1953</li>
                                                                                     <li class="list-group-item">9) 1G700-1953</li>
                                                                                     <li class="list-group-item">10) 1G700-1953</li>
                                                                                     <li class="list-group-item">11) 1G700-1953</li>
                                                                                     <li class="list-group-item">12) 1G700-1953</li>
                                                                                     <li class="list-group-item">13) 1G700-1953</li>
                                                                                     <li class="list-group-item">14) 1G700-1953</li>
                                                                                     <li class="list-group-item">15) 1G700-1953</li>
                                                                                     <li class="list-group-item">16) 1G700-1953</li>
                                                                                     <li class="list-group-item">17) 1G700-1953</li>
                                                                                     <li class="list-group-item">18) 1G700-1953</li>
                                                                                     <li class="list-group-item">19) 1G700-1953</li>
                                                                                     <li class="list-group-item">20) 1G700-1953</li>
                                                                                     <li class="list-group-item">21) 1E905-0129</li>
                                                                                     <li class="list-group-item">22) 1E905-0129</li>
                                                                                     <li class="list-group-item">23) 1E905-0129</li>
                                                                                     <li class="list-group-item">24) 1E905-0129</li>
                                                                                     <li class="list-group-item">25) 1E905-0129</li>
                                                                                     <li class="list-group-item">26) 1E905-0129</li>
                                                                                     <li class="list-group-item">27) 1G775-0112</li>
                                                                                     <li class="list-group-item">28) 1G700-2224</li>
                                                                                     <li class="list-group-item">29) 1G700-2224</li>
                                                                                     <li class="list-group-item">30) 1G700-2224</li>
                                                                                     <li class="list-group-item">31) 1G700-2224</li>
                                                                                     <li class="list-group-item">32) 1G700-2224</li>
                                                                                     <li class="list-group-item">33) 1G700-2224</li>
                                                                                     <li class="list-group-item">34) 1G700-2224</li>
                                                                                     <li class="list-group-item">35) 1G700-2224</li>
                                                                                     <li class="list-group-item">36) 1G700-2224</li>
                                                                                     <li class="list-group-item">37) 1G700-2224</li>
                                                                                     <li class="list-group-item">38) 1G700-2224</li>
                                                                                     <li class="list-group-item">39) 1G700-2224</li>
                                                                                 </ul>
                                        <br> 

                                        <p>รายการ ECN ที่ใกล้ถึงเวลา Effective Date ใน 30 วัน จำนวน 3 รายการ ดังนี้</p>
                                        <ul class="list-group">
                                                                                    <li class="list-group-item">1) 1G700-1953  Effective Date : 16/05/2019 </li>
                                                                                     <li class="list-group-item">2) 1G700-1953  Effective Date : 30/05/2019 </li>
                                                                                     <li class="list-group-item">3) 1E905-0129  Effective Date : 30/05/2019 </li>
                                                                                 </ul>
                                        <br> 

                                        <!-- <p>รายการ ECN ที่เลยเวลา Effective Date  ของวันที่ 16/05/2019 มีรายการค้างอยู่ xx รายการ ดังนี้</p> -->
                    </div>
                    </div>

                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Footer : <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                      <textarea name="footer" rows="5" class="form-control form-control-sm">ข้อความนี้ถูกส่งจากระบบ ECN System หากมีข้อสงสัย กรุณาติดต่อที่คุณเป้ โทร 098-xxx-xxxx Email info@kubota.com</textarea>
                    </div>
                    </div>

                       
        <div style="background: #3b434c;color: #a2abb7;padding:10px;">
            <div style="text-align:center"> 
                BBTV Phonebook Version 1.0.0 ©2018
            </div>
        </div>
    </body>
</html>
';

//  ถ้ามี email ผู้รับ
if(count($email_receiver) > 0){
    $mail->msgHTML($email_content);
 
    if (!$mail->send()) {  // สั่งให้ส่ง email
 
        // กรณีส่ง email ไม่สำเร็จ
        echo " ไม่สามารถส่งอีเมลหาผู้รับได้ โปรดติดต่อในภายหลัง";
        echo  $mail->ErrorInfo;
    }else{
        // กรณีส่ง email สำเร็จ
        echo" ระบบได้ส่งข้อความไปเรียบร้อย";
    }   
}
?>