<?php
/*
Plugin Name: Gestión de Cheques con Estilos y Entradas
Description: Plugin para gestionar cheques con múltiples estilos y entradas.
Version: 1.1
Author: Tu nombre
*/

function mpt_cheque_custom_post_type() {
    register_post_type('cheque',
        array(
            'labels' => array(
                'name' => __('Cheques'),
                'singular_name' => __('Cheque'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'thumbnail'),
        )
    );
}
add_action('init', 'mpt_cheque_custom_post_type');

// Añadir meta box para gestionar cheques, estilos e inputs
function mpt_add_cheque_metaboxes() {
    add_meta_box('mpt_cheque_details', 'Detalles del Cheque', 'mpt_render_cheque_details', 'cheque', 'normal', 'default');
}
add_action('add_meta_boxes', 'mpt_add_cheque_metaboxes');

// Renderizar la meta box para gestionar cheque, estilos e inputs
function mpt_render_cheque_details($post) {
    ?>
    <div id="cheque-gestion">
        <h2>Gestión de Cheques, Estilos y Entradas</h2>
        <div id="cheques-container">
            <button type="button" class="button add-cheque">Añadir Cheque</button>
            <div id="cheques-list">
                <!-- Se generarán dinámicamente los cheques, estilos e inputs -->
            </div>
        </div>
        <input type="hidden" id="catsty_ocultos" name="catsty_ocultos" value='[]'>
    </div>

    <script type="text/javascript">
        var catstyData = [];

        function renderCatsty() {
            var container = document.getElementById('cheques-list');
            container.innerHTML = '';

            catstyData.forEach(function(cheque, chequeIndex) {
                var chequeDiv = document.createElement('div');
                chequeDiv.classList.add('cheque');
                chequeDiv.innerHTML = `
                    <h3>Cheque: ${cheque.name}</h3>
                    <button type="button" class="button add-style" data-chequeindex="${chequeIndex}">Añadir Estilo</button>
                    <div class="styles-list"></div>
                `;
                container.appendChild(chequeDiv);

                var stylesContainer = chequeDiv.querySelector('.styles-list');
                cheque.styles.forEach(function(style, styleIndex) {
                    var styleDiv = document.createElement('div');
                    styleDiv.classList.add('style');
                    styleDiv.innerHTML = `
                        <h4>Estilo: ${style.name}</h4>
                        <p>Imagen: ${style.image}</p>
                        <button type="button" class="button add-input" data-chequeindex="${chequeIndex}" data-styleindex="${styleIndex}">Añadir Input</button>
                        <div class="inputs-list"></div>
                    `;
                    stylesContainer.appendChild(styleDiv);

                    var inputsContainer = styleDiv.querySelector('.inputs-list');
                    style.inputs.forEach(function(input, inputIndex) {
                        var inputDiv = document.createElement('div');
                        inputDiv.innerHTML = `<p>Input: ${input.name} (${input.x}, ${input.y})</p>`;
                        inputsContainer.appendChild(inputDiv);
                    });
                });
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            renderCatsty();

            // Añadir cheque
            document.querySelector('.add-cheque').addEventListener('click', function() {
                catstyData.push({name: 'Nuevo Cheque', styles: []});
                renderCatsty();
            });

            // Añadir estilo a un cheque
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('add-style')) {
                    var chequeIndex = e.target.getAttribute('data-chequeindex');
                    catstyData[chequeIndex].styles.push({name: 'Nuevo Estilo', image: '', inputs: []});
                    renderCatsty();
                }
            });

            // Añadir input a un estilo
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('add-input')) {
                    var chequeIndex = e.target.getAttribute('data-chequeindex');
                    var styleIndex = e.target.getAttribute('data-styleindex');
                    catstyData[chequeIndex].styles[styleIndex].inputs.push({name: 'Nuevo Input', x: 0, y: 0});
                    renderCatsty();
                }
            });
        });
    </script>
    <?php
}
?>
