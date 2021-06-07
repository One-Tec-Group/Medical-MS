<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Case_study extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'prescription/case_study_model'
		));
		
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1
		) 
		redirect('login'); 

	}
 
	public function index()
	{
		$data['title'] = display('patient_case_study_list');
		#-------------------------------#
		$data['case_studys'] = $this->case_study_model->read();
		$data['content'] = $this->load->view('prescription/case_study',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

 	public function create()
	{
		$data['title'] = display('add_patient_case_study');
		#-------------------------------#
		$this->form_validation->set_rules('patient_id', display('patient_id') ,'required|max_length[30]');
		$this->form_validation->set_rules('status', display('status') ,'required');
		#-------------------------------#
		$data['case_study'] = (object)$postData = [
			'id' 	         => $this->input->post('id', true), 
			'patient_id'     => $this->input->post('patient_id', true), 
			'food_allergies' => $this->input->post('food_allergies', true), 
			'tendency_bleed' => $this->input->post('tendency_bleed', true), 
			'heart_disease'  => $this->input->post('heart_disease', true), 
			'high_blood_pressure' => $this->input->post('high_blood_pressure', true), 
			'diabetic' => $this->input->post('diabetic', true), 
			'surgery' => $this->input->post('surgery', true), 
			'accident' => $this->input->post('accident', true), 
			'others' => $this->input->post('others', true), 
			'family_medical_history' => $this->input->post('family_medical_history', true), 
			'current_medication' => $this->input->post('current_medication', true), 
			'female_pregnancy' => $this->input->post('female_pregnancy', true), 
			'breast_feeding' => $this->input->post('breast_feeding', true), 
			'health_insurance' => $this->input->post('health_insurance', true), 
			'low_income' => $this->input->post('low_income', true), 
			'reference' => $this->input->post('reference', true), 
			'status' => $this->input->post('status', true)
		]; 
		#-------------------------------#
		if ($this->form_validation->run()) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
				if ($this->case_study_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
				redirect('prescription/case_study/create');
			} else {
				if ($this->case_study_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
				redirect('prescription/case_study/edit/'.$postData['id']);
			}

		} else {
			$data['content'] = $this->load->view('prescription/case_study_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	public function edit($id = null) 
	{
		$data['title'] = display('case_study_edit');
		#-------------------------------#
		$data['case_study'] = $this->case_study_model->read_by_id($id);
		$data['content'] = $this->load->view('prescription/case_study_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($id = null) 
	{
		if ($this->case_study_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('prescription/case_study');
	}
  
}
