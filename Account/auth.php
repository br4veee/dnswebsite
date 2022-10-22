<?php
require "../db.php";

$data = $_POST;
if( isset($data['do_login']))
{

  $errors = array();
  $user = R::findOne('users', 'login = ?', array($data['login']));

  if($user)
  {
      
      if(password_verify($data['password'], $user->password)){
      $_SESSION['logged_user'] = $user;
      echo '<div style="color: green; text-align: center; font-size: 35px; 
      position:absolute; width: 99%; margin-top:880px;">Вы успешно авторизованы!</div>';
  header('Refresh: 3; url=myacc.php');
  }else
  {
      $errors[] = 'Неверный пароль!';
  }
}else
{
    $errors[] = 'Такого пользователя не существует!';
}

  if(!empty($errors))
  {
    echo '<div style="color: red; text-align: center; font-size: 35px; 
    position:absolute; width: 99%; margin-top:880px;">'.array_shift($errors).'</div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Авторизация</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style2.css">
    <body background=https://look.com.ua/pic/201209/1920x1080/look.com.ua-29946.jpg>
</head>
<form class="form" action="auth.php" method="post">
    <input class="input" type="login" name="login" placeholder="Ваш логин" value="<?php echo @$data['login']; ?>">
    <input class="input" type="password" name="password" placeholder="Пароль" value="<?php echo @$data['password']; ?>">
    <button class="btn" type="submit" name="do_login">Войти</button>
    <h3 style="text-align: center;">или</h3>
    <a href="reg.php" class="btn" >Регистрация</a>
</form>