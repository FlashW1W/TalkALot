<?php
session_start();
?>

<html>
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Index.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Animate.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <head>
      <title>Login Page</title>
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
         .dropdown{

width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
box-sizing: border-box;
}
.form-control{
   width: 50%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
box-sizing: border-box;
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
  #left {
  float: left;
  width: 80%;
  overflow: hidden;
  height: 300px;
  background-color: white;
}

#right {
  overflow: hidden;
  height: 300px;
  background-color: white;
}
      </style>

   <?php
mysql_connect('localhost', 'root', '');
mysql_select_db('lrm_v2');

$queryutiid  = "SELECT id_utilizador from utilizador where uti_username='" . $_SESSION['myusername'] . "'";
$resultutiid = mysql_query($queryutiid);
$rsutiid     = mysql_fetch_array($resultutiid);
$utiid       = $rsutiid['id_utilizador'];

$queryutigrupo  = "SELECT gru_uti_id_grupo from grupo_utilizador where gru_uti_id_utilizador='$utiid'";
$resultutigrupo = mysql_query($queryutigrupo);
$rsutiidgrupo   = mysql_fetch_array($resultutigrupo);
$utiidgrupo     = $rsutiidgrupo['gru_uti_id_grupo'];

$datepicker = $_POST["dayy"];

?>
 <script>
               $( function() {
                 $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
               } ); 
               $( function() {
                 $( "#datepicker0" ).datepicker({ dateFormat: 'yy-mm-dd' });
               } );
            </script>


   </head>

   <body bgcolor = "#FFFFFF">
   <div class="bg">
   <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">
   
   <ul style="position:fixed;top: 0;right:0;">
  <li><a class="active" href="../TalkALot/index_login.php">LOGIN</a></li>
  <li><a href="#news">REGISTER</a></li>
  </ul>
 

      <div align="center">
           <b style="font-size:42px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000" >Mediateca</b><br><br>
           <b  style="font-size:14px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000">Library Room Management</b><br><br>

           <div id="wrapper">
  <div id="left">
  <form action="teste_v2.php" method="POST">
  <table border="0">
                <tr>
                    <td class="td2">Pesquisar reservas:</td>
            </tr>
                    <tr>
                    <td><p class="centerfields">Dia: <input type="text" id="datepicker" name="dayy" autocomplete="off" required></p></td>
                    <td><button type="submit" value="Submit" class="centerfields">Submit</button></td>
                    </tr>
                    </form>
            <tr>
            <form action="PHP\PHPReservas.php" method="POST">
                <td class="td2">Inserir Reservas</td>
            </tr>
            <tr>
            <td><p class="centerfields">Dia:<br><input type = "text" id="datepicker0" required name="edate" placeholder="" value="" autocomplete="off"  style="width:206px;height:41px;font-size:18px;border:1px solid #ccc;" /></td>
               <td>
               <p class="centerfields " >Sala:<bR>
               <select name="salas" class="dropdown"required>
        <option value="">Selecione uma Sala...</option>
        <option value="1">Sala 1</option>
        <option value="2">Sala 2</option>
        <option value="3">Sala 3</option>
            </select>
            </td>
            <td>
<?php
  
$db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

$sql    = "SELECT grup_nome from grupo where id_grupo='$utiidgrupo'";
$result = mysqli_query($db, $sql);
;

echo "<p class='centerfields'>Grupo:<br><select name='grupo' class='dropdown' required>";
echo "<option value=''>Selecione um Grupo...</option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['grup_nome'] . "'>" . $row['grup_nome'] . "</option>";
}
echo "</select>";



?> 
            </td>
            <tr>
               <td>
</td>
            <td>
            <tr>
            <td>
            <p class="centerfields ">Hora<br><input type="time" class="form-control" value="<?php $date = date("H:i", strtotime($row['time_d'])); echo "$date"; ?>" id="until_t" name="until_t" />

</td>
               <td>
               <p class="centerfields ">duracao:<br><select class="cd dropdown" name="duracao" required>
        <option value="" enable="off" hiden="true">Selecione a duracao...</option>
        <option value="3000">30 min</option>
        <option value="6000">60 min</option>
        <option value="13000">130 min</option>
        <option value="20000">200 min</option>

            </select>
</td>

</tr>


</tr>
            </tr>





            </table>
  
  
  
  
  </div>    
  <div id="right">
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

$sql    = "SELECT   reserv_hora_inicio,reserv_sala FROM reserva where reserv_data= '$datepicker'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    echo "<table class='mysqltable'>";
    echo "<tr>";
    echo '<td align="center">Hora</td>';
    echo '<td align="center">Sala</td>';
    echo "</tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        
        echo "<tr>";
        echo '<td align="center"> ' . $row["reserv_hora_inicio"] . '</td>';
        echo '<td align="center"> ' . $row["reserv_sala"] . '</td>';
        echo "</tr>";
        
        
    }
    echo "</table>";
} else {
    echo "0 results";
    echo "<br>";
    echo "$utiid";
    echo "<br>";
    echo $utiidgrupo;
    echo "<br>";
    echo $resultgrupo;
    
}



?> 
  </div>
</div>
         

      </div>
      </div>
   </body>
</html>