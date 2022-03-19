<?php

class facturas extends Conectar{

    public function get_facturas(){
        $conectar=parent::conexion(); 
        $sql="SELECT * FROM ma_facturas_cliente"; 
        $sql=$conectar->prepare($sql); 
        $sql->execute(); 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function get_factura($id){
        $conectar=parent::conexion(); 
        parent::set_names(); 
        $sql="SELECT * FROM ma_facturas_cliente WHERE ID = ?";  
        $sql=$conectar->prepare($sql); 
        $sql->bindvalue(1, $id); 
        $sql->execute(); 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
    } 

    public function insert_facturas($numerofactura, $idsocio, $fechafactura, $detalle, $subtotal, $totalisv, $total, $fechavencimiento, $estado){
        $conectar=parent::conexion(); 
        parent::set_names(); 
        $sql="INSERT INTO ma_facturas_cliente(id, numero_factura, id_socio, fecha_factura, detalle, sub_total, total_isv, total, fecha_vencimiento, estado)
        VALUES (NULL, ?,?,?,?,?,?,?,?,?);"; 
        $sql=$conectar->prepare($sql); 
        $sql->bindvalue(1, $numerofactura); 
        $sql->bindvalue(2, $idsocio);
        $sql->bindvalue(3, $fechafactura);
        $sql->bindvalue(4, $detalle);
        $sql->bindvalue(5, $subtotal);
        $sql->bindvalue(6, $totalisv);
        $sql->bindvalue(7, $total);
        $sql->bindvalue(8, $fechavencimiento);
        $sql->bindvalue(9, $estado);
        $sql->execute(); 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);         
    }

    public function update_facturas($id, $numero_factura, $id_socio, $fecha_factura, $detalle, $sub_total, $total_isv ,$total, $fecha_vencimiento, $estado){
        $conectar= parent ::conexion();
        parent::set_names();
        $sql="UPDATE ma_facturas_cliente SET numero_factura= ?, id_socio = ?, fecha_factura = ?, detalle = ?, sub_total = ?, total_isv = ?, total = ?, fecha_vencimiento = ?, estado = ? WHERE ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $numero_factura);
        $sql->bindValue(2, $id_socio);
        $sql->bindValue(3, $fecha_factura);
        $sql->bindValue(4, $detalle);
        $sql->bindValue(5, $sub_total);
        $sql->bindValue(6, $total_isv);
        $sql->bindValue(7, $total);
        $sql->bindValue(8, $fecha_vencimiento);
        $sql->bindValue(9, $estado);
        $sql->bindValue(10,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_facturas($id){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="DELETE FROM ma_facturas_cliente WHERE ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }    
}
?>