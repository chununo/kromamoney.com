<?php
// $uploads_dir = wp_upload_dir();
// $pdf_path = $uploads_dir['basedir'] . '/pdfs/tarjeta01.pdf';

// // Verifica si el archivo existe
// if (!file_exists($pdf_path)) {
//     error_log('sin archivo pdf');
//     wp_die('El archivo PDF no existe.');
// }

// // Instancia de FPDI
// $pdf = new \setasign\Fpdi\Fpdi();

// // Cargar el archivo PDF
// $page_count = $pdf->setSourceFile($pdf_path);
// $tpl_idx = $pdf->importPage(1); // Importar la primera página

// // Obtener las dimensiones de la página original
// $size = $pdf->getTemplateSize($tpl_idx);

// // Crear una nueva página y usar la plantilla del PDF cargado
// $pdf->AddPage('L', array($size['width'], $size['height']));
// $pdf->useTemplate($tpl_idx);

// // Añadir texto personalizado al PDF
// $pdf->SetFont('Arial', 'B', 12);
// $pdf->SetTextColor(0, 0, 255);
// $pdf->Text(50, 50, 'Texto añadido al PDF');


// // Enviar el PDF modificado al navegador
// header("Content-Disposition: attachment; filename=Informe de Ventas.pdf");
// header("Content-Type: application/pdf");
// header("Pragma: no-cache");
// header("Cache-Control: no-cache");


// $pdf->Output();
// // $pdf->Output('D', 'mi_pdf.pdf');
// // Limpiar el buffer y detener la ejecución

// exit();


?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
    console.log('entra aqui');
</script>