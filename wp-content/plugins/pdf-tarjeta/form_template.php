<?php get_header(); ?>
<br>
<h3>Post</h3>


<?php
// Definir los campos del formulario
$campos = array(
    'nombre' => array('label' => 'Nombre', 'type' => 'text', 'name' => 'name'),
    // 'email' => array('label' => 'Correo electrónico', 'type' => 'email', 'name' => 'email'),
    'id' => array('label' => 'ID', 'type' => 'number', 'name' => 'ident'),
    'face' => array('label' => 'Facebook @', 'type' => 'text', 'name' => 'face'),
    'insta' => array('label' => 'Instagram @', 'type' => 'text', 'name' => 'insta'),
    'whats' => array('label' => 'WhatsApp', 'type' => 'tel', 'name' => 'whats'),
    
);

?>
<?php echo do_shortcode('[forminator_form id="2694"]'); ?>


<?php
?>

<!-- Crea el formulario -->
<form action="" method="post" id="form-pdf">
<?php foreach ($campos as $campo) : ?>
    <label for="<?= $campo['name'] ?>"><?= $campo['label'] ?></label>
    <input type="<?= $campo['type'] ?>" name="<?= $campo['name'];?>" id="<?= $campo['name'];?>">
    <br>
    <?php endforeach; ?>
    <button type="submit">Generar PDF</button>
</form>

<canvas id="pdf-canvas" style="Display:none"></canvas>

<!-- Crea el formulario -->

<?php get_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="/kromamoney.com/wp-content/plugins/pdf-tarjeta/font/OpenSans-Light-normal.js"></script>
<script src="/kromamoney.com/wp-content/plugins/pdf-tarjeta/font/OpenSans-Semibold-bold.js"></script>
<script>
     document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('form-pdf').addEventListener('submit', function (e) {
            e.preventDefault();
            // Cargar un PDF existente
            const pdfPath = '/kromamoney.com/wp-content/uploads/pdfs/tarjeta01.pdf'; // Ruta del PDF existente

                // Obtener los datos del formulario
            const nombre = document.getElementById('name').value;
            // const email = document.getElementById('email').value;
            const id = document.getElementById('ident').value;
            const face = '@ '+document.getElementById('face').value;
            const insta = '@ '+document.getElementById('insta').value;
            const whats = document.getElementById('whats').value;

            const loadingTask = pdfjsLib.getDocument(pdfPath);
            loadingTask.promise.then(function(pdf) {
                // Cargar la primera página del PDF
                pdf.getPage(1).then(function(page) {
                    const scale = 4;
                    const viewport = page.getViewport({ scale: scale });

                    // Configurar el canvas y el contexto
                    const canvas = document.getElementById('pdf-canvas');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Renderizar el PDF en el canvas
                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext).promise.then(function() {
                        // Convertir el canvas a imagen de datos y cargar en jsPDF
                        const imgData = canvas.toDataURL('image/png');
                        // Convertir las dimensiones de píxeles a milímetros para jsPDF
                        const pageWidthMM = viewport.width * 0.264583;  // 1px = 0.264583 mm
                        const pageHeightMM = viewport.height * 0.264583;
                        // Crear un nuevo documento jsPDF con orientación landscape y tamaño personalizado
                        const { jsPDF } = window.jspdf;
                        const pdfDoc = new jsPDF({
                            orientation: 'landscape', // Establecer landscape
                            unit: 'mm',
                            format: [pageWidthMM, pageHeightMM] // Ajustar tamaño del PDF al del canvas original
                        });

                        // Agregar la imagen renderizada del PDF existente sin reducir su tamaño
                        pdfDoc.addImage(imgData, 'PNG', 0, 0, pageWidthMM, pageHeightMM);

                        // Agregar nuevo texto al PDF si es necesario
                        pdfDoc.setFont('OpenSans-Semibold'); 
                        pdfDoc.setFontSize(40);

                        pdfDoc.setTextColor("#5a5a5a");

                        x1 = 23;
                        x2 = 293;
                        x3 = 563;
                        
                        y1 = 130;
                        y2 = 283;
                        y3 = 436;
                        y4 = 589;
                        
                        //extra ID
                        dx = 100;
                        dy = 14;

                        
                        xd1 = x1+dx;
                        yd1 = y1+dy;
                        
                        //Nombre
                        //Primera linea
                        pdfDoc.text(x1, y1, nombre);
                        pdfDoc.text(x1, y2, nombre);
                        pdfDoc.text(x1, y3, nombre);
                        pdfDoc.text(x1, y4, nombre);
                        // Segunda linea
                        pdfDoc.text(x2, y1, nombre);
                        pdfDoc.text(x2, y2, nombre);
                        pdfDoc.text(x2, y3, nombre);
                        pdfDoc.text(x2, y4, nombre);
                        // Tercera linea
                        pdfDoc.text(x3, y1, nombre);
                        pdfDoc.text(x3, y2, nombre);
                        pdfDoc.text(x3, y3, nombre);
                        pdfDoc.text(x3, y4, nombre);
                        
                        // ID
                        pdfDoc.setFontSize(30);
                        
                        //Primera linea
                        pdfDoc.text(x1+dx, y1+dy, id);
                        pdfDoc.text(x1+dx, y2+dy, id);
                        pdfDoc.text(x1+dx, y3+dy, id);
                        pdfDoc.text(x1+dx, y4+dy, id);
                        // Segunda linea
                        pdfDoc.text(x2+dx, y1+dy, id);
                        pdfDoc.text(x2+dx, y2+dy, id);
                        pdfDoc.text(x2+dx, y3+dy, id);
                        pdfDoc.text(x2+dx, y4+dy, id);
                        // Tercera linea
                        pdfDoc.text(x3+dx, y1+dy, id);
                        pdfDoc.text(x3+dx, y2+dy, id);
                        pdfDoc.text(x3+dx, y3+dy, id);
                        pdfDoc.text(x3+dx, y4+dy, id);
                        
                        // Facebook
                        //extra Facebook
                        fx = 155;
                        fy = -14;

                        pdfDoc.setFontSize(22);
                        
                        //Primera linea
                        pdfDoc.text(x1+fx, y1+fy, face);
                        pdfDoc.text(x1+fx, y2+fy, face);
                        pdfDoc.text(x1+fx, y3+fy, face);
                        pdfDoc.text(x1+fx, y4+fy, face);
                        // Segunda linea
                        pdfDoc.text(x2+fx, y1+fy, face);
                        pdfDoc.text(x2+fx, y2+fy, face);
                        pdfDoc.text(x2+fx, y3+fy, face);
                        pdfDoc.text(x2+fx, y4+fy, face);
                        // Tercera linea
                        pdfDoc.text(x3+fx, y1+fy, face);
                        pdfDoc.text(x3+fx, y2+fy, face);
                        pdfDoc.text(x3+fx, y3+fy, face);
                        pdfDoc.text(x3+fx, y4+fy, face);
                        
                        // Instagram
                        //extra Instagram
                        ix = 155;
                        iy = 2;
                        pdfDoc.setFontSize(22);
                        
                        //Primera linea
                        pdfDoc.text(x1+ix, y1+iy, insta);
                        pdfDoc.text(x1+ix, y2+iy, insta);
                        pdfDoc.text(x1+ix, y3+iy, insta);
                        pdfDoc.text(x1+ix, y4+iy, insta);
                        // Segunda linea
                        pdfDoc.text(x2+ix, y1+iy, insta);
                        pdfDoc.text(x2+ix, y2+iy, insta);
                        pdfDoc.text(x2+ix, y3+iy, insta);
                        pdfDoc.text(x2+ix, y4+iy, insta);
                        // Tercera linea
                        pdfDoc.text(x3+ix, y1+iy, insta);
                        pdfDoc.text(x3+ix, y2+iy, insta);
                        pdfDoc.text(x3+ix, y3+iy, insta);
                        pdfDoc.text(x3+ix, y4+iy, insta);

                        // WhatsApp
                        //extra WhatsApp
                        wx = 155;
                        wy = 18;
                        pdfDoc.setFontSize(22);
                        
                        //Primera linea
                        pdfDoc.text(x1+wx, y1+wy, whats);
                        pdfDoc.text(x1+wx, y2+wy, whats);
                        pdfDoc.text(x1+wx, y3+wy, whats);
                        pdfDoc.text(x1+wx, y4+wy, whats);
                        // Segunda linea
                        pdfDoc.text(x2+wx, y1+wy, whats);
                        pdfDoc.text(x2+wx, y2+wy, whats);
                        pdfDoc.text(x2+wx, y3+wy, whats);
                        pdfDoc.text(x2+wx, y4+wy, whats);
                        // Tercera linea
                        pdfDoc.text(x3+wx, y1+wy, whats);
                        pdfDoc.text(x3+wx, y2+wy, whats);
                        pdfDoc.text(x3+wx, y3+wy, whats);
                        pdfDoc.text(x3+wx, y4+wy, whats);


                        // Descargar el nuevo PDF
                        pdfDoc.save('nuevo_pdf_landscape.pdf');
                    });
                });
            });
        });
    });

</script>