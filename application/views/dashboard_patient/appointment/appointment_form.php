<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard_doctor/appointment/appointment/") ?>"> <i class="fa fa-list"></i>  <?php echo display('appointment_list') ?> </a>  
                </div>
            </div> 

            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open('dashboard_doctor/appointment/appointment/create','class="form-inner"') ?> 
                        
                            <!-- patient id -->
                            <div class="form-group row">
                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="patient_id" autocomplete="off" type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?php echo html_escape($appointment->patient_id) ?>">
                                    <span></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department_id" class="col-xs-3 col-form-label"><?php echo display('department_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('department_id',html_escape($department_list),$appointment->department_id,'class="form-control" id="department_id"') ?>
                                    <span class="doctor_error"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="doctor_id" class="col-xs-3 col-form-label"><?php echo display('doctor_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('doctor_id','','','class="form-control" id="doctor_id"') ?>
                                    <div id="available_days"></div>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="date" class="col-xs-3 col-form-label"><?php echo display('appointment_date') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9"> 
                                    <input name="date" type="text" class="datepicker-avaiable-days form-control" id="date" placeholder="<?php echo display('appointment_date') ?>" >
                                </div>
                            </div>
 
 
                            <div class="form-group row">
                                <label for="serial_no" class="col-xs-3 col-form-label"><?php echo display('serial_no') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div id="serial_preview">
                                        <div type="button" class="btn btn-success disabled btn-sm"> 01</div>
                                        <div type="button" class="btn btn-success disabled btn-sm"> 02</div>
                                        <div type="button" class="btn btn-success disabled btn-sm"> 03</div>...
                                        <div type="button" class="slbtn btn btn-success disabled btn-sm"> N</div>

                                    </div>
                                    <input type="hidden" name="schedule_id" id="schedule_id"/>
                                    <input type="hidden" name="serial_no" id="serial_no"/>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="problem" class="col-xs-3 col-form-label"><?php echo display('problem') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="problem" class="form-control" placeholder="<?php echo display('problem') ?>" maxlength="140" rows="7"></textarea>
                                </div>
                            </div>  

                            <div class="form-group row">
                                <label class="col-xs-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo  html_escape(set_radio('status', '1', TRUE)); ?> ><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" <?php echo  html_escape(set_radio('status', '0')); ?> ><?php echo display('inactive') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close() ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?php echo base_url('assets/js/admin/doctor/appointment.js') ?>" type="text/javascript"></script>