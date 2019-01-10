<?php
session_start();
?>

<html>
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Index.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Animate.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/SideMenu.css">
<script src="../TalkALot/JS/SideMenu.js"></script>
   <head>
      <title>Grupos</title>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
         .actionbutton {
   border: none;
  color: white;
  padding: 8px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0k;
    overflow: hidden;

  }
  
  li {
    float: right;
    font-family: Arial, Helvetica, sans-serif;
    font-size:16pt;
  }
  
  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
      </style>

   </head>
      <?php
      $today = date("Y.m.d");                         // 03.10.01
      ?>
         <body bgcolor = "#FFFFFF">
        

   <div class="bg">
   <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">
   <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="perfil.php">Perfil</a>
      
   
        <a href="Gerir_Grupos.php">Gerir Grupos</a>
        <a href="reservas.php">Minhas Reservas</a>
        <a href="index_menu_principal.php">Menu Principal</a>
    </div>
    <span style="font-size:40px;cursor:pointer;float:right;margin-right:10px;color:white" onclick="openNav()">&#9776; </span>
   <ul style="position:fixed;top: 0;right:0;">
  <li><a class="active" href="../TalkALot/index_login.php">LOGIN</a></li>
  <li><a href="#news">REGISTER</a></li>
  </ul>
 

      <div align="center">
           <b style="font-size:42px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000" >Mediateca</b><br><br>
           <b  style="font-size:14px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000">Library Room Management</b><br><br>


         <div class="head animated fadeIn" style = "width:400px;background-color:white;color:black;border-radius:13px;" align = "center">
        <div style = "padding:3px;"><b style="font-size:19px">Criar Grupo</b></div>
            <div style = "margin:30px; margin-top: 0px">
              <form action="" method="post">
                <input style="border-radius: 13px" type="text" name="newMember">
                <button style="border-radius: 13px" type="submit">Adicionar</button>
              </form>
              <?php
            $errors = array();
                if (!empty($_REQUEST['newMember'])) {
                  $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

                  $newMember = mysqli_real_escape_string($db, $_REQUEST['newMember']);
                  $username = $_SESSION['myusername'];

                  //vai buscar o id do user
                  $useridquery = "SELECT id_utilizador FROM utilizador WHERE uti_username = '$username'";
                  $resuserid = mysqli_query($db, $useridquery);
                  $rowuserid = mysqli_fetch_array($resuserid);
                  $userid = $rowuserid['id_utilizador'];

                // Verifica se já existe o Número de identificação(professor)
                  $user_check_query = "SELECT grup_nome FROM grupo WHERE grup_nome='$newMember' LIMIT 1";
                  $result = mysqli_query($db, $user_check_query);
                  $user = mysqli_fetch_assoc($result);
                  
                  if ($user) { // if user exists
                    if ($user['grup_nome'] === $newMember) {
                      array_push($errors, "O nome selecionado já em uso");
                    }
                  }
                  // Finally, register user if there are no errors in the form
                    if (count($errors) == 0) {
                  $sql = "INSERT INTO grupo (grup_nome, grup_data_criacao) VALUES ('$newMember', '$today')";
                  $r_query = mysqli_query($db, $sql); 
                  
              }
              //ir buscar do id do grupo associado
                $groupidquery = "SELECT MAX(id_grupo) FROM grupo";
                $resgroupid = mysqli_query($db, $groupidquery);
                $groupid = mysqli_fetch_row($resgroupid);
                $idgroup = $groupid[0];
                
                //inserir o id do grupo + id do user na tabela
                if (count($errors) == 0) {
                  $sql = "INSERT INTO grupo_utilizador (gru_uti_id_grupo, gru_uti_id_utilizador) VALUES ('$idgroup', '$userid')";
                  $r_query = mysqli_query($db, $sql); 
                  header('location: GerirGrupos.php');
                }
              }
              ?>
              <?php include('errors.php'); ?>
            </div>
         </div>
      </div>
   </body>
</html>