<!-- ================ start of old email function ================== -->
// <?php
  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'aliiishak03@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

//   $contact->add_message( $_POST['name'], 'From');
//   $contact->add_message( $_POST['email'], 'Email');
//   $contact->add_message( $_POST['message'], 'Message', 10);

//   echo $contact->send();
// ?>

<!-- ================ end of old email function ================== -->



<?php
require 'assets/vendor/phpmailer/src/Exception.php';
require 'assets/vendor/phpmailer/src/PHPMailer.php';
require 'assets/vendor/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// تحديد المتغيرات
$to_email = "aliishak03@gmail.com"; // عنوان البريد الإلكتروني الذي ترغب في استقبال الرسائل عليه

// استلام البيانات المرسلة من النموذج
$fromName = $_POST['name'];
$fromEmail = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// إعدادات SMTP
$smtpServer = 'smtp-relay.sendinblue.com';
$smtpPort = 587;
$smtpUsername = 'aliiishak03@gmail.com';
$smtpPassword = 'xsmtpsib-5558a2407830a2e96e8f635aa346cd804ae84be8fa1ea9d410f7db2475989386-vIrVkPY4RjxzbSNq';

// تكوين الرسالة الإلكترونية
$mail = new PHPMailer(true);

try {
    // تعيين إعدادات SMTP
    $mail->isSMTP();
    $mail->Host = $smtpServer;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtpPort;

    // تكوين معلومات الرسالة
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($to_email);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // إرسال الرسالة
    $mail->send();

    // إرجاع رسالة نجاح إلى صفحة HTML
    echo 'تم إرسال الرسالة بنجاح!';
} catch (Exception $e) {
    // إرجاع رسالة خطأ إلى صفحة HTML
    echo 'حدث خطأ أثناء محاولة إرسال الرسالة: ' . $mail->ErrorInfo;
}
?>

