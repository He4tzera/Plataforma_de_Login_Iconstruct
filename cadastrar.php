<?php

$email = $_POST['email'];
$senha = sha1($_POST['senha']);
$tipo_conta = $_POST['tipo-conta'];
$nome = $_POST['nome'];


$connect = mysqli_connect('localhost','root','');
$db = mysqli_select_db($connect,'login');

$query_select = "SELECT email FROM usuario WHERE email = '$email'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['email'];

  if($email == "" || $senha == ""){
    echo"<script language='javascript' type='text/javascript'>
          alert('O campo login deve ser preenchido');window.location.
          href='./cadastro.html'</script>";

    }else{
      if($logarray === $email){
    echo"<script language='javascript' type='text/javascript'>
          alert('Esse login já existe');window.location.
          href='./cadastro.html'</script>";
        die();

      }else{
        $query = "INSERT INTO usuario (email, senha, tipoconta ,nome) VALUES ('{$email}','{$senha}','{$tipo_conta}','{$nome}')";
        $insert = mysqli_query($connect,$query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='./index.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='index.php'</script>";
        }
      }
    }
?>