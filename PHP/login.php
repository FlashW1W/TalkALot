<?php 
session_start();

$username = $_POST['uname'];
$password = $_POST['psw'];
$_SESSION['myusername']=$_POST['uname'];

$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "lrm_v2";
$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password)
or die("Could not connect database");
mysql_select_db($mysql_db_database, $con)or die("Could not select database");

$query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$result = mysql_query($query)or die(mysql_error());
$num_row = mysql_num_rows($result);
$row=mysql_fetch_array($result);
if( $num_row >=1 ) { 
    header('location: ../index_menu_principal.php');

}
else{

echo 'N EXISTE';
}
?>