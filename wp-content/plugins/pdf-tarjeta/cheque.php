<!-- Incluir jQuery desde CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<style id='wp-fonts-local'>
@font-face{font-family:futura-light;font-style:normal;font-weight:400;font-display:fallback;src:url('https://servidor-1.com/kromamoney.com/wp-content/uploads/useanyfont/7977Futura-Light.woff2') format('woff2');}
@font-face{font-family:futura-condensed;font-style:normal;font-weight:400;font-display:fallback;src:url('https://servidor-1.com/kromamoney.com/wp-content/uploads/useanyfont/7367Futura-Condensed.woff2') format('woff2');}
@font-face{font-family:futura;font-style:normal;font-weight:400;font-display:fallback;src:url('https://servidor-1.com/kromamoney.com/wp-content/uploads/useanyfont/2810Futura.woff2') format('woff2');}

</style>
<!-- Select de categorías -->
<form class="custom-form">
	<label class="dark-label" for="select-categorys">Selecciona una opción</label>
	<!-- Selecciona categoría -->
	<select class="dark-select" id="select-categorys" onchange="changeCategory(this.value)">
	</select>
	<!-- Selecciona estilo de cheque -->
	<select class="dark-select" id="select-styles" onchange="changeStyle(this.value)">
	</select>

	<!-- Input de nombre -->
	<div class="field in-control" id="div-name" style="display:none;">
		<label class="dark-label" class="label">Nombre</label>
		<div class="control">
			<input class="changeinput dark-input" type="text" placeholder="Ingresa tu nombre" id="input-name" style="text-transform: uppercase;"  >
		</div>
	</div>
	<!-- Input de nombre 2 -->
	<div class="field in-control" id="div-name2" style="display:none;">
		<label class="dark-label" class="label">Nombre 2</label>
		<div class="control">
			<input class="changeinput dark-input" type="text" placeholder="Nombre 2" id="input-name2" style="text-transform: uppercase;" >
		</div>
	</div>
	<!-- Input de cantidad -->
	<div class="field in-control" id="div-cantidad" style="display:none;">
		<label class="dark-label" class="label">Cantidad</label>
		<div class="control">
			<input class="changeinput dark-input" type="text" id="input-cantidad" value="" placeholder="1,000,000.00" data-type="currency" >
		</div>
		<label class="dark-label" class="label" id="info-cantidad"></label>
	</div>
	<!-- Input de cantidad -->
	<div class="field in-control" id="div-moneda" style="display:none;">
		<label class="dark-label" class="label">Modena</label>
		<div class="control">
		<select class="changeselect dark-select" id="select-moneda">
			<option value="MXN" data-simbolo="$" data-singular="Peso Mexicano" data-plural="Pesos Mexicanos" selected>$ (PESOS MEXICANOS) </option>
			<option value="USD" data-simbolo="$" data-singular="Dolar" data-plural="Dolares">$ (DOLARES AMERICANOS) </option>
			<option value="BOB" data-simbolo="Bs" data-singular="Boliviano" data-plural="Bolivianos">Bs (BOLIVIANOS)</option>
			<option value="CRC" data-simbolo="₡" data-singular="Colón Costarricense" data-plural="Colones Costarricense">₡ (COLONES) </option>
			<!-- <option value="USD" data-simbolo="$" data-singular="Dolar" data-plural="Dolares">Ecuador ($) </option> -->
			<option value="GTQ" data-simbolo="Q" data-singular="Quetzal" data-plural="Quetzales">Q (QUETZALES) </option>
			<option value="HNL" data-simbolo="L" data-singular="Lempira Hondureño" data-plural="Lempiras Hondureños">L (LEMPIRAS)</option>
			<option value="PEN" data-simbolo="S/" data-singular="Sol peruano" data-plural="Soles peruanos">S/ (SOLES) </option>
			<!-- <option value="USD" data-simbolo="$" data-singular="Dolar" data-plural="Dolares">Puerto Rico ($) </option> -->
		</select>
		</div>
		<label class="dark-label" class="label" id="info-cantidad"></label>
	</div>
	<!-- Input de concepto -->
	<div class="field in-control" id="div-concepto" style="display:none;">
		<label class="dark-label" class="label">Concepto</label>
		<div class="control">
			<input class="changeinput dark-input" type="text" placeholder="$100,000.00" id="input-concepto" style="text-transform: uppercase;" >
		</div>
	</div>
	<!-- Input de fecha -->
	<div class="field in-control" id="div-fecha" style="display:none;">
		<label class="dark-label" class="label">Fecha</label>
		<div class="control">
			<input class="changeinput dark-input" type="text" placeholder="año/mes/dia" id="input-fecha" style="text-transform: uppercase;" >
		</div>
	</div>
</form>

<form id="load-inputs" class="custom-form" style="display:none;">

</form>

<div class="field in-control" id="div-boton-pdf" style="display:none;">
	<button class="dark-button" onclick="exportarPDF()" id="btn-pdf">Exportar a PDF</button>
</div>
<div style="position: relative; margin-bottom: 100px;">
	<canvas id="canva-cheque" class="canva-style" width="3543" height="1772" style="border:1px solid #000000; position: absolute; top: 0; left: 0;"></canvas>
	<canvas id="canva-texto" class="canva-style"  width="3543" height="1772" style="border:1px solid #000000; position: absolute; top: 0; left: 0;"></canvas>
</div>

<canvas id="canva-combinado" class="canva-style"  width="3543" height="1772" style="display:none;"></canvas>

<style>
	/* Estilo para limitar el tamaño del canvas visualmente */
	.canva-style {
		width: 100%;      /* El canvas ocupará el 100% del ancho de la pantalla */
		/* max-width: 500px; El ancho máximo del canvas será 500px */
		height: auto;     /* Mantiene la proporción del canvas */
		border: 1px solid black;
		margin : 15px 0px !important;

	}
	.dark-label{
		font-family: 'futura-light', sans-serif !important; 
		font-size: 0.8rem !important;
	}
	.dark-input {		
		margin-bottom : 15px !important;
		display: block !important;
		width: 100% !important;
		padding: 0.375rem 0.75rem !important;
		font-size: 1.2rem !important;
		font-weight: 400 !important;
		font-family: 'futura-light', sans-serif !important; 
		line-height: 1.5 !important;
		color: #f8f9fa !important; 
		background-color: #343a40 !important; 
		background-clip: padding-box !important;
		border: 1px solid #495057 !important; 
		border-radius: 0.25rem !important;
		transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
	}

	.dark-input:hover {
		border-color: #6c757d !important; 
	}

	.dark-input:focus {
		color: #f8f9fa !important; 
		background-color: #343a40 !important; 
		border-color: #80bdff !important; 
		outline: 0 !important;
		box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
	}

	.dark-button {
		margin-bottom : 15px !important;
		display: inline-block !important;
		font-weight: 400 !important;
		color: #fff !important; 
		text-align: center !important;
		vertical-align: middle !important;
		cursor: pointer !important;
		background-color: #343a40 !important; 
		border: 1px solid #343a40 !important; 
		padding: 0.375rem 0.75rem !important;
		font-size: 1.2rem !important;
		font-family: 'futura-light', sans-serif !important; 
		line-height: 1.5 !important;
		border-radius: 0.25rem !important;
		transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
	}

	.dark-button:hover {
		color: #fff !important; 
		background-color: #23272b !important;
		border-color: #1d2124 !important;
	}

	.dark-button:active {
		background-color: #1d2124 !important; 
		border-color: #171a1d !important;
		box-shadow: 0 0.2rem 0.4rem rgba(0, 0, 0, 0.2) !important;
	}

	.dark-button:disabled {
		color: #6c757d !important;
		background-color: #343a40 !important;
		border-color: #343a40 !important;
		opacity: 0.65 !important;
		cursor: not-allowed !important;
	}

	.dark-select {
		margin-bottom : 15px !important;
		display: block !important;
		width: 100% !important;
		padding: 0.375rem 0.75rem !important;
		font-size: 1.2rem !important;
		font-weight: 400 !important;
		font-family: 'futura-light', sans-serif !important; 
		line-height: 1.5 !important;
		color: #fff !important; /* Texto blanco */
		background-color: #343a40 !important; /* Fondo oscuro */
		border: 1px solid #495057 !important; /* Borde más claro */
		border-radius: 0.25rem !important;
		appearance: none !important; /* Oculta la apariencia por defecto del select */
		background-image: url('data:image/svg+xml !important;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="white" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 5.5a.5.5 0 0 1 .8-.4L8 9.293l5.7-4.193a.5.5 0 0 1 .6.8l-6 4.5a.5.5 0 0 1-.6 0l-6-4.5z"/></svg>') !important; /* Icono de flecha */
		background-repeat: no-repeat !important;
		background-position: right 0.75rem center !important; /* Ajusta la posición de la flecha */
		background-size: 1rem !important; /* Tamaño de la flecha */
		transition: border-color 0.15s ease-in-out, background-color 0.15s ease-in-out !important;
	}

	/* Efecto de foco */
	.dark-select:focus {
		color: #fff !important; /* Texto blanco */
		background-color: #343a40 !important; /* Mantiene el fondo oscuro */
		border-color: #80bdff !important; /* Color del borde en foco */
		outline: 0 !important;
		box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important; /* Sombra azul */
	}

	/* Deshabilitado */
	.dark-select:disabled {
		background-color: #495057 !important; /* Fondo gris oscuro para deshabilitado */
		color: #6c757d !important; /* Texto gris */
	}
</style>

<script>

console.log(all_cheques);

//Objeto info
var catsty = all_cheques;
  

//VARIABLES

var selectCategorys = $("#select-categorys");
var selectStyles = $("#select-styles");
var formin = $("#load-inputs");
var btnPDF = $("#btn-pdf");
var divpdfbtn = $("#div-boton-pdf");
var styles = {};
var style = {};

var canvaCheque = document.getElementById('canva-cheque');
var contextCheque = canvaCheque.getContext('2d');
var canvaTexto = document.getElementById('canva-texto');
var contextTexto = canvaTexto.getContext('2d');
var canvaCombinado = document.getElementById('canva-combinado');
var contextCombinado = canvaCombinado.getContext('2d');

//INICIO DE TODO
selectCategorys.append($('<option>', { 
		value: '',
		text : 'Selecciona categoría' 
	}));

for (let cat_id in all_cheques){
	let cat = all_cheques[cat_id];
	selectCategorys.append($('<option>', { 
		value: cat_id,
		text : cat.name 
	}));
}

selectStyles.prop('disabled',true);
btnPDF.prop('disabled',true);



//EVENTOS

function changeCategory(catVal){
	selectStyles.prop('disabled',true);
	$(".in-control").hide();

	selectStyles.empty(); // Limpiamos primero las opciones

	selectStyles.append($('<option>', { 
		value: '',
		text : 'Selecciona estilo' 
	}));

	if(catVal != ""){
		selectStyles.prop('disabled',false);

		styles = catsty[catVal].styles;
		
		for(let style_id in styles ){
			let sty = styles[style_id];
			selectStyles.append($('<option>', { 
				value: catVal+'-'+style_id,
				text : sty.name 
			}));

		}

	}
}

// Dibujar el texto "Cargando..." en el canvas
function loadingCanvas() {
    contextCheque.clearRect(0, 0, canvaCheque.width, canvaCheque.height);
    contextCheque.font = '30px Arial';
    contextCheque.fillStyle = 'white';
    contextCheque.textAlign = 'center';
    contextCheque.textBaseline = 'middle';
    contextCheque.fillText('Cargando imagen...', canvaCheque.width / 2, canvaCheque.height / 2);
  }


// Función para cargar una imagen de manera asíncrona
function loadImage(src) {
	return new Promise((resolve, reject) => {
		const image = new Image();
		contextCheque.clearRect(0, 0, canvaCheque.width, canvaCheque.height);

		image.src = src;
		image.onload = () => {

			if(image.width > image.height){
				var scaleFactor = 3543 / image.width; //150dpi 60 cm
			}else{
				var scaleFactor = 1772 / image.width; //150dpi 60 cm
			}

			
			canvaCheque.width = image.width * scaleFactor;
			canvaCheque.height  = image.height * scaleFactor;
			contextCheque.drawImage(image, 0, 0, canvaCheque.width, canvaCheque.height);

			canvaTexto.width = image.width * scaleFactor;
			canvaTexto.height  = image.height * scaleFactor;
			canvaCombinado.width = image.width * scaleFactor;
			canvaCombinado.height  = image.height * scaleFactor;
			resolve(image);
		};
		image.onerror = (err) => reject(err);
	});
}

/** Recarga el cheque */
async function changeStyle(catstyval){
	loadingCanvas();
	//Desactiva todos los inputs
	$(".in-control").hide();
	formin.empty();

	if(catstyval != ""){
		ids =catstyval.split('-');
	
		style = catsty[ids[0]].styles[ids[1]];
	
		var url = style.image;
		var image = await loadImage(url);
	
		//Activa inputs
		style.inputs.forEach((input,index)=>{
			$('#div-'+input.name).show();

			if (input.name == 'cantidad') {
				$('#div-moneda').show();
			}

			formin.append($('<div/>',{
				id:'divin-'+input.name,
			}));

			$('#divin-'+input.name).append($('<label/>',{text:input.name}));
			$('#divin-'+input.name).append($('<div/>',{class:"control"}));
			$('#divin-'+input.name+' .control').append($('<input/>',{
				class:"changeinput dark-input",
				type: input.type,
				id:'inputin-'+input.name,
				style:"text-transform: uppercase;",

			}));

		});

		divpdfbtn.show();
		
		changeText();

	}

}

function changeText(){

	var isText = true;

	contextTexto.clearRect(0, 0, canvaTexto.width, canvaTexto.height);
	style.inputs.forEach((input,index)=>{

		//Limpia texto
		
		var data = $('#input-'+input.name).val() !== undefined ? $('#input-'+input.name).val() : '0';
		var texto = "";
		var moneda = $('#select-moneda').val();
		var simbolo = $('#select-moneda option:selected').data('simbolo');
		var singular = $('#select-moneda option:selected').data('singular');
		var plural = $('#select-moneda option:selected').data('plural');

		if($('#input-'+input.name).data("type")){
			if($('#input-'+input.name).data("type") == "currency"){

				if(input.toText !== undefined && input.toText != ''){
					textonumero = numeroALetras(data, {
								plural: plural,
								singular: singular,
								centPlural: "CENTAVOS",
								centSingular: "CENTAVO"
								});
					textocompleto = textonumero + '/ ' + formatCurrency($('#input-'+input.name),'blur',simbolo);
					$('#input-'+input.toText).val(textocompleto.replace(/\s{2,}/g, ' '));
					texto = formatCurrency($('#input-'+input.name),'blur',simbolo);
				}else{
					texto = formatCurrency($('#input-'+input.name),'blur',simbolo);
				}

				$('#info-'+input.name).text(formatCurrency($('#input-'+input.name),'blur',simbolo));
				setTimeout(function() {
					console.log('Generando texto antes de terminar el currency');
				}, 1000);
			}
		}else{
			texto = data;
		}

		if ($('#input-'+input.name).css('text-transform') === 'uppercase') {
			// Convertir el texto a mayúsculas
			var textoMayusculas = $('#input-'+input.name).val().toUpperCase();
			// Establecer el texto en mayúsculas en el input
			texto = textoMayusculas;
		}
		
		// Establecer propiedades de la fuente
		contextTexto.font = input.font ?? "20px Arial";
		contextTexto.fillStyle = input.fillStyle ?? "white";
		//Alinear texto
		contextTexto.textAlign = input.textAlign ?? 'left';
		contextTexto.textBaseline = input.textBaseline ?? 'middle';
		// Dibujar el texto en el canvas
		contextTexto.fillText(texto, input.x, input.y);

		isText = texto != '' && isText;

	});

	btnPDF.prop('disabled',!isText);

}

//Cambio de texto
$(".changeinput").on("input", function(e) {
	changeText();
});
//Cambio de texto
$(".changeselect").change(function(e) {
	changeText();
});

// Función para fusionar los canvas y exportar a PDF
function exportarPDF() {
	// Fusionar los dos canvas en uno
	contextCombinado.clearRect(0, 0, canvaCombinado.width, canvaCombinado.height);

	// Dibujar el contenido del cheque
	contextCombinado.drawImage(canvaCheque, 0, 0, canvaCombinado.width, canvaCombinado.height);

	// Dibujar el contenido del texto
	contextCombinado.drawImage(canvaTexto, 0, 0, canvaCombinado.width, canvaCombinado.height);

	// Exportar el canvas combinado a PDF
	const { jsPDF } = window.jspdf;

	var orie = canvaCombinado.width > canvaCombinado.height ? 'landscape' : 'portrait';

	var pdf = new jsPDF({
		orientation: orie,
  		unit: 'pt',  // Unidades en puntos
		format: [820.39, 1700.79]  // Tamaño personalizado en puntos
	});  // Puedes cambiar a 'portrait' si prefieres orientación vertical

		//contextCombinado.scale(scaleFactor, scaleFactor); 
	const imgWidth = (canvaCombinado.width);
	const imgHeight = (canvaCombinado.height);

	var imgData = canvaCombinado.toDataURL('image/png',1.0);
		
		// Dimensiones de la página en puntos (tamaño carta: 612 x 792)
	const pageWidth = pdf.internal.pageSize.getWidth();
	const pageHeight = pdf.internal.pageSize.getHeight();
	
	var scaleFactor = pageWidth / imgWidth;
	
	// Calcular nuevas dimensiones escaladas
	const scaledWidth = imgWidth * scaleFactor;
	const scaledHeight = imgHeight * scaleFactor;
	
		// Calcular coordenadas para centrar la imagen
	const xPos = (pageWidth - scaledWidth) / 2;
	const yPos = (pageHeight - scaledHeight) / 2;

	var namefile = style.name ?? 'cheque';
	var nameclient = $('#input-name').val() !== undefined ? $('#input-name').val() : null;

	namefile += nameclient == null ? '' : '-'+nameclient;

	pdf.addImage(imgData, 'PNG', xPos, yPos, scaledWidth, scaledHeight);  // Ajustar las dimensiones a tu preferencia
	pdf.save(namefile+".pdf");
}


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur, symbol = '$') {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  
  var input_val = input.val() !== undefined ? input.val() : '0';

  console.log(input.val());
  
  // don't validate empty input
  if (input_val === "") { return '0'; }
  
  

  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = symbol + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = symbol + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += "";
    }
  }
	
  return input_val;
  // send updated string to input
  input.val(input_val);


//   // put caret back in the right position
//   var updated_len = input_val.length;
//   caret_pos = updated_len - original_len + caret_pos;
//   input[0].setSelectionRange(caret_pos, caret_pos);
}

var numeroALetras = (function() {
    // Código basado en el comentario de @sapienman
    // Código basado en https://gist.github.com/alfchee/e563340276f89b22042a
    function Unidades(num) {

        switch (num) {
            case 1:
                return 'UN';
            case 2:
                return 'DOS';
            case 3:
                return 'TRES';
            case 4:
                return 'CUATRO';
            case 5:
                return 'CINCO';
            case 6:
                return 'SEIS';
            case 7:
                return 'SIETE';
            case 8:
                return 'OCHO';
            case 9:
                return 'NUEVE';
        }

        return '';
    } //Unidades()

    function Decenas(num) {

        let decena = Math.floor(num / 10);
        let unidad = num - (decena * 10);

        switch (decena) {
            case 1:
                switch (unidad) {
                    case 0:
                        return 'DIEZ';
                    case 1:
                        return 'ONCE';
                    case 2:
                        return 'DOCE';
                    case 3:
                        return 'TRECE';
                    case 4:
                        return 'CATORCE';
                    case 5:
                        return 'QUINCE';
                    default:
                        return 'DIECI' + Unidades(unidad);
                }
            case 2:
                switch (unidad) {
                    case 0:
                        return 'VEINTE';
                    default:
                        return 'VEINTI' + Unidades(unidad);
                }
            case 3:
                return DecenasY('TREINTA', unidad);
            case 4:
                return DecenasY('CUARENTA', unidad);
            case 5:
                return DecenasY('CINCUENTA', unidad);
            case 6:
                return DecenasY('SESENTA', unidad);
            case 7:
                return DecenasY('SETENTA', unidad);
            case 8:
                return DecenasY('OCHENTA', unidad);
            case 9:
                return DecenasY('NOVENTA', unidad);
            case 0:
                return Unidades(unidad);
        }
    } //Unidades()

    function DecenasY(strSin, numUnidades) {
        if (numUnidades > 0)
            return strSin + ' Y ' + Unidades(numUnidades)

        return strSin;
    } //DecenasY()

    function Centenas(num) {
        let centenas = Math.floor(num / 100);
        let decenas = num - (centenas * 100);

        switch (centenas) {
            case 1:
                if (decenas > 0)
                    return 'CIENTO ' + Decenas(decenas);
                return 'CIEN';
            case 2:
                return 'DOSCIENTOS ' + Decenas(decenas);
            case 3:
                return 'TRESCIENTOS ' + Decenas(decenas);
            case 4:
                return 'CUATROCIENTOS ' + Decenas(decenas);
            case 5:
                return 'QUINIENTOS ' + Decenas(decenas);
            case 6:
                return 'SEISCIENTOS ' + Decenas(decenas);
            case 7:
                return 'SETECIENTOS ' + Decenas(decenas);
            case 8:
                return 'OCHOCIENTOS ' + Decenas(decenas);
            case 9:
                return 'NOVECIENTOS ' + Decenas(decenas);
        }

        return Decenas(decenas);
    } //Centenas()

    function Seccion(num, divisor, strSingular, strPlural) {
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let letras = '';

        if (cientos > 0)
            if (cientos > 1)
                letras = Centenas(cientos) + ' ' + strPlural;
            else
                letras = strSingular;

        if (resto > 0)
            letras += '';

        return letras;
    } //Seccion()

    function Miles(num) {
        let divisor = 1000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMiles = Seccion(num, divisor, 'MIL', 'MIL');
        let strCentenas = Centenas(resto);

        if (strMiles == '')
            return strCentenas;

        return strMiles + ' ' + strCentenas;
    } //Miles()

    function Millones(num) {
        let divisor = 1000000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

		var singMilon = resto == 0 || resto == "" ? "UN MILLÓN DE" : "UN MILLÓN CON" ;
		var pluMilon = resto == 0 || resto == "" ? "MILLONES DE" : "MILLONES CON" ;

        let strMillones = Seccion(num, divisor, singMilon, pluMilon);
        let strMiles = Miles(resto);

        if (strMillones == '')
            return strMiles;

        return strMillones + ' ' + strMiles;
    } //Millones()

    return function NumeroALetras(num, currency) {
        currency = currency || {};
        let data = {
            numero: num,
            enteros: Math.floor(num),
            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
            letrasCentavos: '',
            letrasMonedaPlural: currency.plural || 'PESOS MEXICANOS', //'PESOS', 'Dólares', 'Bolívares', 'etcs'
            letrasMonedaSingular: currency.singular || 'PESO MEXICANO', //'PESO', 'Dólar', 'Bolivar', 'etc'
            letrasMonedaCentavoPlural: currency.centPlural || 'CHIQUI PESOS MEXICANOS',
            letrasMonedaCentavoSingular: currency.centSingular || 'CHIQUI PESO MEXICANO'
        };

        if (data.centavos > 0) {
            data.letrasCentavos = 'CON ' + (function() {
                if (data.centavos == 1)
                    return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
                else
                    return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
            })();
        };

        if (data.enteros == 0)
            return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
        if (data.enteros == 1)
            return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
        else
            return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    };

})();

</script>
