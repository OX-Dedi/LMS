<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        is_logged_in();
        $this->get_datasess = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('M_Front');
        $this->load->model('M_Admin');
        $this->get_datasetupapp = $this->M_Front->fetchsetupapp();
		$this->load->model('chart_model'); 
	}

	public function index()
    {
        $data = [
            'title' => 'Chart',
            'user' => $this->get_datasess,
            'dataapp' => $this->get_datasetupapp
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('morris/trafficbar');
        $this->load->view('layout/footer', $data);

    } 

    public function chart_data()
    {
        $data = $this->chart_model->chart_database();
        echo json_encode($data);

    }

}