<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail"> 

            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("dashboard_patient/document/document") ?>"> <i class="fa fa-list"></i>  <?php echo display('document_list') ?> </a>  
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div id="output" class="hide alert"></div>

                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open_multipart('dashboard_patient/document/document/form','class="form-inner" id="mailForm" ') ?>

                            <div class="form-group row">
                                <label for="attach_file" class="col-xs-3 col-form-label"><?php echo display('attach_file') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input type="file" name="attach_file" id="attach_file">

                                    <input type="hidden" name="hidden_attach_file" id="hidden_attach_file" value="<?php echo html_escape($document->hidden_attach_file) ?>">

                                    <p id="upload-progress" class="hide alert"></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="doctor_id" class="col-xs-3 col-form-label"><?php echo display('doctor_name') ?></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('doctor_id',html_escape($doctor_list),$document->doctor_id,'class="form-control" id="doctor_id"') ?>
                                    <div id="available_days"></div>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="form-control tinymce"  placeholder="<?php echo display('description') ?>"  rows="7"><?php echo html_escape($document->description) ?></textarea>
                                </div>
                            </div>  
 

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('send') ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?php echo base_url('assets/js/admin/patient/document.js') ?>" type="text/javascript"></script>