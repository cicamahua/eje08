<?php
class Venta extends CI_Controller
{
    public function nuevo()
    {
        $dataC=[
            'titulo'=> "Registro de nueva venta"
        ];

        $this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera", $dataC);

        $this->load->view("venta/nuevo");

        $archivoJSCargar=[
            'archivoJSCargar'=> array('js/venta/nuevo.js', 'js/venta/libreria.js')
        ];

        $this->load->view("plantilla/piehtml", $archivoJSCargar);
    }

    public function fila()
    {
        $fila = $this->input->post("fila");
        $this->load->model("ProductoModel");
        $datosProductos = $this->ProductoModel->seleccionar();

        $dataEnviar = [
            'fila'=>$fila,
            'datosProductos'=>$datosProductos
        ];
        $this->load->view("venta/fila", $dataEnviar);
    }

    public function mostrar()
    {
        $datosMostrar=[
            'stock'=>15,
            'precio'=> 10.5,
            'Imagen'=>"chocolaje.jpg"
        ];

        
    }
}
?>