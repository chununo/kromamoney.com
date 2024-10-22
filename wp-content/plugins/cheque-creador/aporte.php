<?php

function cc_modal_aportes(){
	?>
	<!-- Modal Aporte-->
	<div class="modal" id="modalAporte" tabindex="-1" aria-labelledby="modalAporteLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAporteLabel">Agregar Aporte</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="formAporte" method="POST" action="">

						<input type="hidden" id="id_input" name="id_input" value=""/>
						<input type="hidden" id="chequeIdAporte" name="cheque_id" value="">
						<input type="hidden" name="action" value="aporte">

						<div class="mb-3">
							<label for="nombreAporte" class="form-label">Nombre input *</label>
							<input type="text" class="form-control" id="nombreAporte" name="nombreAporte" placeholder="input" required>
						</div>
						<div class="mb-3">
							<label for="tipoAporte" class="form-label">Tipo de input (text, number, date)*</label>
							<input type="text" class="form-control" id="tipoAporte" name="tipoAporte" placeholder="type" value="text"  required>
						</div>
						<div class="mb-3">
							<label for="fontAporte" class="form-label">Tamaño y nombre de la fuente (200px futura-condensed) *</label>
							<input type="text" class="form-control" id="fontAporte" name="fontAporte" placeholder="futura" value="200px futura-condensed" required>
						</div>
						<div class="mb-3">
							<label for="textAlignAporte" class="form-label">Alinear texto (left, center, right) *</label>
							<input type="text" class="form-control" id="textAlignAporte" name="textAlignAporte" placeholder="textAlign" value="left" required>
						</div>
						<div class="mb-3">
							<label for="textBaselineAporte" class="form-label">Base de texto (top, bottom, middle)*</label>
							<input type="text" class="form-control" id="textBaselineAporte" name="textBaselineAporte" value="middle" placeholder="textBaseline" required>
						</div>
						<div class="mb-3">
							<label for="fillStyleAporte" class="form-label">Color del texto (white, black, #000FFF)</label>
							<input type="text" class="form-control" id="fillStyleAporte" name="fillStyleAporte" value="white" placeholder="fillStyle" required>
						</div>
						<div class="mb-3">
							<label for="toTextAporte" class="form-label">Input de apoyo, nombre del input con número, lo cambia a texto (opcional)</label>
							<input type="text" class="form-control" id="toTextAporte" name="toTextAporte" value="" placeholder="Numero a texto (opcional)" >
						</div>
						<div class="mb-3">
							<label for="xAporte" class="form-label">Posición X *</label>
							<input type="number" class="form-control" id="xAporte" name="xAporte" value="0" placeholder="x" required>
						</div>
						<div class="mb-3">
							<label for="yAporte" class="form-label">Posición Y *</label>
							<input type="number" class="form-control" id="yAporte" name="yAporte" value="0" placeholder="y" required>
						</div>

						<button type="submit" class="btn btn-success">Guardar Aporte</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		
	jQuery(document).ready(function($) {

		modal = $('#modalAporte');
		
		// Detectar cuando se hace clic en el botón de agregar
		$('.btn-aporte').on('click', function() {
			// Obtener los datos del aporte desde los atributos del botón
			var cheque_id = $(this).data('id');
			$('#chequeIdAporte').val(cheque_id);
			$('#id_input').val('');
			$('#nombreAporte').val('');
			$('#tipoAporte').val('text');
			$('#fontAporte').val('200px futura-condensed');
			$('#textAlignAporte').val('left');
			$('#fillStyleAporte').val('white');
			$('#toTextAporte').val('');
			$('#xAporte').val(0);
			$('#yAporte').val(0);

			// Abrir el modal
			modal.modal('show');
		});

		// Detectar cuando se hace clic en el botón de editar
		$('.editar-aporte-btn').on('click', function() {
			// Obtener los datos del aporte desde los atributos del botón
			var id_input = $(this).data('id_input');
			var cheque_id = $(this).data('id');
			var nombre = $(this).data('nombre');
			var tipo = $(this).data('tipo');
			var font = $(this).data('font');
			var textAlign = $(this).data('textalign');
			var fillStyle = $(this).data('fillstyle');
			var toText = $(this).data('totext');
			var x = $(this).data('x');
			var y = $(this).data('y');
			
			// Cargar los datos en el modal
			$('#id_input').val(id_input);
			$('#chequeIdAporte').val(cheque_id);
			$('#nombreAporte').val(nombre);
			$('#tipoAporte').val(tipo);
			$('#fontAporte').val(font);
			$('#textAlignAporte').val(textAlign);
			$('#fillStyleAporte').val(fillStyle);
			$('#toTextAporte').val(toText);
			$('#xAporte').val(x);
			$('#yAporte').val(y);
		

			// Abrir el modal
			modal.modal('show');
		});

		// Confirmar y manejar la eliminación del aporte
		$('.borrar-aporte-btn').on('click', function() {
			var id_input = $(this).data('id_input');
			var confirmDelete = confirm("¿Estás seguro de que deseas eliminar este aporte?");

			if (confirmDelete) {
				// Enviar la solicitud para eliminar el aporte
				$.ajax({
					url: ajaxurl, // Ajax URL provisto por WordPress
					type: 'POST',
					data: {
						action: 'borrar_aporte', // Nombre de la acción en PHP
						id_input: id_input
					},
					success: function(response) {
						if (response.success) {
							alert('Aporte eliminado correctamente.');
							location.reload(); // Recargar la página para ver los cambios
						} else {
							alert('Ocurrió un error al intentar eliminar el aporte.');
						}
					}
				});
			}
    	});
	});

	</script>
	<?php
}

function cc_procesar_aporte() {
	global $wpdb;

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cheque_id']) && isset($_POST['nombreAporte']) ) {

		if(isset($_POST['id_input']) && !empty($_POST['id_input'])){
			cc_actualizar_aporte();
		}else{
			cc_agregar_aporte();
		}

		
	}
}

function cc_agregar_aporte(){
    global $wpdb;

	$cheque_id = intval($_POST['cheque_id']);
	$nombre = sanitize_text_field($_POST['nombreAporte']);
	$tipo = sanitize_text_field($_POST['tipoAporte']);
	$font = sanitize_text_field($_POST['fontAporte']);
	$textAlign = sanitize_text_field($_POST['textAlignAporte']);
	$textBaseline = sanitize_text_field($_POST['textBaselineAporte']);
	$fillStyle = sanitize_text_field($_POST['fillStyleAporte']);
	$toText = sanitize_text_field($_POST['toTextAporte']);
	$x = intval($_POST['xAporte']);
	$y = intval($_POST['yAporte']);

	// Insertar el aporte en la base de datos asociado al cheque
	$wpdb->insert(
		"{$wpdb->prefix}cheque_inputs",[
			'cheque_id' => $cheque_id, 
			'nombre' => $nombre, 
			'tipo' => $tipo, 
			'font' => $font, 
			'textAlign' => $textAlign, 
			'textBaseline' => $textBaseline, 
			'fillStyle' => $fillStyle, 
			'toText' => $toText, 
			'x' => $x, 
			'y' => $y
		],
		['%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d']
	);

	echo '<div class="alert alert-success">Aporte guardado exitosamente.</div>';
}

function cc_actualizar_aporte() {
    global $wpdb;

	
	$id_input = intval($_POST['id_input']);
	$nombre = sanitize_text_field($_POST['nombreAporte']);
	$tipo = sanitize_text_field($_POST['tipoAporte']);
	$font = sanitize_text_field($_POST['fontAporte']);
	$textAlign = sanitize_text_field($_POST['textAlignAporte']);
	$textBaseline = sanitize_text_field($_POST['textBaselineAporte']);
	$fillStyle = sanitize_text_field($_POST['fillStyleAporte']);
	$toText = sanitize_text_field($_POST['toTextAporte']);
	$x = intval($_POST['xAporte']);
	$y = intval($_POST['yAporte']);

	$wpdb->update(
		"{$wpdb->prefix}cheque_inputs", // Nombre de la tabla
		[
			'nombre' => $nombre,
			'tipo' => $tipo,
			'font' => $font,
			'textAlign' => $textAlign,
			'textBaseline' => $textBaseline,
			'fillStyle' => $fillStyle,
			'toText' => $toText,
			'x' => $x,
			'y' => $y
		],
		[ 'id' => $id_input ], // Condición para el update
		[
			'%s', // nombre es una cadena
			'%s', // tipo es una cadena
			'%s', // font es una cadena
			'%s', // textAlign es una cadena
			'%s', // textBaseline es una cadena
			'%s', // fillStyle es una cadena
			'%s', // toText es una cadena
			'%d', // x es un entero
			'%d'  // y es un entero
		],
		[ '%d' ] // Tipo de dato del id_input
	);

	echo '<div class="alert alert-success">Aporte actualizado exitosamente.</div>';
}

// Manejar la solicitud de eliminación del aporte
function borrar_aporte_callback() {
    global $wpdb;

    // Verificar que el ID del aporte esté presente en la solicitud
    if (isset($_POST['id_input'])) {
        $id_input = intval($_POST['id_input']);
        
        // Eliminar el aporte de la base de datos
        $table_name = $wpdb->prefix . 'cheque_inputs';
        $deleted = $wpdb->delete($table_name, array('id' => $id_input), array('%d'));

        if ($deleted) {
            wp_send_json_success('Aporte eliminado correctamente.');
        } else {
            wp_send_json_error('Error al eliminar el aporte.');
        }
    } else {
        wp_send_json_error('ID del aporte no proporcionado.');
    }
}
add_action('wp_ajax_borrar_aporte', 'borrar_aporte_callback');