<?php

function obtener_cheques_js() {
    global $wpdb;

    $all_cheques = [];

    // Consulta para obtener los cheques desde la base de datos
    $categorias = $wpdb->get_results(
        "SELECT 
            id,
            nombre name
        FROM 
            {$wpdb->prefix}cheque_categorias as cat
        ");

    foreach ($categorias as $key => $categoria) {
        $cheques = $wpdb->get_results(
            "SELECT 
                id,
                nombre name,
                descripcion,
                imagen image
            FROM 
                {$wpdb->prefix}cheques as cke
            WHERE
                cke.categoria_id = $categoria->id
            ");
        if(!empty($cheques) ){

            $all_cheques[$categoria->id] = $categoria;
            
            foreach ($cheques as $key => $cheque) {
                $inputs = $wpdb->get_results(
                    "SELECT 
                        input.nombre name,
                        input.tipo type,
                        input.font,
                        input.textAlign,
                        input.textBaseline,
                        input.fillStyle,
                        input.toText,
                        input.x,
                        input.y
                    FROM 
                        {$wpdb->prefix}cheque_inputs as input
                    WHERE
                        input.cheque_id = $cheque->id
                    ");

                if (!empty($inputs)) {
                    $all_cheques[$categoria->id]->styles[$cheque->id] = $cheque;
                    $all_cheques[$categoria->id]->styles[$cheque->id]->inputs = $inputs;
                }
            }

        }
    }

    $cheques = $wpdb->get_results(
        "SELECT 
            cke.id as id_cheque, 
            cke.nombre nombre_cheque , 
            cke.descripcion descripcion_cheque,
            cat.nombre nombre_categoria
        FROM 
            {$wpdb->prefix}cheques as cke
        LEFT JOIN 
            {$wpdb->prefix}cheque_categorias as cat
        ON
            cke.categoria_id = cat.id
        ");

    // Convertir los resultados a formato JSON
    $cheques_json = json_encode($cheques);
    $categorias_json = json_encode($categorias);
    $all_cheques_json = json_encode($all_cheques);

    // Devolver el código JavaScript que asigna los cheques a una variable
    return "<script>
                var cheques = $cheques_json;
                var categorias = $categorias_json;
                var all_cheques = $all_cheques_json;
            </script>";
}

// Registrar el shortcode
add_shortcode('cheques_js', 'obtener_cheques_js');
