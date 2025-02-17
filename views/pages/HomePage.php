<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>User Table</h2>
            <a href="/upload/users" class="btn btn-primary">Upload User</a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach($users as $user): ?>
                <div class="col">
                    <div class="card">
                        <img src="avatar.jpg" class="card-img-top" alt="Avatar">
                        <div class="card-body">
                            <h3>ID: <?= $user['id'] ?></h3>
                            <h5 class="card-title">Username: <?= $user['username'] ?></h5>
                            <p class="card-text">Email: <?= $user['email'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>