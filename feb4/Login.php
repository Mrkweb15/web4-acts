<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../res/jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <form action="LoginFunction.php" method="POST">
                <div class="card-header bg-info">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" require>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" require>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-primary">
                    <div class="con">
                        <a href="Register.php">Register</a>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</body>
</html>