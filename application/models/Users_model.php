<?php

/**
 * Created by PhpStorm.
 * User: juan2ramos
 * Date: 13/08/15
 * Time: 23:43
 */
class Users_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_users() {
        $query = $this->db->get('users', 10);
        return $query->result();;
    }

    function addUser($postData){
        $this->db->insert('users', $postData);

    }
}