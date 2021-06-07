<div class="row">

    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body"> 

                <form class="form-inline" action="<?php echo base_url('dashboard_doctor/bed_manager/report/index') ?>">

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
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="bmReport">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('assign_date') ?></th>
                            <th><?php echo display('bed_type') ?></th>
                            <th><?php echo display('bed_limit') ?></th>
                            <th><?php echo display('charge') ?></th>
                            <th><?php echo display('allocated') ?></th>
                            <th><?php echo display('amount') ?></th>
                            <th><?php echo display('free_now') ?></th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th></th> 
                            <th></th> 
                            <th></th> 
                            <th></th> 
                            <th class="text-center"></th> 
                            <th class="text-center"></th> 
                            <th class="text-center"></th> 
                            <th></th> 
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php if (!empty($result)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($result as $value) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($value->assign_date); ?></td>
                                    <td><?php echo html_escape($value->type); ?></td>
                                    <td><?php echo html_escape($value->limit); ?></td>
                                    <td><?php echo html_escape($value->charge); ?></td>
                                    <td><a href="<?php echo base_url() ?>dashboard_doctor/bed_manager/report/details?assign_date=<?php echo $value->assign_date; ?>&bed_id=<?php echo html_escape($value->bed_id); ?>" title="Click Me!"><?php echo html_escape($value->allocated); ?></a></td>
                                    <td><?php echo html_escape(number_format($value->charge * $value->allocated, 2)); ?></td>
                                    <td>
                                        <?php echo html_escape(($value->limit - $value->allocated)); ?></td>
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
<script src="<?php echo base_url('assets/js/admin/doctor/bed.js') ?>" type="text/javascript"></script>