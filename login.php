<?php
session_start();

if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Username dan Password
    if($username == "admin" && $password == "admin123"){

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;

    }else{
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">

<style>
body{
    background:#F8F4EC;
}

.login-box{
    width:400px;
    margin:80px auto;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 10px 20px rgba(0,0,0,.2);
}

.login-box h2{
    text-align:center;
    color:#5C4033;
    margin-bottom:20px;
}

.login-box input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:8px;
}

.login-box button{
    width:100%;
    padding:12px;
    background:#6F4E37;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

.login-box button:hover{
    background:#5C4033;
}

.error{
    color:red;
    text-align:center;
    margin-bottom:15px;
}
</style>

</head>
<body>

<div class="login-box">

<h2>Login Admin</h2>

<?php if($error!=""){ ?>
<div class="error"><?= $error ?></div>
<?php } ?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

</div>

</body>
</html>
