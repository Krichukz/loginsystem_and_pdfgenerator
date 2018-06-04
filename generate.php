
<?php
require_once __DIR__ . '/vendor/autoload.php';
ob_start();
include "html_pdf.php"; 
$template = ob_get_contents();
ob_end_clean();
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage();
$mpdf->WriteHTML($template);
$mpdf->Output();

    ?>

