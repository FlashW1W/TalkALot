<?php 


function queryTIPO(){

    mysql_connect('localhost', 'root', '');
    mysql_select_db('lrm_v2');

    $sql = "SELECT cur_nome FROM curso";
    $result = mysql_query($sql);
    
    echo "<select name='curso'>";
    while ($row = mysql_fetch_array($result)) {
        echo "<option value='" . $row['cur_nome'] ."'>" . $row['cur_nome'] ."</option>";
    }
    echo "</select>";

}



?>