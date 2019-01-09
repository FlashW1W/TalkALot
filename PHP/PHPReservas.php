<?php 
session_start();

//Variaveis


$db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

// Registo
if (isset($_POST['reg_user'])) {
  //Recebe os valores dos campos
  $reservsala = mysqli_real_escape_string($db,$_POST['salas']);
  
  $reservhora = $_GET['appt'];
  $reservduracao = $_POST['duracao'];
}   

//armazenamento de variaveis usando session
mysql_connect('localhost', 'root', '');
mysql_select_db('lrm_v2');

$queryutiid  = "SELECT id_utilizador from utilizador where uti_username='" . $_SESSION['myusername'] . "'";
$resultutiid = mysql_query($queryutiid);
$rsutiid     = mysql_fetch_array($resultutiid);
$utiid       = $rsutiid['id_utilizador'];

//transformando o valor tempo para mysql
$timestamp2 = strtotime('$reservhora');

$time2 = date('g:i', $timestamp2);

$timestamp = strtotime('$reservduracao');

$time = date('H:i', $timestamp);



//transformando o valor data para mysql
$edate=strtotime($_POST['edate']); 

$edate=date("Y-m-d",$edate);

//Insere os valores dentro da base de dados

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lrm_v2";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO reserva (id_reserva, reserv_data, reserv_hora_inicio,reserv_hora_fim, reserv_duracao, reserv_sala, reserv_id_utilizador, reserv_id_grupo) VALUES 
                            (NULL,'$edate', '$time2','$time', '$reservduracao', '$reservsala', '$utiid', NULL)";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Consegusite!')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
