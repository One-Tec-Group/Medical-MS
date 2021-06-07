<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'dashboard_model'
		));
		
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 ) 
			redirect('login'); 

	}
 
	public function getPercentage(){    
        if ($this->session->userdata('isLogIn') == false
            || $this->session->userdata('user_role') != 1)
            redirect('login');  
        $date = $this->input->post('date', true);
        $my = explode('-', $date);
        $patient =  $this->dashboard_model->chart_patient($my[0],$my[1]);
        $appointment =  $this->dashboard_model->chart_appoint($my[0],$my[1]);
        $prescription =  $this->dashboard_model->chart_prescription($my[0],$my[1]);
        $total = $patient + $appointment + $prescription;  
        $data = array(
        	'patient' => (!empty($patient)?$patient/$total*100:0),
        	'appointment' => (!empty($appointment)?$appointment/$total*100:0),
        	'prescription' => (!empty($prescription)?$prescription/$total*100:0)
        );

        echo json_encode($data);
    } 

    public function getDebitCredit(){    
        $data = array();
        for ($i=1; $i <=12 ; $i++) {
            $month1 = date('m', strtotime("+$i month"));
            $year= date('Y', strtotime("+$i month - 1 year"));
            $month= date('M Y', strtotime("+$i month - 1 year"));
            $debit =  $this->dashboard_model->chart_debit($year,$month1);
            $credit =  $this->dashboard_model->chart_credit($year,$month1);
            $newData = array(
                'month'  => $month,
                'debit'  => $debit,
                'credit' => $credit
            );
            array_push($data, $newData);
          }  
        echo json_encode($data);
    } 
  
}
