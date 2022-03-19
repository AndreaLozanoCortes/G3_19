<?php
     class Materiales extends Conectar{

        public function get_materiales(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_materiales";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_material($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_materiales WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        } 
        
        public function insert_material($descripcion,$unidad,$costo,$precio,$aplicaisv,$porcentajeisv,$estado,$idsocio){
            $conectar= parent ::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_materiales(id,descripcion,unidad,costo,precio,aplica_isv,porcentaje_isv,estado,id_socio)
            VALUES (NULL,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $descripcion);
            $sql->bindValue(2, $unidad);
            $sql->bindValue(3, $costo);
            $sql->bindValue(4, $precio);
            $sql->bindValue(5, $aplicaisv);
            $sql->bindValue(6, $porcentajeisv);
            $sql->bindValue(7, $estado);
            $sql->bindValue(8, $idsocio);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_material($id,$descripcion,$unidad,$costo,$precio,$aplicaisv,$porcentajeisv,$estado,$idsocio){
            $conectar= parent ::conexion();
            parent::set_names();
            $sql="UPDATE ma_materiales SET descripcion=?,unidad=?,costo=?,precio=?,aplica_isv=?,porcentaje_isv=?,estado=?,id_socio=? WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $descripcion);
            $sql->bindValue(2, $unidad);
            $sql->bindValue(3, $costo);
            $sql->bindValue(4, $precio);
            $sql->bindValue(5, $aplicaisv);
            $sql->bindValue(6, $porcentajeisv);
            $sql->bindValue(7, $estado);
            $sql->bindValue(8, $idsocio);
            $sql->bindValue(9, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
  
        public function delete_material($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE FROM ma_materiales WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }    
    }
?>