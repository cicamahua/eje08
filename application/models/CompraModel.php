<?php
class CompraModel extends CI_Model
{
    public function insertar($idProducto, $cantidad)
    {

        $datos = [
            'id_producto' => "$idProducto",
            'cantidad' => "$cantidad",
            'fecha' => date("Y-m-d"),
            'hora' => date("H:i:s"),
            'activo' => 1,
        ];


        return $this->db->insert("compra", $datos);
    }


    function sumarProducto($id_producto)
    {

        $this->db->select('sum(cantidad) as cantidad');
        $this->db->where('activo', 1);
        $this->db->where('id_producto', $id_producto);

        $query = $this->db->get("compra");

        return $query->result();
    }

    public function seleccionar($cantidad = "", $desde = "0")
    {


        $this->db->select('producto.nombre, compra.cantidad, compra.fecha, compra.hora');
        $this->db->from('compra');
        $this->db->join('producto', 'producto.id_producto = compra.id_producto');
        if ($cantidad != "") {
            $this->db->limit($cantidad, $desde);
        }

        $query = $this->db->get();
        
        return $query->result();
    }
}
?>