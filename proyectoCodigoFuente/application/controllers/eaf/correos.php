<?php
require_once "Mail.php";

$from = "reclutamiento@solumas.com.mx";
$to = "fmartinez@aesoftware.com.mx";
$subject = "Test email using PHP SMTP with SSL\r\n\r\n";
$body = "This is a test email message";

$host = "ssl://a2plcpnl0742.prod.iad2.secureserver.net";
$port = "465";
$username = "reclutamiento@solumas.com.mx";
$password = "Agosto2013";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
} else {
  echo("<p>Message successfully sent!</p>");
}
?>
