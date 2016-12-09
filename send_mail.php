<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || empty($_POST['subject'])) {

		header('Location: http://example.com');
	}

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    $to = 'support@example.com';
    $header = "From:$email \r\n";
    $header .= "Reply-To: $email\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    if (mail($to, $subject, $message, $header)) {
        $code = '200';
        $message = 'success';
    } else {
        $code = '400';
        $message = "failed";
    }

    $json_data['code'] = $code;
    $json_data['result'] = $message;
    echo json_encode($json_data);
} else {
     header('Location: http://example.com');
}
