<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/login-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <div class="container">
        <div class="content">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-item nav-link " href="../index.html">Отмена</a>
                <a class="nav-item nav-link " href="auth.php">Вход</a>
                <a class="nav-item nav-link active" href="registration.php">Регистрация</a>
            </nav>
            <h1>Регистрация</h1>

            <form method="POST" action="../src/signup.php">
                <div class="form-group">
                    <label for="InputName1">Имя</label>
                    <input type="еуче" name="name" class="form-control" id="InputName1" aria-describedby="emailHelp" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="InputEmail1">Email адрес</label>
                    <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="InputPassword1">Пароль</label>
                    <input type="password" name="pass" class="form-control" id="InputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="InputPassword2">Повтор пароля</label>
                    <input type="password" name="wpass" class="form-control" id="InputPassword2" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Регистрация</button>
            </form>
            
            <?php
                ini_set('display_errors', 0);
                ini_set('display_startup_errors', 0);
                error_reporting(E_ALL);
                session_start();
                if ($_SESSION['message']) {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>