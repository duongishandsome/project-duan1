<?php
function loadall_taikhoan()
{
    $sql = "select*from user order by user_id asc";
    $listuser = pdo_query($sql);
    return $listuser;
}
function insert_taikhoan($email, $user, $hashedPassword,$role_id)
{
    // $birth = date('Y/d/m');
    $sql = "insert into user(user_email,user_name,user_password,role_id) values('$email','$user','$hashedPassword',$role_id)";
    pdo_execute($sql);
}
function delete_taikhoan($id)
{
    $sql = "delete from taikhoan where id=" . $id;
    pdo_execute($sql);
}
function checkuser($user, $pass)
{
    $sql = "SELECT * FROM user WHERE user_name = '" . $user . "' AND user_password = '" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkemail($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email = '" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function get_info_user($email) {
    $sql = "select * from user where user_email='$email'";
    $user = pdo_query_one($sql);
    return  $user;
}

function update_taikhoan($id, $email, $user, $pass, $phone, $adress, $gender, $birth, $hinh)
{
    if ($hinh != "") {
        $sql = "UPDATE user SET user_name='" . $user . "', user_password='" . $pass . "', user_email='" . $email . "', user_address	='" . $adress . "', user_gender	='" . $gender . "' , user_birth	='" . $birth . "', user_phone	='" . $phone . "' , img	='" . $hinh . "' WHERE user_id=" . $id;    

    } else {
        $sql = "UPDATE user SET user_name='" . $user . "', user_password='" . $pass . "', user_email='" . $email . "', user_address	='" . $adress . "', user_gender	='" . $gender . "' , user_birth	='" . $birth . "', user_phone	='" . $phone . "' WHERE user_id=" . $id;    }
    pdo_execute($sql);
}

function update_pass($id, $pass, $user)
{
    $sql = "UPDATE user SET  user_name='" . $user . "', user_password='" . $pass . "' WHERE user_id=" . $id;

    pdo_execute($sql);
}

function sendMail($email)
{
    $sql = "SELECT * FROM user WHERE user_email='$email'";
    $taikhoan = pdo_query_one($sql);

    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan['user_name'], $taikhoan['user_password']);
        return "Gửi email thành công";
    } else {
        return "Email bạn nhập ko có trong hệ thống";
    }
}

function sendMailPass($email, $username, $pass)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);


    // gửi mailtrap
    // $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = '12ed79a42d61df';                     //SMTP username
    // $mail->Password   = 'd75a337785e533';     

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thanhtung2432004@gmail.com';                     //SMTP username
        $mail->Password   = 'kwjm vrkt xilq rcjn';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients ngưởi nhận
        $mail->setFrom('thanhtung2432004@gmail.com', 'Nội thất 89');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'BAN YEU CAU LAY LAI MAT KHAU!';

        $mail->Body    = 'Mau khau cua ban la' . $pass . ' Nhé !';
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}