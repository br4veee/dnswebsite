<!DOCTYPE html>
<html lang="en">
<head>
  <title>Личный кабинет</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style2.css">
    <body background=https://look.com.ua/pic/201209/1920x1080/look.com.ua-29946.jpg>
</head>

<?php
 require "../db.php";
if( isset($_SESSION['logged_user']) ):
?><br>
<br>
<form class="form">
<br>
<h2 style="text-align:center;">Вы успешно авторизованы! <br>Привет, <?php echo $_SESSION['logged_user']->login; ?>!</h2>

<br>
<a  href="logout.php" class="btn">Log out</a>
<br>
</form>
<?php else : ?>
<form class="form" action="" method="post">
  <h2 style="text-align:center;">Вы не авторизованы!</h2 >
  <a href="auth.php" class="btn">Войти</a>
  <h3 style="text-align: center;">или</h3>
  <a href="reg.php" class="btn">Зарегистрироваться</a>
</form>
<?php endif; ?>