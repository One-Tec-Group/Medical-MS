<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'dashboard_accountant/account_manager/report_model',
			'dashboard_accountant/account_manager/account_model'
		));
		
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 3
		) 
		redirect('login'); 


	}
 
	public function index()
	{
		$data['title'] = display('report');
		#-------------------------------#
		$start_date = ($this->input->get('start_date', true) != '' ? $this->input->get('start_date', true) : date('d-m-Y'));
		$end_date   = ($this->input->get('end_date', true) != '' ? $this->input->get('end_date', true) : date('d-m-Y'));
		#-------------------------------#
		$data['date'] = (object)$reportData = array(
			'start_date' => $start_date,
			'end_date'   => $end_date,
			'patient_id' => $this->input->get('patient_id', true), 
			'report_option' => $this->input->get('report_option', true), 
		); 

		$data['account_list'] = $this->account_model->debit_acc_list();
		$data['invoice'] = $this->report_model->read($reportData);
		$data['content'] = $this->load->view('dashboard_accountant/account_manager/report', $data, true);
		$this->load->view('dashboard_accountant/main_wrapper',$data);
	} 
 
	public function debit()
	{
		$data['title'] = display('debit_report');
		#-------------------------------#
		$start_date = ($this->input->get('start_date', true) != '' ? $this->input->get('start_date', true) : date('d-m-Y'));
		$end_date   = ($this->input->get('end_date', true) != '' ? $this->input->get('end_date', true) : date('d-m-Y'));
		#-------------------------------#
		$data['date'] = (object)$reportData = array(
			'report_option' => $this->input->get('report_option', true), 
			'account_id' => $this->input->get('account_id', true), 
			'patient_id' => $this->input->get('patient_id', true), 
			'start_date' => $start_date,
			'end_date'   => $end_date,
		);  

		$data['debit_acc_list']  = $this->account_model->debit_acc_list();
		$data['invoice'] = $this->report_model->debit($reportData);
		$data['content'] = $this->load->view('dashboard_accountant/account_manager/report_debit', $data, true);
		$this->load->view('dashboard_accountant/main_wrapper',$data);
	} 

 
	public function credit()
	{
		$data['title'] = display('credit_report');
		#-------------------------------#
		$start_date = ($this->input->get('start_date', true) != '' ? $this->input->get('start_date', true) : date('d-m-Y'));
		$end_date   = ($this->input->get('end_date', true) != '' ? $this->input->get('end_date', true) : date('d-m-Y'));
		// #-------------------------------#
		$data['date'] = (object)$reportData = array(
			'report_option' => $this->input->get('report_option', true), 
			'account_id' => $this->input->get('account_id', true), 
			'pay_to' => $this->input->get('pay_to', true), 
			'start_date' => $start_date,
			'end_date'   => $end_date,
		);  

		$data['credit_acc_list'] = $this->account_model->credit_acc_list();
		$data['invoice'] = $this->report_model->credit($reportData);
		$data['content'] = $this->load->view('dashboard_accountant/account_manager/report_credit', $data, true);
		$this->load->view('dashboard_accountant/main_wrapper',$data);
	} 

}
