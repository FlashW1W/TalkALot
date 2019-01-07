<?php
session_start();

class code {

  private static $groupid = "";
  private static $groupname = "";

  public static function groupName(){
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
        echo "<Button style='border-radius:13px' id=". $row['grup_nome'] ." onclick='Members()' value='" . $row['grup_nome'] ."'>" . $row['grup_nome'] ."</Button>";
    }

    self::$groupid = $groupid;
    self::$groupname = $groupname;
}

  public static function echoName(){
    echo self::$groupname;
}

  public static function groupMembers(){
    $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

    $groupid = self::$groupid;

    $memberquery = "SELECT uti_username FROM utilizador WHERE id_utilizador IN (SELECT gru_uti_id_utilizador FROM grupo_utilizador WHERE gru_uti_id_grupo = '$groupid')";
    $resmember = mysqli_query($db, $memberquery);
    while ($row = mysqli_fetch_array($resmember)) {
        echo "<Button style='border-radius:13px' value='" . $row['uti_username'] ."'>" . $row['uti_username'] ."</Button>";
    }
}




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


      <script type="text/javascript">
        function Members() {
  document.getElementById("Members").style.visibility = "visible";
}
        
      </script>
   </head>

   <body bgcolor = "#FFFFFF">
   <div class="bg">
   <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">
   
 


         <div class="head animated fadeIn" style = "width:400px;background-color:white;color:black;border-radius:13px;" align = "center">
            <div style = "padding:3px;"><b style="font-size:19px">Grupos</b></div>
            
            <div style = "margin:30px; margin-top: 0px">

              <?php code::groupName(); ?> 

            </div>

         </div>

          <div class="head animated fadeIn" style = "width:400px;background-color:white;color:black;border-radius:13px;visibility: hidden;" align = "center" id="Members">
            <div style = "padding:3px;"><b style="font-size:19px">Membros de <?php code::echoName(); ?></b></div>
            
            <div style = "margin:30px; margin-top: 0px">

               <?php code::groupMembers(); ?> 

            </div>

         </div>

      </div>
   </body>
</html>