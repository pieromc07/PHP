<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php __DIR__ ?>/public/css/bootstrap.min.css">
</head>

<body>
  <!-- tabla users -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Users</h1>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) : ?>
              <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td>
                  <a href="/users/show/<?php echo $user['id'] ?>" class="btn btn-sm btn-info">Show</a>
                  <a href="/users/edit/<?php echo $user['id'] ?>"
                  class="btn btn-sm btn-warning">Edit</a>
                  <form action="/users/destroy/<?php echo $user['id'] ?>" method="POST" style="display: inline-block;">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <a href="/users/create" class="btn btn-primary">Create</a>
      </div>
    </div>

  </div>
  <script src="<?php __DIR__ ?>/public/js/bootstrap.bundle.min.js"></script>
</body>

</html>