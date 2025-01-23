<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php __DIR__ ?>/public/css/bootstrap.min.css">
</head>

<body>
  <!-- Crear usuario -->
  <div class="container">
    <h1>Crear usuario</h1>
    <form action="/users/store" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="mb-3">
        <label for="age" class="form-label">Edad</label>
        <input type="number" class="form-control" id="age" name="age">
      </div>
      <button type="submit" class="btn btn-primary">Crear usuario</button>
    </form>
    <?php if (isset($errors)) : ?>
      <div class="alert alert-danger mt-3">
        <ul>
          <?php foreach ($errors as $error) : ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>

  <script src="<?php __DIR__ ?>/public/js/bootstrap.bundle.min.js"></script>
</body>

</html>