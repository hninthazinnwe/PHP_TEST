<?php namespace App\Core;

use Validator;
use Auth;
use DB;
use App\Http\Requests;
use App\Session;
use PDF;
use TCPDF_FONTS;

class Utility
{
// Use Pdf Export
public static function exportPDF($html,$pdfTitle = 'exportPDF')
{
PDF::SetTitle($pdfTitle);

require_once(base_path() . '/vendor/tecnickcom/tcpdf/include/tcpdf_fonts.php');
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$fontname = TCPDF_FONTS::addTTFfont(app_path() .'/Core/Export/Zawgyi-One-20051130.ttf', 'TrueTypeUnicode', '', 32);

// $font1 = PDF::addTTFfont('/home/waiyan/Downloads/Zawgyi-One-20051130.ttf', 'TrueTypeUnicode', '', 8);
PDF::SetFont($fontname, '', 15, '', false);

// set font
//PDF::SetFont('helvetica', '', 12);
PDF::AddPage();
PDF::writeHTML($html, true, false, false, false, '');

PDF::Output($pdfTitle . '.pdf');
exit();

}

}