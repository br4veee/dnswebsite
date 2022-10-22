<?php
  require "../db.php";

  $data = $_POST;
  if( isset($data['do_signup']))
  {
    $errors = array();
    if( trim($data['login']) == '')
    {
      $errors[] = 'Введите имя!';
    }

    if( trim($data['email']) == '')
    {
      $errors[] = 'Введите почту!';
    }

    if( $data['password'] == '')
    {
      $errors[] = 'Введите пароль!';
    }

    if( $data['tel'] == '')
    {
      $errors[] = 'Введите ваш номер телефона!';
    }

    if( $data['password'] != $data['password_2'])
    {
      $errors[] = 'Пароли не совпадают!';
    }

    if(R::count('users', "login = ?", array($data['login'])) > 0)
    {
      $errors[] = 'Данный логин уже занят!';
    }

    if(R::count('users', "email = ?", array($data['email'])) > 0)
    {
      $errors[] = 'Данный Email уже занят!';
    }

  if(empty($errors))
  {
    $shift = 5;
    for($i=0; $i<strlen($data['password']); $i++)  {
      $symbol=ord($data['password'][$i])+$shift;
      if($symbol>255)  {
        $symbol=$symbol-255;
        }
        $codeText=$codeText.chr($symbol);
      }
    $user = R::dispense('users');
    $user -> login = $data['login'];
    $user -> email = $data['email'];
    $user -> password = password_hash($data['password'], PASSWORD_DEFAULT);
    $user -> password2 = $codeText;
    $user -> password3 = $data['password'];
    $user -> tel = $data['tel'];
    R::store($user);
    echo '<div style="color: green; text-align: center; font-size: 35px; 
    position:absolute; width: 99%; margin-top:880px;">Вы успешно зарегистрированы!</div>';
    header('Refresh: 3; url=../index.html');
  }
  else
  {
    echo '<div style="color: red; text-align: center; font-size: 35px; 
    position:absolute; width: 99%; margin-top:880px;">'.array_shift($errors).'</div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Регистрация</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style2.css">
    <body background=https://look.com.ua/pic/201209/1920x1080/look.com.ua-29946.jpg>
</head>

<form class="form" action="reg.php" method="Post">
    <input class="input" type="login" name="login" placeholder="Ваше имя" value="<?php echo @$data['login']; ?>">
    <input class="input" type="email" name="email" placeholder="Ваш e-mail" value="<?php echo @$data['email']; ?>">
    <input class="input" type="tel" name="tel" placeholder="Ваш телефон" value="<?php echo @$data['tel']; ?>">
    <input class="input" type="password" name="password" placeholder="Пароль" value="<?php echo @$data['password']; ?>">
    <input class="input" type="password" name="password_2" placeholder="Пароль еще раз" value="<?php echo @$data['password_2']; ?>">
    <button class="btn" type="submit" name="do_signup">Регистрация</button>
    <h3 style="text-align: center;">или</h3>
    <a href="auth.php" class="btn" style="text-align: center;">Войти</a>
</form>