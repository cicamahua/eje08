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

        // $valores = "' OR '1'='1 ";

        $this->db->select('id_compra,id_producto,cantidad,fecha,hora');
        // $this->db->where('nombre', $valores);
        $this->db->where('activo', 1);
        $this->db->order_by('cantidad');

        if ($cantidad != "") {
            $this->db->limit($cantidad, $desde);
        }

        $query = $this->db->get('compra');
        return $query->result();
    }
}
?>