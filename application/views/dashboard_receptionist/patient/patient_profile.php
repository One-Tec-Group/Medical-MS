<div class="row">

    <div class="col-sm-12" id="PrintMe">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("dashboard_receptionist/patient/patient/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_patient') ?> </a>  
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard_receptionist/patient/patient") ?>"> <i class="fa fa-list"></i>  <?php echo display('patient_list') ?> </a>  
                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger" ><i class="fa fa-print"></i></button> 
                </div>
            </div> 

            <div class="panel-body"> 
                <div class="row">
                    <div class="col-sm-12" align="center">  
                        <h1><?php echo display('patient_information') ?></h1>
                    <br>
                    </div>

                    <div class="col-sm-3" align="center"> 
                        <img alt="Picture" src="<?php echo (!empty($profile->picture)?base_url($profile->picture):base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive img-hw-200">
                        <h3><?php echo html_escape("$profile->firstname $profile->lastname ") ?></h3>
                    </div> 

                    <div class="col-sm-9"> 
                        <dl class="dl-horizontal">
                            <dt><?php echo display('patient_id') ?></dt><dd><?php echo html_escape($profile->patient_id) ?></dd> 
                            <dt><?php echo display('email') ?></dt><dd><?php echo html_escape($profile->email) ?></dd> 
                            <dt><?php echo display('date_of_birth') ?></dt><dd><?php echo html_escape(date('d M Y',strtotime($profile->date_of_birth))) ?></dd> 
                            <dt><?php echo display('age') ?></dt><dd><?php echo html_escape(date_diff(date_create($profile->date_of_birth), date_create('now'))->y); ?> Years</dd> 
                            <dt><?php echo display('blood_group') ?></dt><dd><?php echo html_escape($profile->blood_group) ?></dd> 
                            <dt><?php echo display('sex') ?></dt><dd><?php echo html_escape($profile->sex) ?></dd> 
                            <dt><?php echo display('phone') ?></dt><dd><?php echo html_escape($profile->phone); ?></dd> 
                            <dt><?php echo display('mobile') ?></dt><dd><?php echo html_escape($profile->mobile) ?></dd> 
                            <dt><?php echo display('address') ?></dt><dd><?php echo html_escape($profile->address) ?></dd> 
                            <dt><?php echo display('create_date') ?></dt><dd><?php echo html_escape($profile->create_date) ?></dd>
                        </dl> 
                    </div>
                </div>  

            </div> 

            <div class="panel-footer">
                <div class="text-center">
                    <strong><?php echo html_escape($this->session->userdata('title')) ?></strong>
                    <p class="text-center"><?php echo html_escape($this->session->userdata('address')) ?></p>
                </div>
            </div>
        </div>
    </div>
  
</div>
