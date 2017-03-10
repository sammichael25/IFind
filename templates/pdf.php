<?php
//set_include_path(get_include_path() . PATH_SEPARATOR . "../dompdf");

require_once "../dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

   ob_start();
    require_once("tableonly.php");
    //$dompdf = new DOMPDF();
    $dompdf->load_html(ob_get_clean());
	$dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("Timetable.pdf");