<?php 
session_start();

//Variaveis


//Conexão a Base de Dados
$db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

// Registo
if (isset($_POST['reg_user'])) {
  //Recebe os valores dos campos
  $idnumber = mysqli_real_escape_string($db, $_POST['idnumb']);
  $datanascimento = mysqli_real_escape_string($db, $_POST['datanas']);
  $curso = mysqli_real_escape_string($db, $_POST['curso']);
  $password = mysqli_real_escape_string($db, $_POST['psw']);
  $username = mysqli_real_escape_string($db, $_POST['uname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $cargo = mysqli_real_escape_string($db, $_POST['cargo']);

}

//Verifica se algum campo requesitado está vazio
if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($email)) { array_push($errors, "Email is required"); }
if (empty($password)) { array_push($errors, "Password is required"); }
if (empty($idnumber)) { array_push($errors, "ID Number is required"); }
if (empty($name)) { array_push($errors, "Name is required"); }
if (empty($curso)) { array_push($errors, "Curso is required"); }
if (empty($cargo)) { array_push($errors, "Cargo is required"); }

//Verifica se o numero de identificação é valido
if (is_numeric($idnumber)) {}
	else{ array_push($errors, "ID Number is not a number"); }

  // Verifica se já existe o Número de identificação(aluno)
  $user_check_query = "SELECT * FROM aluno WHERE alu_id='$idnumber' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['alu_id'] === $idnumber) {
      array_push($errors, "Número de identificação já em uso");
    }
  }

  // Verifica se já existe o Número de identificação(professor)
  $user_check_query = "SELECT * FROM professor WHERE prof_id='$idnumber' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['prof_id'] === $idnumber) {
      array_push($errors, "Número de identificação já em uso");
    }
  }

  // Verifica se já existe o Username
  $user_check_query = "SELECT * FROM login WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Nome de utilizador já em uso");
    }
  }

  // Verifica se já existe o Email(aluno)
  $user_check_query = "SELECT * FROM aluno WHERE alu_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['alu_email'] === $email) {
      array_push($errors, "Email já em uso");
    }
  }

  // Verifica se já existe o Email(professor)
  $user_check_query = "SELECT * FROM professor WHERE prof_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['prof_email'] === $email) {
      array_push($errors, "Email já em uso");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    $querycurid = "SELECT cur_id FROM curso WHERE cur_nome = '$curso'";
    $resultcurid = mysqli_query($querycurid);
    $rscurid = mysqli_fetch_array($resultcurid);
    $curid = $rscurid['cur_id'];

    $querytipouti = "SELECT 'id_tipo_utilizador' FROM 'tipo_utilizador' WHERE 'tip_uti_descricao' = '$cargo'";
    $result = mysqli_query($db, $querytipouti);
    $tipouti = mysqli_fetch_assoc($result);

  	$query = "INSERT INTO login (username, password) 
  			  VALUES('$username', '$password')";

    $queryutilizador = "INSERT INTO utilizador (id_utilizador, uti_username, uti_id_tipo_utilizador) 
    VALUES( '' , '$username','$tipouti')";

  	$queryaluno = "INSERT INTO aluno (alu_id, alu_id_utilizador, alu_nome, alu_email, alu_data_dnsc, alu_cur_id) 
          VALUES('$idnumber','$utiid','$name', '$email', '$datanascimento', '$curid')";
          
  	$queryprofessor = "INSERT INTO professor (prof_id, prof_id_utilizador,prof_nome, prof_email, prof_data_dnsc) 
  			  VALUES('$idnumber', '$utiid', '$name', '$email', '$datanascimento')";

  if ($cargo == 'Aluno') {
    mysqli_query($db, $query);
    mysqli_query($db, $queryutilizador);
    mysqli_query($db, $queryaluno);
  	header('location: index_login.php');
	mysqli_close($db);
}
else {
  mysqli_query($db, $query);
     mysqli_query($db, $queryutilizador);
    mysqli_query($db, $queryprofessor);
  	header('location: index_login.php');
	mysqli_close($db);
  }
}

?>