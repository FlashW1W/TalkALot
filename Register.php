<?php 
function queryTIPO(){
    $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

    $sql = "SELECT tip_uti_descricao FROM tipo_utilizador";
    $result = mysqli_query($db, $sql);;
    
    echo "<select name='cargo'>";
    echo "<option></option>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['tip_uti_descricao'] ."'>" . $row['tip_uti_descricao'] ."</option>";
    }
    echo "</select>";

}

function queryCURSO(){
    $db = mysqli_connect('localhost', 'root', '', 'lrm_v2');

    $sql = "SELECT cur_nome FROM curso ORDER BY cur_id";
    $result = mysqli_query($db, $sql);
    
    
    echo "<select name='curso'> ";
    echo "<option></option>";
    while ($row = mysqli_fetch_array($result)) {

        echo "<option value='" . $row['cur_nome'] ."'>" . $row['cur_nome'] ."</option>";
    }
    echo "</select>";

}



?>
<?php include('phpregister.php') ?>
<html>
<head>    
    <meta charset="utf-8" />
    <title>Register Page</title>
    <link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Index.css">
    <link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Register.css">
<link rel="stylesheet" type="text/css" href="../TalkALot/CSS/Animate.css">
</head>
<style type="text/css">
.button {
  border: none;
  color: white;
  padding: 7px 16px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
}

.actionbutton {
   border: none;
  color: white;
  text-align: center;
  text-decoration: none;
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
</style>
<body>
    <div class="bg">
   <img src="../TalkALot/Images/logo-ESTS.png" class="animated fadeIn" id="logo">
      <ul style="position:fixed;top: 0;right:0;">
  <li><a class="active" href="../TalkALot/index_login.php">LOGIN</a></li>
  <li><a href="../TalkALot/Register.php">REGISTER</a></li>
  </ul>
     <div align="center">
     <b style="font-size:42px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000" >Mediateca</b><br><br>
           <b  style="font-size:14px;font-family: Verdana, Geneva, Tahoma, sans-serif;color: white;text-shadow: 2px 2px 4px #000000">Library Room Management</b><br><br>


         <div class="head" style = "width:800px;background-color:white;color:black;border-radius:13px;">
            <div style = "padding:3px;"><b style="font-size:19px">Register</b></div>

            <div style = "margin:5px">

             <form action = "phpregister.php" method = "post">
              <?php include('errors.php'); ?>
                <table>
                    <tr>
                      <td>
                        <label>Número de Identificação</label></td>
                        <td>
                            <label>Data de Nascimento</label>
                        </td>
                        <td><label>Curso</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input type = "text" name = "idnumb" class = "box"/>     
                        </td> 
                        <td>
                            <input type = "Date" name = "datanas"  value="" class = "box" style="width:206px;height:41px;font-size:18px;border:1px solid #ccc;" />
                        </td>
                        <td>
                            <?php queryCURSO    (); ?>  
                      </td>
                  </tr>
                  <tr>
                      <td>
                        <label>UserName</label>
                    </td>
                    <td>
                        <label>Email</label>
                    </td>
                                        <td>
                        <label>Password</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type = "text" name = "uname" class = "box"/>  
                    </td>    
                    <td> 
                        <input type = "text" name = "email" class = "box" />
                    </td>
                                        <td> 
                        <input type = "password" name = "psw" class = "box" />
                    </td>
                    <tr>
                      <td>
                        <label>Nome</label>
                    </td>
                    <td>
                        <label>Cargo</label>
                    </td>
                </tr>
                <tr>
                  <td>
                    <input type = "text" name = "name" class = "box" />
                </td>
                <td> 
                <?php queryTIPO(); ?> 
              </td>
              <td> 
                <input type = "submit" value = "Criar" class="button animated fadeInLeft" name="reg_user" style="float:right;background-color: #4CAF50;margin-left:20px;"/>
                <input type="Button" value = " Voltar" class="button animated fadeInRight" onclick="location.href='index.php'" style="float:right;background-color: red;"/>

              </td>
            </tr>
        </table>
    </form>



</div>

</div>

</div>
</div>
</body>

</html>
