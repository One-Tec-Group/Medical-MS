<div class="row">
 
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null) ?>"> <i class="fa fa-list"></i>  <?php echo display('report') ?> </a> 
                </div>
            </div> 
            <div class="panel-body">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="reportDetails">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('bed_type') ?></th>
                            <th><?php echo display('description') ?></th>
                            <th><?php echo display('charge') ?></th> 
                            <th><?php echo display('assign_date') ?></th>
                            <th><?php echo display('discharge_date') ?></th>
                            <th><?php echo display('assign_by') ?></th>
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
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php if (!empty($beds)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($beds as $bed) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($bed->patient_id); ?></td>
                                    <td><?php echo html_escape($bed->bed_name); ?></td>
                                    <td><?php echo html_escape(character_limiter($bed->bed_description, 60)); ?></td>
                                    <td><?php echo html_escape($bed->charge); ?></td>
                                    <td><?php echo html_escape($bed->assign_date); ?></td>
                                    <td><?php echo html_escape($bed->discharge_date); ?></td>
                                    <td><?php echo html_escape($bed->assign_by); ?></td> 
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/admin/nurse/reports.js') ?>" type="text/javascript"></script>