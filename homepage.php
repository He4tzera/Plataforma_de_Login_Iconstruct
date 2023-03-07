<?php

session_start();

if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
  echo "<script>alert('Faça login para acessar o conteúdo.');window.location.href='./index.html';</script>";
  }


  $connect = mysqli_connect('localhost','root','');
  $db = mysqli_select_db($connect,'login');

$logado = $_SESSION['email'];

$result = mysqli_query($connect,"SELECT nome FROM usuario WHERE email = '$logado'");
$usuario = mysqli_fetch_array($result);
$nome = $usuario['nome'];
// echo "Seja bem Vindo, $nome";
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Imagens/logoi.png">
    <link href="css/homepage.css" rel="stylesheet">
    <title>HomePage</title>
</head>
<body>
    <div id="content">
      <label id="text-user"> Seja bem vindo, <?php echo $nome?>.</label>
    <img src="./Imagens/construcao.png" alt="imgcnstr  ">
    <a href="logout.php"><button id=btn_logout>Sair</button></a>
    <p class="mt-5 mb-3 text-muted">&copy; Iconstruct2022</p>
    </div>
  </body>
</html>