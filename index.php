<?php

require('./vendor/autoload.php');

$connectionParams = [
    'dbname' => 'docktrine_dbal',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'mysqli',
];
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);


try{
    if($conn->connect()){
        echo "connected..";
        // normal query 
        $result1 = $conn->query("SELECT * FROM STUDENTS");
        // prepared statements
         $result2 = $conn->executeQuery("SELECT * FROM STUDENTS WHERE phone=?",[344343543]);

        // prepared statements another way
        $result3 = $conn->prepare("SELECT * FROM STUDENTS WHERE phone=?");
        $result3->bindValue(1,344343543);
        $result3->execute()->fetchAll();

       // while($data = $result->fetch()){
            print_r($result1->fetchAll(PDO::FETCH_ASSOC));
            print_r($result2->fetchAll(PDO::FETCH_ASSOC));
            //print_r($result3->fetchAll(PDO::FETCH_ASSOC));
   
        //}
    }
}catch(Exception $e){
    echo "Failed";
}
