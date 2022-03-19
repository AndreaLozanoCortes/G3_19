<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');

   require_once("../config/conexion.php");
   require_once("../models/Socios_Negocio.php"); //models
   $socios = new Socios(); //Instancia de una clase que está en models

   $body = json_decode(file_get_contents("php://input"), true);

   switch($_GET["op"]){

        case "GetSocios":
            $datos=$socios->get_socios();
            echo json_encode($datos);
        break;

        case "GetSocio":
            $datos=$socios->get_socio($body["ID"]);
            echo json_encode($datos);
        break;

        case "InsertSocio":
            $datos=$socios->insert_socio($body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"]);
            echo json_encode("Socio de Negocio Agregado Éxitosamente");
        break;

        case "UpdateSocio":
            $datos=$socios->update_socio($body["ID"],$body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"]);
            echo json_encode("Socio de Negocio Actualizado Éxitosamente");  
        break;
        
        case "DeleteSocio":
            $datos=$socios->delete_socio($body["ID"]);
            echo json_encode("Socio de Negocio Eliminado Éxitosamente");
        break;

   }
?>