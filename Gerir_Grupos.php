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

    echo "<button style='border-radius:13px'>".$groupname."</button>";

}
?>
<html>
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Index.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Animate.css">
   <head>
      <title>Gerir Grupos</title>

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
    padding: 0;
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

   <body bgcolor = "#FFFFFF">
   <div class="bg">
   <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">
   
 


         <div class="head animated fadeIn" style = "width:400px;background-color:white;color:black;border-radius:13px;" align = "center">
            <div style = "padding:3px;"><b style="font-size:19px">Grupos</b></div>
            
            <div style = "margin:30px; margin-top: 0px">

<?php groupName(); ?> 

            </div>

         </div>

                  <div class="head animated fadeIn" style = "width:400px;background-color:white;color:black;border-radius:13px;" align = "center">
            <div style = "padding:3px;"><b style="font-size:19px">Login</b></div>
            
            <div style = "margin:30px">

               <form action = "../TALKALOT/PHP/login.php" method = "post">
                  <label  class = "animated fadeInUp">UserName  :</label><input type = "text" name = "uname" class = "box animated fadeInUp"/><br /><br />
                  <label class = "animated fadeInUp">Password  :</label><input type = "password" name = "psw" class = "box animated fadeInUp" /><br/><br /><br />
                  <input type="Button" value = " Voltar" class="actionbutton animated fadeInLeft" style=" background-color: red;float:left;"/>
                  <input type = "submit" value = " Iniciar Sessao" class="actionbutton animated fadeInRight" style=" background-color: #4CAF50;float:right;"/><br /><br><br>
               </form>



            </div>

         </div>

      </div>
   </body>
</html>