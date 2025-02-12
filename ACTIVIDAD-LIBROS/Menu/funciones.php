<?php
function agregarLibro($titulo, $autor, $precio, $cantidad) {
    if (validarCampos($titulo, $autor, $precio, $cantidad)) {
        $_SESSION['libros'][] = [
            'titulo' => htmlspecialchars(trim($titulo)),
            'autor' => htmlspecialchars(trim($autor)),
            'precio' => (float)$precio,
            'cantidad' => (int)$cantidad
        ];
        return true;
    }
    return false;
}

function validarCampos($titulo, $autor, $precio, $cantidad) {
    return !empty(trim($titulo)) && !empty(trim($autor)) && $precio > 0 && $cantidad > 0;
}

function eliminarLibro($index) {
    if (isset($_SESSION['libros'][$index])) {
        array_splice($_SESSION['libros'], $index, 1);
        return true;
    }
    return false;
}

function renderizarTabla($libros) {
    if (empty($libros)) {
        echo "<tr><td colspan='6'>No existen libros registrados</td></tr>";
    } else {
        foreach ($libros as $index => $libro) {
            echo "
                <tr>
                    <td>" . ($index + 1) . "</td>
                    <td>" . $libro['titulo'] . "</td>
                    <td>" . $libro['autor'] . "</td>
                    <td>" . $libro['precio'] . "</td>
                    <td>" . $libro['cantidad'] . "</td>
                    <td>
                        <a href='?view=editar&index=$index'>Editar</a> |
                        <a href='?view=listado&action=delete&index=$index' onclick='return confirm(\"\u00bfEst\u00e1s seguro de eliminar este libro?\");'>Eliminar</a>
                    </td>
                </tr>
            ";
        }
    }
}
?>
<script>
        function validarFormulario() {
            const nombre = document.getElementById('titulo').value.trim();
            const precio = parseFloat(document.getElementById('precio').value);
            const cantidad = parseInt(document.getElementById('cantidad').value);

            if (nombre === '') {
                alert('El título no puede estar vacío.');
                return false;
            }

            if (isNaN(precio) || precio <= 0) {
                alert('El precio debe ser un número mayor a 0.');
                return false;
            }

            if (isNaN(cantidad) || cantidad <= 0) {
                alert('La cantidad debe ser un número mayor a 0.');
                return false;
            }

            return true; 
        }

        <?php if (!empty($alerta)) : ?>
            alert('<?php echo $alerta; ?>');
        <?php endif; ?>
    </script>