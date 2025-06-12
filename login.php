<?php
session_start();
 require_once __DIR__ . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    // $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role']
        ];
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | MK Hotel</title>
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>

                                <?php if (!empty($error)): ?>
                                    <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
                                <?php endif; ?>

                                <form class="user" method="POST" action="login.php">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user"
                                               placeholder="Enter Username..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                               placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>

                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="admin/js/sb-admin-2.min.js"></script>
</body>
</html>
