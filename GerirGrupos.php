<?php
session_start();

  function groupName(){
    $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

    $username = $_SESSION['myusername'];

    $useridquery = "SELECT id_utilizador FROM utilizador WHERE uti_username = '$username'";
    $resuserid = mysqli_query($db, $useridquery);
    $rowuserid = mysqli_fetch_array($resuserid);
    $userid = $rowuserid['id_utilizador'];

    $groupidquery = "SELECT gru_uti_id_grupo FROM grupo_utilizador WHERE gru_uti_id_utilizador = '$userid'";
    $resgroupid = mysqli_query($db, $groupidquery);
    $rowgroupid = mysqli_fetch_array($resgroupid);
    $groupid = $rowgroupid['gru_uti_id_grupo'];

    $groupnamequery = "SELECT grup_nome FROM grupo WHERE id_grupo = '$groupid'";
    $resgroupname = mysqli_query($db, $groupnamequery);
    $rowgroupname = mysqli_fetch_array($resgroupname);
    $groupname = $rowgroupname['grup_nome'];

    $groupidquery = "SELECT grup_nome FROM grupo WHERE id_grupo IN (SELECT gru_uti_id_grupo FROM grupo_utilizador WHERE gru_uti_id_utilizador = '$userid')";
    $resgroupid = mysqli_query($db, $groupidquery);
    while ($row = mysqli_fetch_array($resgroupid)) {
        $groupname =$row['grup_nome'];
        echo "<a href=Gerir_Grupos.php?groupname=$groupname>$groupname</a><br><br>";
    }
}
?>
<?php
if(empty($_SESSION))
{
  header("Location: /index_login.php");
}
?>
<html>
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Index.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Animate.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/SideMenu.css">
<script src="../TalkALot/JS/SideMenu.js"></script>
   <head>
      <title>Gerir Grupos</title>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
      </style>
   </head>
   <body bgcolor = "#FFFFFF">
  

   <div class="bg">
   <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">
   <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="perfil.php">Perfil</a>
 
        <a href="CriarGrupos.php">Criar Grupos</a>
       
        <a href="reservas.php">Minhas Reservas</a>
        <a href="index_menu_principal.php">Menu Principal</a>
    </div>
    <span style="font-size:40px;cursor:pointer;float:right;margin-right:10px;color:white" onclick="openNav()">&#9776; </span>
      <div align="center">
           <b style="font-size:42px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000" >Mediateca</b><br><br>
           <b  style="font-size:14px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000">Library Room Management</b><br><br>
       
         <div class="head animated fadeIn" style = "width:400px;background-color:white;color:black;border-radius:13px;" align = "center">
            <div style = "padding:3px;"><b style="font-size:19px">Grupos</b></div>
            
            <div style = "margin:30px; margin-top: 0px">

              <?php groupName(); ?> 

            </div>

         </div>

      </div>
      </div>
   </body>
</html>