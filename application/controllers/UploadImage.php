<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadImage extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {

        $status = "";
        $msg = "";

        $file_element_name = 'file_name';
        $config['upload_path'] = './figures/';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);


        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        } else {
            $data = $this->upload->data();
            echo json_encode(['name'=>$data['file_name']]);exit;
            return;

        }

        //echo json_encode(array('status' => $status, 'msg' => $msg));

    }


}
