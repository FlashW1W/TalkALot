<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

$server = mysql_connect("localhost","root", "");
$db =  mysql_select_db("lrm_v2",$server);
$query = mysql_query("select * from reserva");
?>


<table class="striped">
            <tr class="header">
                <td>Id Reserva</td>
                <td>data reserva</td>
                <td>inicio</td>
                <td>duracao</td>
                <td>sala</td>
                <td>id utilizador</td>
                <td>id grupo</td>

            </tr>
            <?php
               while ($row = mysql_fetch_array($query)) {
                   echo "<tr>";
                   echo "<td>".$row[id_reserva]."</td>";
                   echo "<td>".$row[reserv_data]."</td>";
                   echo "<td>".$row[reserv_hora_inicio]."</td>";
                   echo "<td>".$row[reserv_duracao]."</td>";
                   echo "<td>".$row[reserv_sala]."</td>";
                   echo "<td>".$row[reserv_id_utilizador]."</td>";
                   echo "<td>".$row[reserv_id_grupo]."</td>";


                   echo "</tr>";
               }

            ?>
        </table>


</body>
</html>