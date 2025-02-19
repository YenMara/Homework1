<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-"> User Information</h2>
            <a href="/upload/users" class="btn btn-success">Upload User</a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php foreach($users as $user): ?>
                <div class="col">
                    <div class="card" style="width:270px; height: 370px;">
                        <div class="card-img m-auto mt-2" style="width: 90%; height: 60%;">
                                <img src="/storage/avatars/<?= $user['avatar'] ?>" class="card-img-top" alt="Avatar">
                        </div>
                        <div class="card-body text-center">
                            <h3 class="text-primary">ID: <?= $user['id'] ?></h3>
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
