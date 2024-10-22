<?php
function cc_gestionar_categorias() {
	global $wpdb;
	cc_procesar_categoria();
	?>
	<h1>Gestión de Categorías</h1>
	<button type="submit" class="btn btn-primary" id="btn-categoria">Crear Categoría</button>
	<?php
	cc_listar_categorias();
}

function cc_listar_categorias(){
	global $wpdb;
	$categorias = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}cheque_categorias");
	?>
	<h1 class="mb-4">Categorías</h1>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($categorias as $categoria): ?>
			<tr>
				<td><?=esc_html($categoria->id)?></td>
				<td><?=esc_html($categoria->nombre)?></td>
				<td>
					<buttom type="button" class="btn btn-warning btn-sm btn-editar-categoria" data-id="<?=$categoria->id?>" data-nombre="<?= esc_attr($categoria->nombre); ?>">Editar</buttom> 
					<buttom type="button" class="btn btn-danger btn-sm btn-borrar-categoria <?=$categoria->id == 1 ? 'disabled' : '' ?>" data-id_categoria="<?=$categoria->id?>">Borrar</buttom>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<?php
	cc_modal_categoria();
}

function cc_modal_categoria(){
	global $wpdb;
	?>
	<!-- Modal categoria-->
	<div class="modal" id="modalcategoria" tabindex="-1" aria-labelledby="modalcategoriaLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalcategoriaLabel">Categoría</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<h1 class="mb-4">categoría</h1>
					<form method="POST" enctype="multipart/form-data" class="form-group" action="">
						<input type="hidden" id="categoria_id" name="categoria_id" value=""/>
						<input type="hidden" id="categoria_action" name="action" value="categoria"/>
						<div class="mb-3">
							<label for="categoria_nombre">Nombre</label>
							<input type="text" class="form-control" id="categoria_nombre" name="categoria_nombre" value="" required>
						</div>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
	jQuery(document).ready(function($) {
		modalcategoria = $('#modalcategoria');

		// Detectar cuando se hace clic en el botón de agregar
		$('#btn-categoria').on('click', function() {
			// Cargar los datos en el modal

			$('#categoria_id').val("");
			$('#categoria_nombre').val("");
			$('#categoria_action').val("categoria_nuevo");
			// Abrir el modal
			modalcategoria.modal('show');
		});

		// Detectar cuando se hace clic en el botón de editar
		$('.btn-editar-categoria').on('click', function() {
			// Obtener los datos del aporte desde los atributos del botón
			var categoria_id = $(this).data('id');
			var nombre = $(this).data('nombre');
			
			// Cargar los datos en el modal

			$('#categoria_id').val(categoria_id);
			$('#categoria_nombre').val(nombre);
			$('#categoria_action').val("categoria_editar");
			

			// Abrir el modal
			modalcategoria.modal('show');
		});
		// Confirmar y manejar la eliminación del categoria
		$('.btn-borrar-categoria').on('click', function() {
			var id_categoria = $(this).data('id_categoria');
			var confirmDelete = confirm("¿Estás seguro de que deseas eliminar esta categoria?");

			if (confirmDelete) {
				// Enviar la solicitud para eliminar el categoria
				$.ajax({
					url: ajaxurl, // Ajax URL provisto por WordPress
					type: 'POST',
					data: {
						action: 'borrar_categoria', // Nombre de la acción en PHP
						id_categoria: id_categoria
					},
					success: function(response) {
						if (response.success) {
							alert('categoria eliminada correctamente.');
							location.reload(); // Recargar la página para ver los cambios
						} else {
							alert('Ocurrió un error al intentar eliminar la categoria.');
						}
					}
				});
			}
		});
	});
	</script>
	<?php
}

function cc_procesar_categoria() {
	global $wpdb;

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) ) {

		if($_POST['action'] == "categoria_editar"){
			cc_actualizar_categoria();
		}

		if($_POST['action'] == "categoria_nuevo"){
			cc_agregar_categoria();
		}

		
	}
}
/** Agregar categoria */
function cc_actualizar_categoria(){
	global $wpdb;

	$categoria_id = sanitize_text_field($_POST['categoria_id']);
	$nombre = sanitize_text_field($_POST['categoria_nombre']);

	// Insertar el aporte en la base de datos asociado al cheque
	$wpdb->update(
		"{$wpdb->prefix}cheque_categorias",[
			'nombre' => $nombre
		],
		['id' => $categoria_id],
		['%s']
	);

	echo '<div class="alert alert-success">Categoría actualizada exitosamente.</div>';
}
/** Agregar categoria */
function cc_agregar_categoria(){
	global $wpdb;

	$nombre = sanitize_text_field($_POST['categoria_nombre']);

	// Insertar el aporte en la base de datos asociado al cheque
	$wpdb->insert(
		"{$wpdb->prefix}cheque_categorias",[
			'nombre' => $nombre
		],
		['%s']
	);

	echo '<div class="alert alert-success">Categoría guardada exitosamente.</div>';
}

// Manejar la solicitud de eliminación de la categoria
function borrar_categoria_callback() {
    global $wpdb;

    // Verificar que el ID del categoria esté presente en la solicitud
    if (isset($_POST['id_categoria'])) {
        $id_categoria = intval($_POST['id_categoria']);
        
        // Eliminar la categoria de la base de datos
        $table_name = $wpdb->prefix . 'cheque_categorias';
        $deleted = $wpdb->delete($table_name, array('id' => $id_categoria), array('%d'));

        if ($deleted) {
            wp_send_json_success('categoria eliminada correctamente.');
        } else {
            wp_send_json_error('Error al eliminar la categoria.');
        }
    } else {
        wp_send_json_error('ID de la categoria no proporcionado.');
    }
}
add_action('wp_ajax_borrar_categoria', 'borrar_categoria_callback');

?>
