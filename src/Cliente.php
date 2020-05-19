<?php
namespace albertohector\apiCliente;
include 'DBconn.php';

class Cliente extends DBconn{

    function insertarClientes($name,$address,$city,$email,$date,$quantity){
        $result = $this->connect()->query("INSERT INTO cliente(name,address,city,email,date,quantity) VALUES ('$name','$address','$city','$email','$date',$quantity)");
        return $result;
    }
    function getClientes(){
        $result = $this->connect()->query('SELECT * FROM cliente');
        return $result;
    }
    function getCliente($name){
        $result = $this->connect()->query("SELECT * FROM cliente WHERE name LIKE '%$name%'");
        return $result;
    }
    function getClientesDate($date){
        $result = $this->connect()->query("SELECT * FROM cliente WHERE date > '$date'");
        return $result;
    }
    
}

?>