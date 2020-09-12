<?php
class Producto extends CI_Controller
{

    public function nuevo()
    {
        $datosC = [
            'titulo'=> 'Registro de Nuevo Producto'
        ];
        $this->load->view('plantilla/cabecerahtml');
        $this->load->view('plantilla/cabecera', $datosC);
        $this->load->view('producto/nuevo');
        $this->load->view('plantilla/piehtml');
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

        $config['upload_path']          = './imagenes/productos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500;
        $config['max_width']            = 1224;
        $config['max_height']           = 968;

        $this->load->library('upload', $config);

        $datosEnviar =[
            'titulo'=> 'Registro de productos'
        ];
        $this->load->view('plantilla/cabecerahtml');
        $this->load->view('plantilla/cabecera', $datosEnviar);
        
        $nombreArchivo = "";
        if ($this->upload->do_upload('Foto'))
        {
            echo "correcto";
            $datosArchivo = $this-> upload->data();
            $nombreArchivo = $datosArchivo ('file_name');

            $this -> load -> model("ProductoModel");
            if ($this-> ProductoModel -> insertar ($Nombre, $Precio,$Detalle,$nombreArchivo))
            {
                $this -> load -> view("producto/correcto");
            } else {
                $this -> load -> view("producto/error");
            }
            //$error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $errores = $this -> upload -> display_errors();
            echo "<pre>";
            print_r ($errores);
            echo "</pre>";
            //$data = array('upload_data' => $this->upload->data());

            //$this->load->view('upload_success', $data);
        }
        $this->load->view('plantilla/piehtml');

    }

    public function listar()
    {
        
    }
}
?>