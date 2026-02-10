<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card { border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        .btn-primary { background: #2c5364; border: none; }
        .btn-primary:hover { background: #203a43; }
    </style>
</head>
<body>
    <div class="card p-4 bg-white" style="width: 350px;">
        <h3 class="text-center mb-4 fw-bold text-dark">Booking Login</h3>
        <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="post">
            <div class="mb-3">
                <input type="text" name="username" class="form-control p-3" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control p-3" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Sign In</button>
        </form>
    </div>
</body>
</html>