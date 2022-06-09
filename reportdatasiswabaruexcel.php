<?php
include('koneksip.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Jenis Pendaftaran');
$sheet->setCellValue('C1', 'SKHUN');
$sheet->setCellValue('D1', 'Ijazah');
$sheet->setCellValue('E1', 'Nama Lengkap');
$sheet->setCellValue('F1', 'Jenis Kelamin');
$sheet->setCellValue('G1', 'NISN');
$sheet->setCellValue('H1', 'Alamat');
$sheet->setCellValue('I1', 'Email');

$query = mysqli_query($koneksi,"select * from daftarbaru");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['jenis_pendaftaran']);
	$sheet->setCellValue('C'.$i, $row['skhun']);
    $sheet->setCellValue('D'.$i, $row['ijazah']);	
	$sheet->setCellValue('E'.$i, $row['nama']);	
    $sheet->setCellValue('F'.$i, $row['jenis_kelamin']);	
    $sheet->setCellValue('G'.$i, $row['nisn']);	
    $sheet->setCellValue('H'.$i, $row['alamat']);	
    $sheet->setCellValue('I'.$i, $row['email']);	
	$i++;
}
 
$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:I'.$i)->applyFromArray($styleArray);
 
 
$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Siswa Baru.xlsx');
?>