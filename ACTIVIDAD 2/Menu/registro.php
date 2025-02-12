<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Libro</title>
  <link rel="stylesheet" href="STYLE/EstiloRegistro.css">
</head>
<body>
  <div class="container">
    <h1>Registrar Libro</h1>

    <?php if (isset($mensaje_exito) && !empty($mensaje_exito)): ?>
      <div class="success-message">
        📚 <?php echo htmlspecialchars($mensaje_exito); ?>
      </div>
    <?php endif; ?>

    <form method="POST" onsubmit="return validarFormulario()">
      <label for="titulo">Título del libro:</label>
      <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>">
      <label for="autor">Nombre del autor:</label>
      <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($autor); ?>">
      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" value="<?php echo htmlspecialchars($precio); ?>">
      <label for="cantidad">Cantidad de ejemplares:</label>
      <input type="number" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($cantidad); ?>">

      <button type="submit">Registrar</button>
    </form>
  </div>
</body>
</html>
