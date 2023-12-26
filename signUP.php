<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>Daftar</title>
</head>
<body>
    <?php
        require('./connection.php');
        if(isset($_POST['signUP_button'])) {
            $name=$_POST['name'];
            $lastname=$_POST['lastname'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confirPasword=$_POST['confirPasword'];
            if (!empty($_POST['name']&& !empty($_POST['lastname'])&& !empty($_POST['email'])&& !empty($_POST['password']))) {
                if ($password== $confirPasword) {
                    $p=crud::conect()->prepare('INSERT INTO CRUDTable(name,lastname,email,pass) VALUES(:n,:l,:e,:p)');
                    $p->bindValue(':n',$name);
                    $p->bindValue(':l',$lastname);
                    $p->bindValue(':e',$email);
                    $p->bindValue(':p',$password);
                    $p->execute();
                    echo 'berhasil';
                }else{
                    echo 'password tidak cocok';
                }
            }
        }
            
    
    ?>
    <div class="form">
        <div class="title">
            <p>Sign Up</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="lastname" placeholder="Last name">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirPasword" placeholder="Confirm password">
            <input type="submit" value="Sign Up" name="signUP_button">  
        </form>
    </div>
</body>
</html> 