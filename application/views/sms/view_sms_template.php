    <div class="row">
        <div class="col-md-12 ">
            <div  class="panel panel-default panel-form">
                <div class="panel-body">
                    <div class="portlet-body form">
                    <?php  
                        echo form_open_multipart('sms/sms_setup_controller/save_sms_template', array('class' => 'form-horizontal','method'=>'post','id' => 'MyForm','role'=>'form'));  
                    ?>
                        
                    <div class="form-body">
                       <input type="hidden" name="id" id="id" value=""/>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo display('template_name');?> : </label>
                                <div class="col-md-5">
                                    <input type="text" id="template_name" class="form-control" value="" required="1" name="teamplate_name" placeholder="<?php echo display('template_name');?>">
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo display('type');?> : </label>
                                <div class="col-md-5">
                                    <?php echo form_dropdown('type', array('' => 'Select Option', 'Appointment' =>'Appointment', 'Registration' => 'Registration', 'Schedule' => 'Schedule'), null, array('class'=>'form-control dont-select-me', 'id'=>'type', 'required'=>'required')) ?> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo display('sms_template');?> : </label>
                                <div class="col-md-5">
                                     <textarea name="teamplate" id="teamplate" value="" class="form-control" required="1" rows="6"></textarea>
                                </div>
                            </div> 
                        </div>

                           <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="reset" class="btn btn-danger"><?php echo display('reset');?></button>
                                    <button type="submit" class="btn btn-success sav_btn"><?php echo display('submit');?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
         </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="breadcrumbs ng-scope">
                <h2> <?php echo display('sms_template_list');?></h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <table width="100%" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="center">
                                <th class="all"> <?php echo display('set_default');?> </th>
                                <th class="all"><?php echo display('template_name');?></th>
                                <th class="all"><?php echo display('type');?></th>
                                <th class="all"><?php echo display('sms_template');?> </th>
                                <th class="all"><?php echo display('action');?> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($teamplate as $value) {?>
                            <tr>
                                <td> 
                                    <a class="btn btn-info" href="<?php echo base_url(); ?>sms/sms_setup_controller/set_default_template/<?php echo html_escape($value->teamplate_id) . '/' . html_escape($value->default_status); ?>"><span class="glyphicon glyphicon-<?php echo html_escape($value->default_status)==1?'ok':'remove';?>"></span></a>
                                </td>
                                <td id="t_<?php echo $value->teamplate_id;?>"><?php echo html_escape($value->teamplate_name); ?></td>
                                <td id="ts_<?php echo $value->type; ?>"><?php echo html_escape($value->type); ?></td>
                                <td id="td_<?php echo $value->teamplate_id;?>"><?php echo html_escape($value->teamplate); ?></td>
                                
                                <td width="70">
                                    <a data-id="<?php echo $value->teamplate_id;?>" class="edit btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i> </a>
                                    <a  class="btn btn-xs btn-danger" href="<?php echo base_url();?>sms/sms_setup_controller/delete_teamplate/<?php echo $value->teamplate_id ;?>" onclick="return confirm('Are you want to delelte?');">
                                    <i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
   <script src="<?php echo base_url('assets/js/admin/smsTemplate.js') ?>" type="text/javascript"></script>