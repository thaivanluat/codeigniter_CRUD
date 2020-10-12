<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	public $employee;

	public function __construct() {
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('EmployeeModel');

		$this->employee = new EmployeeModel;
	}

	public function index() {
		$data['data'] = $this->employee->getEmployee();

		$this->load->view('index', $data);
	}

	public function store() {
		$config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim|required|max_length[50]'
			),
			array(
				'field' => 'address',
				'label' => 'address',
				'rules' => 'required|max_length[30]'
			),
			array(
				'field' => 'phone',
				'label' => 'phone',
				'rules' => 'trim|required|max_length[15]|min_length[6]'
			),
			array(
				'field' => 'email',
				'label' => 'email',
				'rules' => 'trim|required|valid_email|max_length[30]'
			)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
		}
		else {
           $this->EmployeeModel->insertEmployee();
		}
		
		redirect(base_url('employees'));
	}

	public function edit() {
		$config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim|required|max_length[50]'
			),
			array(
				'field' => 'address',
				'label' => 'address',
				'rules' => 'required|max_length[30]'
			),
			array(
				'field' => 'phone',
				'label' => 'phone',
				'rules' => 'trim|required|max_length[15]|min_length[6]'
			),
			array(
				'field' => 'email',
				'label' => 'email',
				'rules' => 'trim|required|valid_email|max_length[30]'
			)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
		}
		else {
			$id = $this->input->post('id');
            $this->EmployeeModel->updateEmployee($id);
		}
		
		redirect(base_url('employees'));
	}

	public function delete() {
		$multiple = $this->input->post('multiple');
		if(isset($multiple)) {
			$arrayId = explode(',', $this->input->post('id'));
			foreach($arrayId as $id) {
				$this->EmployeeModel->deleteEmployee($id);
			}
			redirect(base_url('employees'));
		}
		else {
			$id = $this->input->post('id');
			$this->EmployeeModel->deleteEmployee($id);
			redirect(base_url('employees'));
		}
	}
}
