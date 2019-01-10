<?php
session_start();

  function groupName(){
    $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

    $username = $_SESSION['myusername'];

    $useridquery = "SELECT id_utilizador FROM utilizador WHERE uti_username = '$username'";
    $resuserid = mysqli_query($db, $useridquery);
    $rowuserid = mysqli_fetch_array($resuserid);
    $userid = $rowuserid['id_utilizador'];

 /*----------------------------------------------------------------------*/

    $alunoidquery = "SELECT alu_id FROM aluno WHERE alu_id_utilizador = '$userid'";
    $resalunoid = mysqli_query($db, $alunoidquery);
    $rowalunoid = mysqli_fetch_array($resalunoid);
    $alunoid = $rowalunoid['alu_id'];

    $namequery = "SELECT alu_nome FROM aluno WHERE alu_id = '$alunoid'";
    $resname = mysqli_query($db, $namequery);
    $rowname = mysqli_fetch_array($resname);
    $name = $rowname['alu_nome'];

    $emailquery = "SELECT alu_email FROM aluno WHERE alu_id = '$alunoid'";
    $resemail = mysqli_query($db, $emailquery);
    $rowemail = mysqli_fetch_array($resemail);
    $email = $rowemail['alu_email'];

    $datadnscquery = "SELECT alu_data_dnsc FROM aluno WHERE alu_id = '$alunoid'";
    $resdatadnsc = mysqli_query($db, $datadnscquery);
    $rowdatadnsc = mysqli_fetch_array($resdatadnsc);
    $datadnsc = $rowdatadnsc['alu_data_dnsc'];

    $idcursoquery = "SELECT alu_cur_id FROM aluno WHERE alu_id = '$alunoid'";
    $residcurso = mysqli_query($db, $idcursoquery);
    $rowidcurso = mysqli_fetch_array($residcurso);
    $idcurso = $rowidcurso['alu_cur_id'];

    $cursoquery = "SELECT cur_nome FROM curso WHERE cur_id = '$idcurso'";
    $rescurso = mysqli_query($db, $cursoquery);
    $rowcurso = mysqli_fetch_array($rescurso);
    $curso = $rowcurso['cur_nome'];

/*----------------------------------------------------------------------*/

    $professoridquery = "SELECT prof_id FROM professor WHERE prof_id_utilizador = '$userid'";
    $resprofessorid = mysqli_query($db, $professoridquery);
    $rowprofessorid = mysqli_fetch_array($resprofessorid);
    $professorid = $rowprofessorid['prof_id'];

    $professornamequery = "SELECT prof_nome FROM professor WHERE prof_id = '$professorid'";
    $resprofessorname = mysqli_query($db, $professornamequery);
    $rowprofessorname = mysqli_fetch_array($resprofessorname);
    $professorname = $rowprofessorname['alu_nome'];

    $professoremailquery = "SELECT prof_email FROM professor WHERE prof_id = '$professorid'";
    $resprofessoremail = mysqli_query($db, $professoremailquery);
    $rowprofessoremail = mysqli_fetch_array($resprofessoremail);
    $professoremail = $rowprofessoremail['prof_email'];

    $professordatadnscquery = "SELECT prof_data_dnsc FROM professor WHERE prof_id = '$professorid'";
    $resprofessordatadnsc = mysqli_query($db, $professordatadnscquery);
    $rowprofessordatadnsc = mysqli_fetch_array($resprofessordatadnsc);
    $professordatadnsc = $rowprofessordatadnsc['prof_data_dnsc'];

/*----------------------------------------------------------------------*/

    $usertypequery = "SELECT uti_id_tipo_utilizador FROM utilizador WHERE id_utilizador = '$userid'";
    $resusertype = mysqli_query($db, $usertypequery);
    $rowusertype = mysqli_fetch_array($resusertype);
    $usertype = $rowusertype['uti_id_tipo_utilizador'];

    if ($usertype == '1') {
    echo "<div align='left' style='font-size:16px;padding:0px 5px 5px 5px'>
    	<p><b>ID:</b> $alunoid</p>
    	<p><b>Nome:</b> $name</p>
    	<p><b>Email:</b> $email</p>
    	<p><b>Data de Nascimento:</b> $datadnsc</p>
    	<p><b>Curso:</b> $curso</p>
    </div>";
	}
	else {
    echo "<div align='left' style='font-size:16px;padding:0px 5px 5px 5px'>
    	<p><b>ID:</b> $professorid</p>
    	<p><b>Nome:</b> $professorname</p>
    	<p><b>Email:</b> $professoremail</p>
    	<p><b>Data de Nascimento:</b> $professordatadnsc</p>
    </div>";
  	}

}
?>
<html>
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Index.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Animate.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/SideMenu.css">
<script src="../TalkALot/JS/SideMenu.js"></script>
   <head>
      <title>Perfil</title>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
      </style>
   </head>
   

   <div class="bg">
   <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">
 
      <div align="center">
           <b style="font-size:42px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000" >Mediateca</b><br><br>
           <b  style="font-size:14px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000">Library Room Management</b><br><br>


         <div class="head animated fadeIn" style = "width:400px;background-color:white;color:black;border-radius:13px;" align = "center">
            <div style = "padding:3px;"><b style="font-size:19px">Perfil</b></div>
            <div style = "margin:30px; margin-top: 0px">
            <body bgcolor = "#FFFFFF">
   <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="perfil.php">Perfil</a>
        <a href="register.php'">Registo</a>
        <a href="CriarGrupos.php">Criar Grupos</a>
        <a href="Gerir_Grupos.php'">Gerir Grupos</a>
        <a href="reservas.php">Minhas Reservas</a>
        <a href="index_menu_principal.php'">Menu Principal</a>
    </div>
    <span style="font-size:40px;cursor:pointer;float:right;margin-right:10px;color:black" onclick="openNav()">&#9776; </span>
    <h1 class="tt">Reserva das Salas</h1>
    <br />
    <br />
    <br />
              <?php groupName(); ?> 

            </div>

         </div>

      </div>
      </div>
   </body>
</html>