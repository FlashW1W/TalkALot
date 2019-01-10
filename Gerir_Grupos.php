<?php
session_start();

  function groupMembers(){
    $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');
    $username = $_SESSION['myusername'];

    $groupname = $_GET['groupname'];

    $groupidquery = "SELECT id_grupo FROM grupo WHERE grup_nome = '$groupname'";
    $resgroupid = mysqli_query($db, $groupidquery);
    $rowgroupid = mysqli_fetch_array($resgroupid);
    $groupid = $rowgroupid['id_grupo'];

    $memberquery = "SELECT uti_username FROM utilizador WHERE id_utilizador IN (SELECT gru_uti_id_utilizador FROM grupo_utilizador WHERE gru_uti_id_grupo = '$groupid')";
    $resmember = mysqli_query($db, $memberquery);
    while ($row = mysqli_fetch_array($resmember)) {
        echo "<Button ondblclick='showButton(" . $row['uti_username'] .")' style='border-radius:13px' value='" . $row['uti_username'] ."'>" . $row['uti_username'] ."</Button>";
        echo "<b id='". $row['uti_username'] ."' style='font-size:19px; display:none'>Pretende remover " . $row['uti_username'] ."?</b>
        <Button id='". $row['uti_username'] ."' style='border-radius:13px; display:none'>Sim</Button><Button id='". $row['uti_username'] ."' style='border-radius:13px; display:none'>Não</Button>";
    }
}

  function echoGroup(){
    $groupname = $_GET['groupname'];
    echo $groupname;
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
      <script type="text/javascript">
        function showButton(name) {
          document.getElementById("demo").innerHTML = name;
            var x = document.getElementById('1');
            if (x.style.display === 'none') {
                x.style.display = 'block';
            } else {
                x.style.display = 'none';
            }
        } 
      </script>
   </head>
   <body bgcolor = "#FFFFFF">



<p id="demo">1</p>

   <div class="bg">
   <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">
   <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="perfil.php">Perfil</a>
        <a href="register.php'">Registo</a>
        <a href="CriarGrupos.php">Criar Grupos</a>
        <a href="Gerir_Grupos.php'">Gerir Grupos</a>
        <a href="reservas.php">Minhas Reservas</a>
        <a href="index_menu_principal.php'">Menu Principal</a>
    </div>
    <span style="font-size:40px;cursor:pointer;float:right;margin-right:10px;color:white" onclick="openNav()">&#9776; </span>
      <div align="center">
           <b style="font-size:42px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000" >Mediateca</b><br><br>
           <b  style="font-size:14px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000">Library Room Management</b><br><br>

         <div class="head animated fadeIn" style = "width:400px;background-color:white;color:black;border-radius:13px;" align = "center">
            <div style = "padding:3px;"><b style="font-size:19px">Membros de <?php echoGroup() ?></b></div>
            <div style = "margin:30px; margin-top: 0px">

              <?php groupMembers(); ?> 

            </div>
         </div>
         <div class="head animated fadeIn" style = "width:400px;background-color:white;color:black;border-radius:13px;" align = "center">
            <div style = "padding:3px;"><b style="font-size:19px">Adicionar membros</b></div>
            <div style = "margin:30px; margin-top: 0px">
              <form action="" method="post">
                <input style="border-radius: 13px" type="text" name="newMember">
                <button style="border-radius: 13px" type="submit">Pesquisar</button>
              </form>
              <?php
                if (!empty($_REQUEST['newMember'])) {
                  $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

                  $newMember = mysqli_real_escape_string($db, $_REQUEST['newMember']);     

                  $sql = "SELECT uti_username FROM utilizador WHERE uti_username LIKE '%".$newMember."%'"; 
                  $r_query = mysqli_query($db, $sql); 

                  while ($row = mysqli_fetch_array($r_query)){  
                    echo "<b><a style='font-size:20px'>" .$row['uti_username']. "</a></b>
                    <form action='' method='post'>
                      <input style='border-radius: 13px' type='hidden' name='newMember2' value=".$row['uti_username'].">
                      <button style='border-radius: 13px; width:100px' type='submit'>Adicionar</button>
                    </form>";
                  }  
                }
              ?>
              <?php
                if (!empty($_REQUEST['newMember2'])) {
                  $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

                  $newMember = mysqli_real_escape_string($db, $_REQUEST['newMember2']);
                  $groupname = $_GET['groupname'];

                  $useridquery = "SELECT id_utilizador FROM utilizador WHERE uti_username = '$newMember'";
                  $resuserid = mysqli_query($db, $useridquery);
                  $rowuserid = mysqli_fetch_array($resuserid);
                  $userid = $rowuserid['id_utilizador'];

                  $groupidquery = "SELECT id_grupo FROM grupo WHERE grup_nome = '$groupname'";
                  $resgroupid = mysqli_query($db, $groupidquery);
                  $rowgroupid = mysqli_fetch_array($resgroupid);
                  $groupid = $rowgroupid['id_grupo'];

                  $sql = "INSERT INTO grupo_utilizador (gru_uti_id_grupo, gru_uti_id_utilizador) VALUES ($groupid, $userid)"; 
                  $r_query = mysqli_query($db, $sql);
                  }  
              ?>
            </div>

         </div>         

      </div>
      </div>
   </body>
</html>