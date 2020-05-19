<?php
class Datos{
    function faker(){
        require_once "vendor/autoload.php";

        $faker = Faker\Factory::create();
        $api = new ApiCliente();
        for($i=0; $i<1000; $i++){
        $name = $faker->name;
        $address=  $faker->address;
        $city = $faker->city;
        $email = $faker->email;
        $date = $faker->unique()->dateTimeBetween('-30 years', 'now')->format('Y-m-d');
        $quantity = $faker->numberBetween($min =0, $max = 10000);
        $api->insertarCliente($name,$address,$city,$email,$date,$quantity);
        }
    }
}
?>
