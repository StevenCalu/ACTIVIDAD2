<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Libro</title>
  <link rel="stylesheet" href="STYLE/EstiloRegistro.css">
</head>
<body>
  <div class="container">
    <h1>Editar Libro</h1>

    <?php
    $index = $_GET['index'] ?? null;
    $libro = null;

    if ($index !== null && isset($libros[$index])) {
        $libro = $libros[$index];
    ?>
        <form method="POST" onsubmit="return validarFormulario()">
            <input type="hidden" name="index" value="<?php echo $index; ?>">

            <label for="titulo">Título del libro:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($libro['titulo']); ?>">

            <label for="autor">Nombre del autor:</label>
            <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($libro['autor']); ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="<?php echo htmlspecialchars($libro['precio']); ?>">

            <label for="cantidad">Cantidad de ejemplares:</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($libro['cantidad']); ?>">

            <button type="submit">Actualizar</button>
        </form>
    <?php
    } else {
        echo "<p class='error-message'>Libro no encontrado o índice inválido.</p>";
    }
    ?>
  </div>
</body>
</html>
