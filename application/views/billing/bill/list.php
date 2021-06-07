<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("billing/bill/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_bill') ?> </a>  
                </div>
            </div>
            <div class="panel-body">
                <table id="billList" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr> 
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('patient_name') ?></th>
                            <th><?php echo display('admission_id') ?></th>
                            <th><?php echo display('bill_id') ?></th>
                            <th><?php echo display('bill_date') ?></th>
                            <th><?php echo display('total') ?></th>
                            <th><?php echo display('discount') ?></th> 
                            <th><?php echo display('tax') ?></th>
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th>
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
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (!empty($bills)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($bills as $bill) { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($bill->patient_name); ?></td>
                                    <td><?php echo html_escape($bill->admission_id); ?></td>
                                    <td><?php echo html_escape($bill->bill_id); ?></td>
                                    <td><?php echo html_escape($bill->bill_date); ?></td>
                                    <td><?php echo html_escape($bill->total); ?></td>
                                    <td><?php echo html_escape($bill->discount); ?></td>
                                    <td><?php echo html_escape($bill->tax); ?></td>

                                    <td><?php echo ((html_escape($bill->status)==1)?"<span class=\"label labe-xs label-success\">".display('paid')."</span>":"<span class=\"label labe-xs label-danger\">".display('unpaid')."</span>"); ?></td>

                                    <td class="center">
                                        <a href="<?php echo base_url("billing/bill/view/$bill->bill_id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-eye"></i></a> 
                                        <a href="<?php echo base_url("billing/bill/edit/$bill->bill_id") ?>" class="btn btn-xs  btn-warning"><i class="fa fa-edit"></i></a> 
                                        <a href="<?php echo base_url("billing/bill/delete/$bill->bill_id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
                <?php echo (!empty($links)?html_escape($links):null); ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/admin/billing/bill.js') ?>" type="text/javascript"></script>