<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php __DIR__ ?>/public/css/bootstrap.min.css">
</head>

<body>
  <!-- mostar usuario -->
  <div class="container">
    <h1>Usuario</h1>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?php echo $user['name'] ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $user['age'] ?></h6>
        <a href="/users" class="card-link">Volver</a> 
      </div>
    </div>
  </div>



  <script src="<?php __DIR__ ?>/public/js/bootstrap.bundle.min.js"></script>
</body>

</html>