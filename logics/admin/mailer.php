<?php
function send_on_going_email($to, $name, $mobil, $tanggal_jam_janjian = null)
{
    $subject = "Booking Mobil Anda Telah Kami Terima";
    $tanggal = $jam = '';
    if ($tanggal_jam_janjian) {
        $tanggal = date('d-m-Y', strtotime($tanggal_jam_janjian));
        $jam = date('H:i', strtotime($tanggal_jam_janjian));
    }

    // Email template with placeholders
    $template = <<<HTML
<html>
<head>
    <title>Status Booking Mobil diterima</title>
</head>
<body>
    <p>Halo, <b>{NAME}</b>,</p>
    <p>Permohonan booking mobil <b>{MOBIL}</b> Anda telah kami terima dan statusnya <b>diterima</b>.</p>
    <p><b>Tanggal Booking:</b> {TANGGAL}<br><b>Jam Booking:</b> {JAM}</p>
    <p>Kami menantikan kehadiran Anda di showroom kami sesuai jadwal yang telah dipilih. Tim kami siap menyambut dan membantu Anda secara langsung.</p>
    <br>
    <p>Terima kasih,<br>Nordique Autohaus</p>
</body>
</html>
HTML;

    // Replace placeholders
    $message = str_replace(
        ['{NAME}', '{MOBIL}', '{TANGGAL}', '{JAM}'],
        [htmlspecialchars($name), htmlspecialchars($mobil), $tanggal, $jam],
        $template
    );

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: showroom@localhost\r\n";
    mail($to, $subject, $message, $headers);
}
