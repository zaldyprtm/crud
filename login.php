<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>Login</title>
    <style>
        .form{
            width: 230px;
            height:280px;
    </style>
</head>
<body>

<?php
    require('./connection.php');

    if (isset($_POST['login_button'])) {
        $_SESSION['validate']=false;
        $name=$_POST['name'];
        $password=$_POST['password'];
        $p=crud::conect()->prepare('SELECT * FROM CRUDTable WHERE name=:n and pass=:p');
        $p->bindValue(':n', $name);
        $p->bindValue(':p', $password);
        $p->execute();
        $d=$p->fetchAll(PDO::FETCH_ASSOC);
        if ($p->rowCount()>0) {
            $_SESSION['name']=$name;
            $_SESSION['pass']=$password;
            $_SESSION['validate']=true;
            header('location:www.google.com');
            echo 'Login berhasil';
        }else{
            echo 'make sure that you are registered';
        }
    }

?>


    <div class="form">
        <div class="title">
            <p>Login</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" name="login_button">  
        </form>
    </div>
</body>
</html> 