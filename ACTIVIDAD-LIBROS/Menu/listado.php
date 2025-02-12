<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Libros</title>
  <link rel="stylesheet" href="STYLE/EstiloListado.css">
</head>
<body>
  <div class="container">
    <h1>Listado de Libros</h1>
    <table class="book-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Título</th>
          <th>Autor</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php renderizarTabla($libros); ?>
      </tbody>
    </table>
  </div>
</body>
</html>
