<!DOCTYPE html>
<?php
session_start();
mysql_connect('localhost', 'root', '');
    mysql_select_db('lrm_v2');

    $queryutiid = "SELECT id_utilizador from utilizador where uti_username='".$_SESSION['myusername']."'";
    $resultutiid = mysql_query($queryutiid);
    $rsutiid = mysql_fetch_array($resultutiid); 
    $utiid = $rsutiid['id_utilizador']; 

    $queryutigrupo = "SELECT gru_uti_id_grupo from grupo_utilizador where gru_uti_id_utilizador='$utiid'";
    $resultutigrupo = mysql_query($queryutigrupo);
    $rsutiidgrupo = mysql_fetch_array($resultutigrupo); 
    $utiidgrupo = $rsutiidgrupo['gru_uti_id_grupo'];

?>

<html>
   <body>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <style>
         .container {
         width: 90%;
         height: 200px;
         background: white;
         margin: auto;
         border: 1px solid black;
         padding: 10px;
         }
         .one {
         width: 80%;
         height: 300px;
         background: red;
         float: left;
         }
         .two {
         margin-left: 15%;
         height: 300px;
         }
         table,td{
         width:20%;
         align:center;
         font-size:17px;
         border: 1px solid black;
         border-collapse: collapse;
         }
      </style>
      <section class="container">
         <div class="one">
            
            
            <script>
               $( function() {
                 $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
               } ); 
               $( function() {
                 $( "#datepicker0" ).datepicker({ dateFormat: 'yy-mm-dd' });
               } );
            </script>

            <?php
               error_reporting(0);
               ini_set('display_errors', 0);
               
                  $datepicker = $_POST["dayy"];
               
               ?>

            <form action="teste.php" method="POST">

            <table>
                <tr>
                    <td >Pesquisar reservas:</td>
            </tr>
                    <tr>
                    <td><p>Dia: <input type="text" id="datepicker" name="dayy" autocomplete="off"></p></td>
                    <td><button type="submit" value="Submit">Submit</button></td>
            </tr>
            <tr>
                <td>Inserir Reservas</td>
            </tr>
               <td><p>Dia: <input type="text" id="datepicker0" name="reserv_dayy" autocomplete="off"></td>
               <td>
                   <select class="cd">
        <option value="----" enable="off" hiden="true"></option>
        <option value="1">Sala1</option>
        <option value="2">Sala2</option>
        <option value="3">Sala3</option>
            </select>
</td>
            </tr>
            <tr>
<td>
<?php 
$db = mysqli_connect('localhost', 'root', '', 'lrm_v2');
    
$sqlgrupo = "SELECT grup_nome from grupo where id_grupo='$utiidgrupo'";
$resultgrupo = mysqli_query($db, $sql);

echo "<select name='grupo'>";
echo "<option></option>";
while ($rowgrupo2 = mysqli_fetch_array($resultgrupo)) {

echo "<option value='" . $rowgrupo2['grup_nome'] ."'>" . $rowgrupo2['grup_nome'] ."</option>";

}
echo "</select>";
?>
            </td>
            </tr>

            </table>
               
              
            </form>
         </div>
         <div class="two" align="center">
            <?php
               $servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "lrm_v2";
               
               //new conection to cactch day variable
               
               $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');
               
               //declare variables
               
               
               // Create connection
               $conn = new mysqli($servername, $username, $password, $dbname);
               // Check connection
               if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
               } 
               
               $sql = "SELECT   reserv_hora_inicio,reserv_sala FROM reserva where reserv_data= '$datepicker'";
               $result = $conn->query($sql);
               
               
               if ($result->num_rows > 0) {
                   
                   echo "<table>";
                       echo "<tr>";
                       echo '<td align="center">Hora</td>';
                       echo '<td align="center">Sala</td>';
                       echo "</tr>";
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
                       
                       echo "<tr>";
                       echo '<td align="center"> '. $row["reserv_hora_inicio"].'</td>';
                       echo '<td align="center"> '. $row["reserv_sala"].'</td>';
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
                    echo $sqlgrupo;
               }
               
               
               
               ?>
         </div>
      </section>
   </body>
</html>
