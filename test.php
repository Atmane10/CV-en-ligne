
<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

function php_func(){

    // include autoloader
    //require_once 'dompdf/autoload.inc.php';
    
    // reference the Dompdf namespace
 
    
    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml('hello world');
    
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    // Output the generated PDF to Browser
    $dompdf->stream();
}
php_func();
    ?>
