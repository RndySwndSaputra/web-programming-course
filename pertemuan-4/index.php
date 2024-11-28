<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Login</h1>
    <form action="./backend/login.php" method="POST">
        <input type="email" name="email" id="email" placeholder="Email"/>
        <input type="password" name="password" id="password" placeholder="password"/>
        <button type="submit">login</button>
    </form>
</body>
</html>
<!-- <?php
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "Email: " . $email . "<br>";
    echo "Password: " . $password . "<br>";
}
?> -->