<?php
session_start();


mysql_connect('localhost', 'root', '');
mysql_select_db('lrm_v2');

$queryutiid  = "SELECT id_utilizador from utilizador where uti_username='" . $_SESSION['myusername'] . "'";
$resultutiid = mysql_query($queryutiid);
$rsutiid     = mysql_fetch_array($resultutiid);
$utiid       = $rsutiid['id_utilizador'];

?>

<html>
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Index.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Animate.css">
   <head>
      <title>Minhas Reservas</title>

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
  table, td, th {  
  border: 1px solid #ddd;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}

      </style>

   </head>

   <body bgcolor = "#FFFFFF">
   <div class="bg">
   <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">
   
   

      <div align="center">
           <b style="font-size:42px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000" >Mediateca</b><br><br>
           <b  style="font-size:14px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000">Library Room Management</b><br><br>


         <div class="head animated fadeIn" style = "width:700px;background-color:white;color:black;border-radius:13px;" align = "center">
            <div style = "padding:3px;"><b style="font-size:19px">Minhas Reservas</b></div>
            
            <div style = "margin:30px;">

            <?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "lrm_v2";

//new conection to cactch day variable

$db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

//declare variables


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT reserv_data, reserv_hora_inicio,reserv_hora_fim, reserv_sala FROM reserva WHERE reserv_id_utilizador='$utiid'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    echo "<table class='mysqltable' style='border-collapse:collapse;'>";
    echo '<tr>';
    echo '<th class="tg-c3ow" rowspan="2">Dia da Reserva</th>';
    echo '<th class="tg-c3ow" colspan="2">Hora</th>';
    echo '<th class="tg-c3ow" rowspan="2">Sala</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<th class="tg-0pky">Inicio</th>';
    echo '<th class="tg-0pky">Fim</th>';
    echo '</tr>';
  // output data of each row
    while ($row = $result->fetch_assoc()) {
        
        echo "<tr>";
        echo '<td align="center"> ' . $row["reserv_data"] . '</td>';
        echo '<td align="center"> ' . $row["reserv_hora_inicio"] . '</td>';
        echo '<td align="center"> ' . $row["reserv_hora_fim"] . '</td>';
        echo '<td align="center"> ' . $row["reserv_sala"] . '</td>';
        
        echo "</tr>";
        
        
    }
    echo "</table>";
} else {
    echo "0 results"; 
}

?> 
<br><br>
            </div>
            <input type="Button" value = " Voltar" class="actionbutton animated fadeInRight" onclick="location.href='index_menu_principal.php'" style="float:right;background-color: red"/>
         </div>

      </div>
      </div>
   </body>
</html>