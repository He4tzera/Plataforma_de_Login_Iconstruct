
<?php
session_start();

$email = $_POST['email'];
$senha = sha1($_POST['senha']);
$entrar = $_POST['entrar'];

$connect = mysqli_connect('localhost','root','');
$db = mysqli_select_db($connect,'login');
  if (isset($entrar)) {
    
    $verifica = mysqli_query($connect,"SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'") or die("erro ao selecionar");

      if(mysqli_num_rows($verifica)<=0) {

        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        echo "<script>alert('Ops, algo de errado não está certo, tente novamente.');window.location.href='./index.html';</script>";

        die();
      }else{

        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('location:./homepage.php');

      }
  }
?>