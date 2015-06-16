<?php

try {
    $to = 'yancey1204@gmail.com';
    $subject = 'the subject';
    $message = 'hello';
    $headers = 'From: haiming12322@qq.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message);

    echo 'email sent';
} catch (Exception $ex) {
    echo 'some error happened: ' . $ex;
}