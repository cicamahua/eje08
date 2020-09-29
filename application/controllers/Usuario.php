<?php
class Usuario extends CI_Controller
{
    public function nuevo()
    {
        $datosC = [
            'titulo' => 'Registro de Nuevo Usuario'
        ];
        $this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera", $datosC);
        $this->load->view("usuario/nuevo");
        $this->load->view("plantilla/piehtml");
    }

    public function guardar()
    {
        $Nombre = $this->input->post("Nombre");
        $Apellido = $this->input->post("Apellido");
        $Fotografia = $this->input->post("Fotografia");
        $Usuario = $this->input->post("Usuario");
        $Contrasena = $this->input->post("Contrasena");

        // echo "GUARDANDO";

        // echo $Nombre;
        // echo $Precio;
        // echo $Detalle;



        $config['upload_path']          = './imagenes/usuarios/';
        // $config['allowed_types']        = 'pdf';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500;
        $config['max_width']            = 1224;
        $config['max_height']           = 968;
        $config['overwrite']           = true;

        $this->load->library('upload', $config);

        $datosEnviar = [
            'titulo' => 'Registro de Usuarios'
        ];
        $this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera", $datosEnviar);

        $nombreArchivo = "";
        if ($this->upload->do_upload('Fotografia')) {

            // echo "correcto";

            $datosArchivo = $this->upload->data();

            $nombreArchivo = $datosArchivo['file_name'];

            // echo "<pre>";
            // print_r($datosArchivo);
            // echo "</pre>";
            // echo $nombreArchivo;


            $this->load->model("UsuarioModel");

            if ($this->UsuarioModel->insertar($Nombre, $Apellido, $nombreArchivo, $Usuario, $Contrasena)) {
                //correcto

                $this->load->view("usuario/correcto");
            } else {
                //error
                $this->load->view("usuario/error");
            }
        } else {
            // echo "error";


            $errores = $this->upload->display_errors();

            // echo "<pre>";
            // print_r($errores);
            // echo "</pre>";

            $this->load->view("usuario/error");
        }


        $this->load->view("plantilla/piehtml");
    }

    public function listar()
    {
        $this->load->model("UsuarioModel");
        $datosUsuarios = $this->UsuarioModel->seleccionar();

        // foreach ($datosProductos as $p) {
        //     echo "<pre>";
        //     print_r($p);
        //     echo "</pre>";
        // }

        // echo count($datosProductos);


        // die;
        // exit();

        $desde = $this->uri->segment(3);

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'usuario/listar/';
        $config['total_rows'] = count($datosUsuarios);
        $config['per_page'] = 2;
        $config['num_links'] = 3;
        $config['uri_segment'] = 3;

        //Estilos de la paginación
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';


        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['first_link'] = 'Primero';


        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['last_link'] = 'Último';




        $this->pagination->initialize($config);



        $datosUsuarios = $this->UsuarioModel->seleccionar($config['per_page'], $desde);

        $data = [
            'desde' => $desde,
            'datosUsuarios' => $datosUsuarios
        ];

        $dataC = [
            'titulo' => "Listado de Usuarios"
        ];
        $this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera", $dataC);
        $this->load->view("usuario/listado", $data);
        $this->load->view("plantilla/piehtml");
    }
}
?>