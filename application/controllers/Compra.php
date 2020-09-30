<?php 
class Compra extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('logged_in')) {
            redirect(base_url() . 'login/');
        }
    }
    
    public function nuevo()
    {
        $datosC = [
            'titulo' => 'Registro de Nuevas Compras'
        ];
        $this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera", $datosC);

        $this->load->model("ProductoModel");
        $datosProductos = $this->ProductoModel->seleccionar("", 0,"");

        $datosP=[
            'productos'=> $datosProductos
        ];

        $this->load->view("compra/nuevo", $datosP);
       /* $archivoJSCargar=[
            'archivoJSCargar'=> array('js/compra/nuevo.js')
        ];*/
        $this->load->view("plantilla/piehtml");
       // $this->load->view("plantilla/piehtml", $archivoJSCargar);
    }

    public function guardar()
    {
        $idp = $this->input->post("id_producto");
        $Cantidad = $this->input->post("Cantidad");
        $this->load->model("CompraModel");

        $this->load->view('plantilla/cabecerahtml');
        $this->load->view('plantilla/cabecera');

        if ($this->CompraModel->insertar($idp, $Cantidad)) {
            //correcto

            $this->load->view("compra/correcto");
        } else {
            //error
            $this->load->view("compra/error");
        }

        $this->load->view('plantilla/piehtml');        

    }

    public function listar()
    {
        $this->load->model("CompraModel");
        $datosCompra = $this->CompraModel->seleccionar();

        $desde = $this->uri->segment(3);

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'compra/listar/';
        $config['total_rows'] = count($datosCompra);
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



        $datosCompra = $this->CompraModel->seleccionar($config['per_page'], $desde);

        $data = [
            'desde' => $desde,
            'datosCompra' => $datosCompra
        ];

        $dataC = [
            'titulo' => "Listado de Compra de Productos"
        ];
        $this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera", $dataC);
        $this->load->view("compra/listado", $data);
        $this->load->view("plantilla/piehtml");
    }

}
?>