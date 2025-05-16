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

// Fungsi kirim email invoice
function send_invoice_email($to, $name, $mobil, $harga, $tanggal_jam_janjian = null, $invoice_url = null)
{
    $subject = "Invoice Pembelian Mobil Anda";
    $tanggal = $jam = '';
    if ($tanggal_jam_janjian) {
        $tanggal = date('d-m-Y', strtotime($tanggal_jam_janjian));
        $jam = date('H:i', strtotime($tanggal_jam_janjian));
    }
    $invoice_link = $invoice_url ? "<p>Anda dapat mengunduh invoice Anda di sini: <a href='$invoice_url' target='_blank'>Download Invoice (PDF)</a></p>" : "";

    $template = <<<HTML
<html>
<head>
    <title>Invoice Pembelian Mobil</title>
</head>
<body>
    <p>Halo, <b>{NAME}</b>,</p>
    <p>Terima kasih telah melakukan pembelian mobil <b>{MOBIL}</b> di showroom kami.</p>
    <p><b>Tanggal Booking:</b> {TANGGAL}<br><b>Jam Booking:</b> {JAM}</p>
    <p><b>Harga Deal:</b> {HARGA}</p>
    $invoice_link
    <p>Invoice ini dapat Anda gunakan sebagai bukti pembelian resmi.</p>
    <br>
    <p>Terima kasih,<br>Nordique Autohaus</p>
</body>
</html>
HTML;

    $message = str_replace(
        ['{NAME}', '{MOBIL}', '{TANGGAL}', '{JAM}', '{HARGA}'],
        [htmlspecialchars($name), htmlspecialchars($mobil), $tanggal, $jam, $harga],
        $template
    );

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: showroom@localhost\r\n";
    mail($to, $subject, $message, $headers);
}
?>
