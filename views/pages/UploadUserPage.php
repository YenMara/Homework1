<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error {
            display: none;
        }
        .border-danger {
            border-color: red;
        }
        .img-thumbnail {
            max-width: 400px;
            height: auto;
            margin-top: 10px;
            display: none; /* Initially hidden */
        }
    </style>
</head>

<body>
    <div class="container row justify-content-center">
        <div class="col-6">
            <h2>User Upload Form</h2>
            <form id="user-upload" action="/store/users" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                    <div id="username-error" class="error text-danger">Username is required</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                    <div id="email-error" class="error text-danger">Valid email is required</div>
                </div>
                
                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" onchange="onFileChange(event)">
                    <img id="img-thumbnail" class="img-thumbnail" src="" alt="Image Preview">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
    <script>
        const onFileChange = (event) => {
            const file = event.target.files[0];
            
            if (file) {
                const preview = URL.createObjectURL(file);
                const imgThumbnail = document.getElementById('img-thumbnail');
                imgThumbnail.src = preview;
                imgThumbnail.style.display = 'block'; // Show the image
            }
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>