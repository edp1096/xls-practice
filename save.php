<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', '회사명');
$sheet->setCellValue('B1', '부서명');
$sheet->setCellValue('C1', '이름');
$sheet->setCellValue('D1', '휴대폰');
$sheet->setCellValue('E1', '사번');
$sheet->setCellValue('F1', '이메일');

$writer = new Xlsx($spreadsheet);

$fname = "hello world.xlsx";

// 파일 저장시
// $writer->save($fname);

// 웹에서 실행 및 다운로드시
// https://zetawiki.com/wiki/PHPExcel_%EC%84%9C%EB%B2%84%EC%97%90_%EC%A0%80%EC%9E%A5%ED%95%98%EC%A7%80_%EC%95%8A%EA%B3%A0_%EB%8B%A4%EC%9A%B4%EB%A1%9C%EB%93%9C%EC%8B%9C%ED%82%A4%EA%B8%B0
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $fname . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
