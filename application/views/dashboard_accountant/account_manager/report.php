<div class="row">

    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body"> 
                <input type="hidden" name="get_report_option" id="get_report_option" value="<?php echo $this->input->get("report_option") ?>">
                <form class="form-inline" action="<?php echo base_url('dashboard_accountant/account_manager/report/index') ?>">

                    <div class="form-group">
                        <?php
                            $ReportOption = array(
                                ''  => display('select_option'),
                                '1' => display('all'),
                                '2' => display('patient_wise'), 
                            );
                            echo form_dropdown('report_option',$ReportOption, html_escape($date->report_option), 'class="form-control" id="ReportOption"' );

                        ?>
                    </div> 

                    <div class="form-group hide" id="PatientWise">
                        <label class="sr-only" for="patient_id"><?php echo display('patient_id') ?></label>
                        <input type="text" name="patient_id" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?php echo html_escape($date->patient_id) ?>">
                    </div> 

                    <div class="form-group">
                        <label class="sr-only" for="start_date"><?php echo display('start_date') ?></label>
                        <input type="text" name="start_date" class="form-control datepicker" id="start_date" placeholder="<?php echo display('start_date') ?>" value="<?php echo html_escape($date->start_date) ?>">
                    </div> 

                    <div class="form-group">
                        <label class="sr-only" for="end_date"><?php echo display('end_date') ?></label>
                        <input type="text" name="end_date" class="form-control datepicker" id="end_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo html_escape($date->end_date) ?>">
                    </div>  

                    <button type="submit" class="btn btn-success"><?php echo display('filter') ?></button>

                </form>

            </div>
        </div>
    </div>
 
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="acmReport">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('total') ?>
                            <th><?php echo display('vat') ?></th></th>
                            <th><?php echo display('discount') ?></th></th>
                            <th><?php echo display('grand_total') ?></th></th>
                            <th><?php echo display('paid') ?></th></th>
                            <th><?php echo display('due') ?></th></th>
                        </tr>
                    </thead>
                <tfoot>
                    <tr>
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                        <th></th>   
                    </tr>
                </tfoot>

                    <tbody>
                        <?php 
                        if (!empty($invoice)) {
                            $sl = 1;
                            foreach ($invoice as $value) {
                        ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo html_escape(date('d-m-Y', strtotime($value->date))); ?></td>
                                <td><?php echo html_escape($value->patient_id); ?></td>
                                <td><?php echo html_escape(sprintf('%0.2f', $value->total)); ?></td>
                                <td><?php echo html_escape(sprintf('%0.2f', $value->vat)); ?></td>
                                <td><?php echo html_escape(sprintf('%0.2f', $value->discount)); ?></td>
                                <td><?php echo html_escape(sprintf('%0.2f', $value->grand_total)); ?></td>
                                <td><?php echo  html_escape(sprintf('%0.2f', $value->paid)); ?></td>
                                <td><?php echo html_escape(sprintf('%0.2f', $value->due)); ?></td>
                            </tr>
                        <?php 
                            $sl++;

                            } 
                        } 
                        ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/admin/account/reports.js') ?>" type="text/javascript"></script>