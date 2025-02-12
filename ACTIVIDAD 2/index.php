<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Libros</title>
    <link rel="stylesheet" href="STYLE/Navegacion.css">
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
}

function obtenerLibros() {
    return $_SESSION['libros'];
}

include('Menu/funciones.php');

$view = $_GET['view'] ?? 'inicio';
$alerta = '';
$titulo = $autor = $precio = $cantidad = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $precio = $_POST['precio'] ?? 0;
    $cantidad = $_POST['cantidad'] ?? 0;

    if (isset($_POST['index'])) {
        $index = $_POST['index'];
        if (isset($_SESSION['libros'][$index]) && validarCampos($titulo, $autor, $precio, $cantidad)) {
            $_SESSION['libros'][$index] = [
                'titulo' => htmlspecialchars(trim($titulo)),
                'autor' => htmlspecialchars(trim($autor)),
                'precio' => (float)$precio,
                'cantidad' => (int)$cantidad
            ];
            $alerta = "Libro actualizado correctamente.";
        } else {
            $alerta = "Error al actualizar el libro. Verifica los campos.";
        }
    } else {
        if (agregarLibro($titulo, $autor, $precio, $cantidad)) {
            $alerta = "Libro registrado exitosamente.";
            $titulo = $autor = $precio = $cantidad = '';
        } else {
            $alerta = "Error al registrar el libro. Verifica los campos.";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
    $index = $_GET['index'] ?? null;

    if ($action === 'delete' && is_numeric($index)) {
        if (eliminarLibro((int)$index)) {
            $alerta = "Libro eliminado correctamente.";
        } else {
            $alerta = "Error al eliminar el libro.";
        }
    }
}

$libros = obtenerLibros();

echo '<nav>
    <ul>
        <li><a href="?view=inicio">Inicio</a></li>
        <li><a href="?view=registro">Registrar Libro</a></li>
        <li><a href="?view=listado">Listado de Libros</a></li>
        <li><a href="?view=contacto">Contacto</a></li>
    </ul>
</nav>';

if ($alerta) {
    echo '<p>' . htmlspecialchars($alerta) . '</p>';
}

if ($view === 'inicio') {
    include('Menu/inicio.php');
} elseif ($view === 'registro') {
    include('Menu/registro.php');
} elseif ($view === 'listado') {
    include('Menu/listado.php');
} elseif ($view === 'editar') {
    include('Menu/editar.php');
} elseif ($view === 'contacto') {
    include('Menu/contacto.php');
}
?>
</body>
</html>
