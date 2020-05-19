<?php
namespace albertohector\apiCliente;
include 'Cliente.php';
include 'datos.php';


class ApiCliente{

    function insertarCliente($name,$address,$city,$email,$date,$quantity){
        $miCliente = new Cliente();
        $result = $miCliente->insertarClientes($name,$address,$city,$email,$date,$quantity); 
    }
    function getAll(){
        $miCliente = new Cliente();
        $misClientes = array();
        $misClientes['Clientes'] = array();
        
        $result = $miCliente->getClientes();
        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $register = array(
                    'name' => $row['name'],
                    'address' => $row['address'],
                    'city' => $row['city'],
                    'email' => $row['email'],
                    'date' => $row['date'],
                    'quantity' => $row['quantity'],
                );
                array_push($misClientes['Clientes'], $register);
            }

            http_response_code(200);
            echo json_encode($misClientes);
        }else{
            http_response_code(404);
           echo json_encode(array('message' => 'Eleemnt not found'));
        }
    
    }
    function getCliente($name){
        $miCliente = new Cliente();
        $misClientes = array();
        $misClientes['Clientes'] = array();
        
        $result = $miCliente->getCliente($name);
        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $register = array(
                    'name' => $row['name'],
                    'address' => $row['address'],
                    'city' => $row['city'],
                    'email' => $row['email'],
                    'date' => $row['date'],
                    'quantity' => $row['quantity'],
                );
                array_push($misClientes['Clientes'], $register);
            }

            http_response_code(200);
            echo json_encode($misClientes);
        }else{
            http_response_code(404);
           echo json_encode(array('message' => 'Eleemnt not found'));
        }
    
    }


function getClientesDate($date){
    $miCliente = new Cliente();
    $misClientes = array();
    $misClientes['Clientes'] = array();
    
    $result = $miCliente->getClientesDate($date);
    if($result->rowCount()){
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $register = array(
                'name' => $row['name'],
                'address' => $row['address'],
                'city' => $row['city'],
                'email' => $row['email'],
                'date' => $row['date'],
                'quantity' => $row['quantity'],
            );
            array_push($misClientes['Clientes'], $register);
        }

        http_response_code(200);
        echo json_encode($misClientes);
    }else{
        http_response_code(404);
       echo json_encode(array('message' => 'Eleemnt not found'));
    }

}
}


if (isset($_POST["inputClients"])) {
   $datos = new Datos();
   $datos->faker();
   $api = new ApiCliente();
   $api->getAll();
}
elseif(isset($_GET['client'])) {
    $name = $_GET['client'];
    $api = new ApiCliente();
    $api->getCliente($name);
}
elseif(isset($_GET['date'])) {
    $date = $_GET['date'];
    $api = new ApiCliente();
    $api->getClientesDate($date);
}
else{ 
$api = new ApiCliente();
//$api->getAll();
}

?>


