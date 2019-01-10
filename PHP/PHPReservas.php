<?php
session_start();

$dia="";
$sala="";
$grupo="";
$time_input="";
$duracao=""; 


$dia=$_POST["edate"];
$sala=$_POST["salas"];
$grupo=$_POST["grupo"];



//converting time to mysql time
$time_input = $_POST['until_t'];
$strtotime = strtotime($time_input);
$mysql_time = date('H:i:s',$strtotime);

//converting duration to time
$time_input2 = $_POST['duracao'];
$strtotime2 = strtotime($time_input2);
$time = date('H:i:s',$strtotime2);

//add start time to duration
$time2 = strtotime($mysql_time) + strtotime($time) - strtotime('00:00:00');
$time2 = date('H:i:s', $time2);


//Sql to save some parameters

mysql_connect('localhost', 'root', '');
mysql_select_db('lrm_v2');

$queryutiid  = "SELECT id_utilizador from utilizador where uti_username='" . $_SESSION['myusername'] . "'";
$resultutiid = mysql_query($queryutiid);
$rsutiid     = mysql_fetch_array($resultutiid);
$utiid       = $rsutiid['id_utilizador'];


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
                            (NULL,'$dia', '$mysql_time','$time2', '$time', '$sala', '$utiid', '0')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//insert on reeserva_grupo

mysql_connect('localhost', 'root', '');
mysql_select_db('lrm_v2');

$queryreserv  = "SELECT max(id_reserva) from reserva";
$resultreserv  = mysql_query($queryreserv);
$rsreserv     = mysql_fetch_array($resultreserv);
$reserv        = $rsreserv['max(id_reserva)'];

$querygrupo2  = "SELECT id_grupo from grupo where grup_nome='$grupo'";
$resultgrupo2 = mysql_query($querygrupo2);
$rsgrupo2     = mysql_fetch_array($resultgrupo2);
$grupo2       = $rsgrupo2['id_grupo'];


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO reserva_grupo (reserv_gru_id_reserva, reserv_gru_id_grupo) VALUES 
                            ('$reserv','$grupo2')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>


