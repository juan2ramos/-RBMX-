<?php

/**
 * Created by PhpStorm.
 * User: juan2ramos
 * Date: 13/08/15
 * Time: 23:43
 */
class Team_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getTeam() {
        $query = $this->db->get('team', 10);
        return $query->result();;
    }
    function addTeam($postData){
        $this->db->insert('team', $postData);
        return  $this->db->insert_id();
    }
}