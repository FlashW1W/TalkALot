﻿<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Mediateca</title>
    <link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Index.css">
    <link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Animate.css">
    <script src="../TalkALot/JS/Index.js"></script>
    <link rel="stylesheet" type="text/css" href="../TalkALot/CSS/SideMenu.css">
<script src="../TalkALot/JS/SideMenu.js"></script>
 
<style>
    p{

        vertical-align: 50%;
    }

</style>

</head>
<body>
    

    <div class="bg">

        <div class="head">

            <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="../TalkALot/Reservas.php">Reservas</a>
                <a href="../TalkALot/CriarGrupos.php">Criar Grupos</a>
                <a href="../TalkALot/GerirGrupos.php">Gerir Grupos</a>
                <a href="../TalkALot/Perfil.php">Perfil</a>
                <a href="../TalkALot/Ajuda.html">Ajuda</a>
            </div>

            <span style="font-size:40px;cursor:pointer;float:right;margin-right:10px;color:white" onclick="openNav()">&#9776; </span>


            <div id="id01" class="modal">

                <form class="modal-content animate" action="/action_page.php">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="../TalkALot/Images/Login.png" alt="Avatar" class="avatar" style="border-radius: 20px">
                    </div>

                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <button type="submit">Login</button>
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Remember me
                        </label>
                    </div>



                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                </form>
            </div>

            <div id="id02" class="modal">

                <form class="modal-content animate" action="/action_page.php">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="../TalkALot/Images/Register.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>

                        <label for="id"><b>Número de Identificação</b></label>
                        <input type="text" placeholder="Enter Id" name="Id" required>

                        <label for="mail"><b>E-mail</b></label>
                        <input type="text" placeholder="Enter E-mail" name="mail" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <button type="submit">Register</button>
                    </div>



                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="header">
            <h1 class="animated fadeInUp" id="med">Mediateca</h1>
            <h3 class="animated fadeInDown" id="lrm">Library Room Management</h3>

            <div style="vertical-align:top">
                <table class="language animated fadeInUp" style="width:50px">
                    <tr>
                        <td><input type="image" src="../TalkALot/Images/portugal-flag-button-round-icon-256.png" class="animated fadeInLeft" id="lingua" width="30px" height="30px" />
                        <td class="vl">
                        <td><input type="image" src="../TalkALot/Images/united-kingdom-flag-round-icon-256.png" class="animated fadeInRight" id="lingua" width="30px" height="30px" />

                    </tr>
                </table>
            </div>
        </div>


    </div>

      <div style="height: 300px">
         <p style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;font-size:40px;margin-top: 2%;padding-bottom: 5px;font-weight: bold">O nosso Objetivo</p>
         <p style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:justify;margin-left: 40px; margin-right: 40px">O nosso objetivo com a realização deste programa é a gestão das respetivas salas de trabalho que fazem parte da mediateca, esse controlo será feira através de uma plataforma web.</br>O nosso programa têm diversas funcionalidades sendo elas o login, a reserva das salas de trabalho, criação de grupos de trabalho, entre outras funcionalidades. </br>Com este sistema acreditamos que será uma mais valia para a nossa escola e que irá aumentará o número utilização das salas trabalho, como  também irá melhorar a organização das mesmas, pois a nossa aplicação oferece layouts compreensíveis e acessíveis para a comunidade escolar.
         </p>
         <br>
         <br>
      </div>
      <div style="background-color:#1d809f!important;padding-top: 1px;padding-bottom: 80px">
         <br>
         <p style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-weight:bold;text-align:center;font-size:40px;color:white">Vantagens</p>
         <table>
         <tr>
               <td align="center"><img src="Images/collaboration.png" width="100px" height="100px"></td>
               <td align="center"><img src="Images/online-booking.png" width="100px" height="100px"></td>
               <td align="center"><img src="Images/talking.png" width="100px" height="100px"></td>
               <td align="center"><img src="Images/management.png" width="100px" height="100px"></td>
            </tr>
            <tr>
               <td style="text-align: center;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight: bold;font-size: 20px;color: white;line-height: 1.2">Organização</td>
               <td style="text-align: center;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight: bold;font-size: 20px;color: white;line-height: 1.2">Facilidade de Reservas</td>
               <td style="text-align: center;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight: bold;font-size: 20px;color: white;line-height: 1.2";>Aumento de uso das salas</td>
               <td style="text-align: center;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight: bold;font-size: 20px;color: white;line-height: 1.2">Gestão do uso das salas</td>
            </tr>
        </table>



    </div>

    <div class="full">

        <img src="https://images.pexels.com/photos/926680/books-book-shopping-old-books-926680.jpeg?cs=srgb&dl=book-shelves-bookcase-books-926680.jpg&fm=jpg" alt="Snow" style="width:100%;">
        <div class="centered">

            <p style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;font-size:60px;margin-top: 2%;padding-bottom: 5px;font-weight: bold; text-shadow: 2px 2px 4px #000000;">Sempre a melhorar a vida do docente</p>

        </div>

    </div>

    <div style="background-color:#1d809f">

        <footer>
            <small style=" height:20px;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;font-size:20px;font-weight: bold;color:white">&copy; Copyright 2018, TalkALot</small>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/css3-animate-it.js"></script>

</body>
</html>