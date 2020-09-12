<?php
class Inicio extends CI_Controller
{
    public function index()
    {
        $this->load->view('plantilla/cabecerahtml');
        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/piehtml');
    }

    public function nuevo()
    {
        $this->load->view('producto/nuevo');
    }

    public function guardar()
    {
        $Nombre=$this->input->post("Nombre");
        $Precio=$this->input->post("Precio");
        $Detalle=$this->input->post("Detalle");
        echo "Guardando";
        echo $Nombre;
        echo $Precio;
        echo $Detalle;

        
    }
}
?>