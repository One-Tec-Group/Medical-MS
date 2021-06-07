<div class="row">

    <div class="col-sm-12" id="PrintMe">

        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("doctor/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_doctor') ?> </a>  
                    <a class="btn btn-primary" href="<?php echo base_url("doctor") ?>"> <i class="fa fa-list"></i>  <?php echo display('doctor_list') ?> </a>  
                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger" ><i class="fa fa-print"></i></button> 
                </div>
            </div> 

            <div class="panel-body">
                <div class="row">

                    <div class="col-sm-12" align="center">  
                        <h1><?php echo display('doctor_information') ?></h1>
                    <br>
                    </div>

                    <div class="col-md-3 col-lg-3 " align="center"> 
                        <img alt="Picture" src="<?php echo (!empty($user->picture)?base_url($user->picture):base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive img-hw-200">
                        <h3>
                            <?php echo html_escape($user->firstname.' '.$user->lastname); ?> 
                        </h3>
                    </div>

                    <div class="col-md-7 col-lg-7 "> 
                        <dl class="dl-horizontal">
                            <dt><?php echo display('email')?></dt><dd><?php echo (!empty($user->email)?html_escape($user->email):null) ?></dd>
                            <dt><?php echo display('designation')?></dt><dd><?php echo (!empty($user->designation)?html_escape($user->designation):null) ?></dd>
                            <dt><?php echo display('department')?></dt><dd><?php echo (!empty($user->department)?html_escape($user->department):null) ?></dd>
                            <dt><?php echo display('address')?></dt><dd><?php echo (!empty($user->address)?html_escape($user->address):null) ?></dd>
                            <dt><?php echo display('phone')?></dt><dd><?php echo (!empty($user->phone)?html_escape($user->phone):null) ?></dd>
                            <dt><?php echo display('mobile')?></dt><dd><?php echo (!empty($user->mobile)?html_escape($user->mobile):null) ?></dd>
                            <dt><?php echo display('short_biography')?></dt><dd><?php echo (!empty($user->short_biography)?html_escape($user->short_biography):null) ?></dd>
                            <dt><?php echo display('specialist')?></dt><dd><?php echo (!empty($user->specialist)?html_escape($user->specialist):null) ?></dd>
                            <dt><?php echo display('date_of_birth')?></dt><dd><?php echo (!empty($user->date_of_birth)?html_escape($user->date_of_birth):null) ?></dd>
                            <dt><?php echo display('sex')?></dt><dd><?php echo (!empty($user->sex)?html_escape($user->sex):null) ?></dd>
                            <dt><?php echo display('degree')?></dt><dd><?php echo (!empty($user->degree)?html_escape($user->degree):null) ?></dd>
                            <dt><?php echo display('create_date')?></dt><dd><?php echo (!empty($user->create_date)?html_escape($user->create_date):null) ?></dd>
                            <dt><?php echo display('update_date')?></dt><dd><?php echo (!empty($user->update_date)?html_escape($user->update_date):null) ?></dd>
                            <dt><?php echo display('status')?></dt><dd><?php echo (!empty($user->status)?
                            display('active'):display('inactive')) ?></dd>
                        </dl> 
                    </div>
                </div>
            </div> 

            <div class="panel-footer">
                <div class="text-center">
                    <strong><?php echo html_escape($this->session->userdata('title')); ?></strong>
                    <p class="text-center"><?php echo html_escape($this->session->userdata('address')); ?></p>
                </div>
            </div>
        </div>
    </div>
 
</div>
