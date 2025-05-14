<?php
function send_on_going_email($to, $name, $mobil) {
    $subject = "Booking Mobil Anda Sedang Diproses";
    $message = "
        <html>
        <head>
            <title>Status Booking Mobil On-Going</title>
        </head>
        <body>
            <p>Halo, <b>$name</b>,</p>
            <p>Status booking mobil <b>$mobil</b> Anda telah berubah menjadi <b>on-going</b>.</p>
            <p>Tim kami akan segera menghubungi Anda untuk proses selanjutnya.</p>
            <br>
            <p>Terima kasih,<br>Nordique Autohaus</p>
        </body>
        </html>
    ";
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: showroom@localhost\r\n";
    // MailHog biasanya listen di localhost:1025, cukup gunakan mail() standar
    mail($to, $subject, $message, $headers);
}
?>