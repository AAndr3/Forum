<?php 


$GLOBALS['bd'] = mysqli_connect('localhost', 'root', '', 'pap2018');

function mostrar_categoria(){

    $sql = "SELECT * FROM categoria WHERE type = '1' order by categoria ASC";
    $query = mysqli_query($GLOBALS['bd'], $sql);
    $res = mysqli_fetch_assoc($query); ?>
    <optgroup  label="Mega Forum"><?php
    do {
    ?><option value="<?php echo $res['id_categoria'];?>"><?php echo utf8_encode($res["categoria"]);?></option><?php
    }while($res = mysqli_fetch_assoc($query));
    ?></optgroup><?php
    $sql = "SELECT * FROM categoria WHERE type = '2' order by categoria ASC";
    $query = mysqli_query($GLOBALS['bd'], $sql);
    $res = mysqli_fetch_assoc($query);
    ?><optgroup  label="Desenvolvimento Web"><?php
    do {
    ?><option value="<?php echo $res['id_categoria'];?>"><?php echo $res["categoria"];?></option><?php
    }while($res = mysqli_fetch_assoc($query));
    ?></optgroup><?php
    $sql = "SELECT * FROM categoria WHERE type = '3' order by categoria ASC";
    $query = mysqli_query($GLOBALS['bd'], $sql);
    $res = mysqli_fetch_assoc($query);
    ?><optgroup  label="Desenvolvimento Geral"><?php
    do {
    ?><option value="<?php echo $res['id_categoria'];?>"><?php echo $res["categoria"];?></option><?php
    }while($res = mysqli_fetch_assoc($query));
    ?></optgroup><?php
    $sql = "SELECT * FROM categoria WHERE type = '4' order by categoria ASC";
    $query = mysqli_query($GLOBALS['bd'], $sql);
    $res = mysqli_fetch_assoc($query);
    ?><optgroup  label="Base de Dados"><?php
    do {
    ?><option value="<?php echo $res['id_categoria'];?>"><?php echo $res["categoria"];?></option><?php
    }while($res = mysqli_fetch_assoc($query));
    ?></optgroup><?php
}