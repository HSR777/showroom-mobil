<?php
require_once('../../connections/koneksi.php');
require_once('../../vendor/fpdf/fpdf.php'); // Pastikan path dan file FPDF benar

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die('Invalid invoice ID');
}

$q = mysqli_query($connection, "
    SELECT t.*, b.nama_depan_calon_buyer, b.nama_belakang_calon_buyer, b.email_calon_buyer, m.nama_mobil
    FROM tr_pembelian_mobil_tbl t
    JOIN dm_calon_buyer_tbl b ON t.id_calon_buyer = b.id_calon_buyer
    JOIN dm_mobil_tbl m ON t.id_mobil = m.id_mobil
    WHERE t.id_transaksi = $id
    LIMIT 1
");
if (!$row = mysqli_fetch_assoc($q)) {
    die('Invoice not found');
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'INVOICE PEMBELIAN MOBIL',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);
$pdf->Cell(50,8,'Nama Pembeli',0,0); $pdf->Cell(0,8,': '.$row['nama_depan_calon_buyer'].' '.$row['nama_belakang_calon_buyer'],0,1);
$pdf->Cell(50,8,'Email',0,0); $pdf->Cell(0,8,': '.$row['email_calon_buyer'],0,1);
$pdf->Cell(50,8,'Mobil',0,0); $pdf->Cell(0,8,': '.$row['nama_mobil'],0,1);
$pdf->Cell(50,8,'Tanggal Booking',0,0); $pdf->Cell(0,8,': '.date('d-m-Y', strtotime($row['tanggal_jam_janjian'])),0,1);
$pdf->Cell(50,8,'Jam Booking',0,0); $pdf->Cell(0,8,': '.date('H:i', strtotime($row['tanggal_jam_janjian'])),0,1);
$pdf->Cell(50,8,'Harga Deal',0,0); $pdf->Cell(0,8,': Rp. '.number_format($row['harga_deal'],0,',','.'),0,1);

$pdf->Ln(10);
$pdf->MultiCell(0,8,"Terima kasih telah membeli mobil di Nordique Autohaus.\nInvoice ini dapat digunakan sebagai bukti pembelian resmi.",0,'L');

$pdf->Output('I', 'invoice_'.$id.'.pdf');
exit;
