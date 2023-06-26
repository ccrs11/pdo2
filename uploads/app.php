<?php 

    require '../vendor/autoload.php';
    //echo "EXITO";
    //new \App\connect();
    $router = new \Bramus\Router\Router();

    $router->get("/camper", function(){

        $conex =new \App\connect();
        $res =$conex->con->prepare("SELECT * FROM tb_camper");
        $res->execute();
        $res= $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);

    });

    $router->put("/camper", function(){

        $_DATA =json_decode(file_get_contents('php://input'),true);
        $conex =new \App\connect();
        $res =$conex->con->prepare("UPDATE tb_camper SET nombre = :NOMBRE WHERE id=:CEDULA;");
        $res->bindValue("NOMBRE",$_DATA["nom"]);
        $res->bindValue("CEDULA",$_DATA["id"]);
        $res->execute();
        $res=$res->rowCount();       
        echo json_encode($res);


    });

    $router->delete("/camper", function(){

        $_DATA =json_decode(file_get_contents('php://input'),true);
        $conex =new \App\connect();
        $res =$conex->con->prepare("DELETE FROM  tb_camper WHERE id=:CEDULA;");        
        $res->bindValue("CEDULA",$_DATA["id"]);
        $res->execute();
        $res=$res->rowCount();       
        echo json_encode($res);

    });
    
    $router->post("/camper", function(){

        $_DATA =json_decode(file_get_contents('php://input'),true);
        $conex =new \App\connect();
        $res =$conex->con->prepare("INSERT INTO tb_camper (nombre) VALUES (:NOMBRE)");        
        $res->bindValue("NOMBRE",$_DATA["nombre"]);
        $res->execute();
        $res=$res->rowCount();       
        echo json_encode($res);
    });

    $router->run();

?>