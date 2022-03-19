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
   require_once("../models/Materiales.php");
   $materiales = new Materiales();

   $body = json_decode(file_get_contents("php://input"), true);

   switch($_GET["op"]){

        case "GetMateriales":
            $datos=$materiales->get_materiales();
            echo json_encode($datos);
        break;

        case "GetMaterial":
            $datos=$materiales->get_material($body["ID"]);
            echo json_encode($datos);
        break;

        case "InsertMaterial":
            $datos=$materiales->insert_material($body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
            echo json_encode("Material Agregado");
        break;


        case "UpdateMaterial":
            $datos=$materiales->update_material($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
            echo json_encode("Material Actualizado");  
        break;
        
        case "DeleteMaterial":
            $datos=$materiales->delete_material($body["ID"]);
            echo json_encode("Material Eliminado");
        break;

   }
?>