<?php
/**
 * Gestionar cheque
 */

/* CHEQUES*/
function cc_gestionar_cheques() {
	global $wpdb;

	// Procesar el aporte si se envió el formulario
    cc_procesar_cheque();
    cc_procesar_aporte();

	$categorias = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}cheque_categorias");
	
	?>
	<!--  Mostrar formulario de creación de cheques -->
	<h1 class="mb-4">Gestión de Cheques</h1>
	<button type="submit" class="btn btn-primary" id="btn-cheque">Crear Cheque</button>

	<?php
	cc_listar_cheques();
}

/**
 * Lista de cheques
 */
function cc_listar_cheques() {
	global $wpdb;

	// Recuperar los cheques de la base de datos
	$cheques = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}cheques");

	// Para cada cheque, obtener sus aportes
	foreach ($cheques as $cheque) {
		$cheque->aportes = $wpdb->get_results($wpdb->prepare(
			"SELECT * FROM {$wpdb->prefix}cheque_inputs WHERE cheque_id = %d",
			$cheque->id
		));
	}

	?>

	<!-- Comienza a construir la tabla -->
	<h2 class="mb-4">Lista de Cheques</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Imagen</th>
				<th>Categoría</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>

		<!-- // Iterar sobre cada cheque y mostrarlo en la tabla -->
		<?php  foreach ($cheques as $cheque): 
			$categoria = $wpdb->get_row("SELECT nombre FROM {$wpdb->prefix}cheque_categorias WHERE id = {$cheque->categoria_id}");
			?>
			
			<!-- // Obtener el nombre de la categoría -->
			<tr>
				<td><?=esc_html($cheque->id)?></td>
				<td><?=esc_html($cheque->nombre)?></td>
				<td><?=esc_html($cheque->descripcion)?></td>
				<td><img src="<?=esc_url($cheque->imagen)?>" alt="<?=esc_attr($cheque->nombre)?>" style="max-width: 100px;"></td>
				<td><?=esc_html($categoria ? $categoria->nombre : 'Indefinida')?></td>
				<td>
					<!-- Editar Cheque -->
					<button 
						type="button" 
						class="btn btn-warning btn-sm btn-editar-cheque"
						data-id = <?=$cheque->id?>
						data-nombre="<?= esc_attr($cheque->nombre); ?>"
						data-descripcion="<?= esc_attr($cheque->descripcion); ?>"
						data-imagen="<?= esc_attr($cheque->imagen); ?>"
						data-categoria_id="<?= esc_attr($cheque->categoria_id); ?>"
					>
					Editar
					</button>
					<!-- Botón para borrar cheque-->
					<button class="btn btn-danger btn-sm btn-borrar-cheque" 
							data-id_cheque="<?= esc_attr($cheque->id); ?>">
						Borrar
					</button>
					<!-- Botón para abrir el modal de agregar aporte -->
					<button type="button" class="btn btn-primary btn-sm btn-aporte"
							data-id="<?= esc_attr($cheque->id); ?>">
						Agregar Aporte
					</button>
					<!-- Botón para mostrar los aportes -->
					<button class="btn btn-info btn-sm" 
						type="button" 
						data-bs-toggle="collapse" 
						data-bs-target="#aportes-<?= $cheque->id; ?>" 
						aria-expanded="false" 
						aria-controls="aportes-<?= $cheque->id; ?>">
						Mostrar Aportes
					</button>

					<!-- Lista de Aportes en un acordeón -->
					<div id="aportes-<?= $cheque->id; ?>" class="collapse mt-3">
						<ul class="list-group">
							<?php if (!empty($cheque->aportes)): ?>
								<?php foreach ($cheque->aportes as $aporte): ?>
									<li class="list-group-item">
										<strong>Nombre:</strong> <?= esc_html($aporte->nombre); ?><br>
										<strong>Tipo:</strong> <?= esc_html($aporte->tipo); ?><br>
										<strong>Fuente:</strong> <?= esc_html($aporte->font); ?><br>
										<strong>Alineación de Texto:</strong> <?= esc_html($aporte->textAlign); ?><br>
										<strong>Estilo de Relleno:</strong> <?= esc_html($aporte->fillStyle); ?><br>
										<strong>Input a texto:</strong> <?= esc_html($aporte->toText); ?><br>
										<strong>X:</strong> <?= esc_html($aporte->x); ?><br>
										<strong>Y:</strong> <?= esc_html($aporte->y); ?><br>
										 <!-- Botón para editar aporte-->
										 <button class="btn btn-warning btn-sm editar-aporte-btn" 
												data-id_input="<?= esc_attr($aporte->id); ?>"
												data-id="<?= esc_attr($cheque->id); ?>"
												data-cheque_id="<?= esc_attr($aporte->cheque_id); ?>"
												data-nombre="<?= esc_attr($aporte->nombre); ?>"
												data-tipo="<?= esc_attr($aporte->tipo); ?>"
												data-font="<?= esc_attr($aporte->font); ?>"
												data-textalign="<?= esc_attr($aporte->textAlign); ?>"
												data-fillstyle="<?= esc_attr($aporte->fillStyle); ?>"
												data-totext="<?= esc_attr($aporte->toText); ?>"
												data-x="<?= esc_attr($aporte->x); ?>"
												data-y="<?= esc_attr($aporte->y); ?>"
												>
											Editar
										 <!-- Botón para borrar aporte-->
										 <button class="btn btn-danger btn-sm borrar-aporte-btn" 
												data-id_input="<?= esc_attr($aporte->id); ?>">
											Borrar
										</button>
									</li>
								<?php endforeach; ?>
							<?php else: ?>
								<li class="list-group-item">No hay aportes para este cheque.</li>
							<?php endif; ?>
						</ul>
					</div>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<?php
	cc_modal_cheque();
	cc_modal_aportes();
}


function cc_modal_cheque(){
	global $wpdb;
	$categorias = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}cheque_categorias");
	?>
	<!-- Modal Cheque-->
	<div class="modal" id="modalCheque" tabindex="-1" aria-labelledby="modalChequeLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalChequeLabel">Agregar Cheque</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<h1 class="mb-4">Cheque</h1>
					<form method="POST" enctype="multipart/form-data" class="form-group" action="">
						<input type="hidden" id="cheque_id" name="cheque_id" value=""/>
						<input type="hidden" id="cheque_action" name="action" value="cheque"/>

						<div class="mb-3">
						<label for="cheque_nombre">Nombre</label>
						<input type="text" class="form-control" id="cheque_nombre" name="cheque_nombre" value="" required>
						</div>
						
						<div class="mb-3">
						<label for="cheque_descripcion">Descripción</label>
						<textarea class="form-control" id="cheque_descripcion" name="cheque_descripcion"></textarea>
						</div>
						
						<div class="mb-3">
						<label for="cheque_imagen">Imagen</label>
						<input type="file" class="form-control-file" id="cheque_imagen" name="cheque_imagen">
						<p>Imagen actual: <img id="cheque_img" src="" alt="" style="max-width: 300px;"></p>
						</div>
						
						<div class="mb-3">
						<label for="cheque_categoria_id">Categoría</label>
						<select class="form-control" id="cheque_categoria_id" name="cheque_categoria_id">
						<option value="">Selecciona una categoría</option>
						<?php foreach ($categorias as $categoria): ?>
							<option value="<?=esc_attr($categoria->id)?>"><?=esc_html($categoria->nombre)?></option>
						<?php endforeach ?>
						</select>
						</div>

						<input type="hidden" name="accion" value="editar_cheque">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
	jQuery(document).ready(function($) {
		modalCheque = $('#modalCheque');

		// Detectar cuando se hace clic en el botón de agregar
		$('#btn-cheque').on('click', function() {
			// Cargar los datos en el modal

			$('#cheque_id').val("");
			$('#cheque_nombre').val("");
			$('#cheque_descripcion').val("");
			$('#cheque_img').attr('src', "");
			$('#cheque_categoria_id').val("");
			$('#cheque_action').val("cheque_nuevo");
			// Abrir el modal
			modalCheque.modal('show');
		});

		// Detectar cuando se hace clic en el botón de editar
		$('.btn-editar-cheque').on('click', function() {
			// Obtener los datos del aporte desde los atributos del botón
			var cheque_id = $(this).data('id');
			var nombre = $(this).data('nombre');
			var descripcion = $(this).data('descripcion');
			var imagen = $(this).data('imagen');
			var categoria_id = $(this).data('categoria_id');

			
			// Cargar los datos en el modal

			$('#cheque_id').val(cheque_id);
			$('#cheque_nombre').val(nombre);
			$('#cheque_descripcion').val(descripcion);
			$('#cheque_img').attr('src', imagen);
			$('#cheque_categoria_id').val(categoria_id);
			$('#cheque_action').val("cheque_editar");
			

			// Abrir el modal
			modalCheque.modal('show');
		});
		// Confirmar y manejar la eliminación del cheque
		$('.btn-borrar-cheque').on('click', function() {
			var id_cheque = $(this).data('id_cheque');
			var confirmDelete = confirm("¿Estás seguro de que deseas eliminar este cheque?");

			if (confirmDelete) {
				// Enviar la solicitud para eliminar el cheque
				$.ajax({
					url: ajaxurl, // Ajax URL provisto por WordPress
					type: 'POST',
					data: {
						action: 'borrar_cheque', // Nombre de la acción en PHP
						id_cheque: id_cheque
					},
					success: function(response) {
						if (response.success) {
							alert('Cheque eliminado correctamente.');
							location.reload(); // Recargar la página para ver los cambios
						} else {
							alert('Ocurrió un error al intentar eliminar el cheque.');
						}
					}
				});
			}
    	});
	});
	</script>
	<?php
}

function cc_procesar_cheque() {
	global $wpdb;

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) ) {

		if($_POST['action'] == "cheque_editar"){
			cc_actualizar_cheque();
		}

		if($_POST['action'] == "cheque_nuevo"){
			cc_agregar_cheque();
		}

		
	}
}

/** Agregar cheque */
function cc_agregar_cheque(){
	global $wpdb;

	$nombre = sanitize_text_field($_POST['cheque_nombre']);
	$descripcion = sanitize_text_field($_POST['cheque_descripcion']);
	$categoria_id = sanitize_text_field($_POST['cheque_categoria_id']);

	// Manejo de la carga de imagen
	if (!empty($_FILES['cheque_imagen']['name'])) {
		$uploaded_file = $_FILES['cheque_imagen'];

		// Usa la función de WordPress para manejar la carga de archivos
		$upload_overrides = array('test_form' => false);
		$movefile = wp_handle_upload($uploaded_file, $upload_overrides);

		if ($movefile && !isset($movefile['error'])) {
			$imagen_url = $movefile['url']; // URL de la imagen subida
		} else {
			echo $movefile['error']; // Manejo de errores
		}
	}

	// Insertar el aporte en la base de datos asociado al cheque
	$wpdb->insert(
		"{$wpdb->prefix}cheques",[
			'nombre' => $nombre, 
			'descripcion' => $descripcion, 
			'imagen' => isset($imagen_url) ? $imagen_url : '', 
			'categoria_id' => $categoria_id, 

		],
		['%s', '%s', '%s', '%d']
	);

	echo '<div class="alert alert-success">Cheque guardado exitosamente.</div>';
}

/** Editar Cheque */
function cc_actualizar_cheque(){
	global $wpdb;

	$id_cheque = sanitize_text_field($_POST['cheque_id']);
	$nombre = sanitize_text_field($_POST['cheque_nombre']);
	$descripcion = sanitize_text_field($_POST['cheque_descripcion']);
	$categoria_id = sanitize_text_field($_POST['cheque_categoria_id']);

	// Manejo de la carga de imagen
	if (!empty($_FILES['cheque_imagen']['name'])) {
		$uploaded_file = $_FILES['cheque_imagen'];

		// Usa la función de WordPress para manejar la carga de archivos
		$upload_overrides = array('test_form' => false);
		$movefile = wp_handle_upload($uploaded_file, $upload_overrides);

		if ($movefile && !isset($movefile['error'])) {
			$imagen_url = $movefile['url']; // URL de la imagen subida
		} else {
			echo $movefile['error']; // Manejo de errores
		}
	}else {
		// Si no se carga una nueva imagen, mantener la URL actual
		$cheque_actual = $wpdb->get_row("SELECT imagen FROM {$wpdb->prefix}cheques WHERE id = {$id_cheque}");
		$imagen_url = $cheque_actual->imagen; // Mantener imagen existente
	}

	// Insertar el aporte en la base de datos asociado al cheque
	$wpdb->update(
		"{$wpdb->prefix}cheques",[
			'nombre' => $nombre, 
			'descripcion' => $descripcion, 
			'imagen' => isset($imagen_url) ? $imagen_url : '', 
			'categoria_id' => $categoria_id, 

		],
		[ 'id' => $id_cheque ], // Condición para el update
		['%s', '%s', '%s', '%d']
	);

	echo '<div class="alert alert-success">Cheque guardado exitosamente.</div>';
}

// Manejar la solicitud de eliminación del cheque
function borrar_cheque_callback() {
    global $wpdb;

    // Verificar que el ID del cheque esté presente en la solicitud
    if (isset($_POST['id_cheque'])) {
        $id_cheque = intval($_POST['id_cheque']);
        
        // Eliminar el cheque de la base de datos
        $table_name = $wpdb->prefix . 'cheques';
        $deleted = $wpdb->delete($table_name, array('id' => $id_cheque), array('%d'));

        if ($deleted) {
            wp_send_json_success('Cheque eliminado correctamente.');
        } else {
            wp_send_json_error('Error al eliminar el cheque.');
        }
    } else {
        wp_send_json_error('ID del cheque no proporcionado.');
    }
}
add_action('wp_ajax_borrar_cheque', 'borrar_cheque_callback');

function cc_estilos_scripts() {
	wp_enqueue_script('jquery');

	// Cargar Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');

    // Cargar Bootstrap JS
    wp_enqueue_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', [], false, true);
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', [], false, true);
}
add_action('admin_enqueue_scripts', 'cc_estilos_scripts');