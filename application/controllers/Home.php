<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $messageError;

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('layouts/default', ['title' => 'Formulario', 'view' => 'form/index']);
    }

    /**
     *
     */
    public function post()
    {
        $this->load->model('users_model');
        $this->load->model('team_model');

        if ($this->validate()) {

            $this->insertForm($this->input->post());
            echo json_encode(['success' => true]);

        } else {
            echo json_encode(['success' => false,'errors' => $this->messageError]);
        }

    }

    private function insertForm($post)
    {
        print_r($post['team']);
        $team = [
            'name_team' => $post['team'],
            'city' => $post['city'],
        ];
        $idTeam = $this->team_model->addTeam($team);
        $user1 = [
            'name_user' => $post['name-user'],
            'last_name' => $post['last-name'],
            'birthday' => $post['birthday'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'student_number' => $post['student_number'],
            'id_team' => $idTeam,
        ];
        $user2 = [
            'name_user' => $post['name-user-2'],
            'last_name' => $post['last-name-2'],
            'birthday' => $post['birthday-2'],
            'email' => $post['email-2'],
            'phone' => $post['phone-2'],
            'address' => $post['address-2'],
            'student_number' => $post['student_number-2'],
            'id_team' => $idTeam,
        ];
        $this->users_model->addUser($user1);
        $this->users_model->addUser($user2);
    }

    private function validate()
    {
        if ($this->input->post()) {

            $config = [
                ['field' => 'team', 'label' => 'team', 'rules' => 'required'],
                ['field' => 'city', 'label' => 'city', 'rules' => 'required'],

                ['field' => 'name-user', 'label' => 'name-user', 'rules' => 'required'],
                ['field' => 'last-name', 'label' => 'last-name', 'rules' => 'required'],
                ['field' => 'birthday', 'label' => 'birthday', 'rules' => 'required'],
                ['field' => 'email', 'label' => 'email', 'rules' => 'required|valid_email|is_unique[users.email]'],
                ['field' => 'phone', 'label' => 'phone', 'rules' => 'required'],
                ['field' => 'address', 'label' => 'address', 'rules' => 'required'],
                ['field' => 'student_number', 'label' => 'student_number', 'rules' => 'required'],

                ['field' => 'name-user-2', 'label' => 'name-user-2', 'rules' => 'required'],
                ['field' => 'last-name-2', 'label' => 'last-name-2', 'rules' => 'required'],
                ['field' => 'birthday-2', 'label' => 'birthday-2', 'rules' => 'required'],
                ['field' => 'email-2', 'label' => 'email-2', 'rules' => 'required|valid_email|is_unique[users.email]'],
                ['field' => 'phone-2', 'label' => 'phone-2', 'rules' => 'required'],
                ['field' => 'address-2', 'label' => 'address-2', 'rules' => 'required'],
                ['field' => 'student_number-2', 'label' => 'student_number-2', 'rules' => 'required'],

            ];

            $this->form_validation->set_rules($config);

            if (!$this->form_validation->run()) {
                $this->messageError = validation_errors();
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
