<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">

            <div class="panel-heading no-print row">
                <div class="col-md-4 col-xs-12"> 
                    <div class="btn-group"> <a class="btn btn-primary" href="<?php echo base_url("billing/bill") ?>"> <i class="fa fa-list"></i>  <?php echo display('bill_list') ?> </a> </div>
                     <div class="btn-group"><a class="btn btn-success" href="<?php echo base_url("billing/bill/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_bill') ?> </a></div>
                      <div class="btn-group"><button onclick="printContent('printMe')" type="button" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo display("print") ?></button></div>
                </div>
                <h2 class="col-md-8 col-xs-12 text-left text-success"><?php echo display('bill_details') ?></h2>
            </div>  

            <div class="panel-body" id="printMe">
                <div class="row">
                    <div class="col-xs-6 logo_bar">
                        <img src="<?php echo base_url("$website->logo") ?>" class="img-responsive" alt=""></br>
                        <?php echo display('phone') ?>: <?php echo html_escape($website->phone); ?></br>
                        <?php echo display('email') ?>: <?php echo html_escape($website->email); ?>
                        <br>
                    </div>
                    <div class="col-xs-6 address_bar">
                        <div class="address_inner">
                            <address>
                                <strong><?php echo display('address') ?></strong><br>
                                <strong><?php echo html_escape($website->title); ?></strong><br>
                                <?php echo html_escape($website->description); ?>
                            </address>
                        </div>
                    </div>
                </div> <hr>
                <!-- Patient Info -->
                <div class="row patient_info">
                    <table class="info">
                        <tbody>
                            <tr>
                                <td><?php echo display('admission_id'); ?>:</td>
                                <td><?php echo html_escape($bill->admission_id); ?></td>
                                <td><?php echo display('bill_date'); ?>:</td>
                                <td><?php echo html_escape($bill->bill_date); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('patient_id'); ?>:</td>
                                <td><?php echo html_escape($bill->patient_id); ?></td>
                                <td><?php echo display('date_of_birth'); ?>:</td>
                                <td><?php echo html_escape($bill->date_of_birth); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('patient_name'); ?>:</td>
                                <td><?php echo html_escape($bill->patient_name); ?></td>
                                <td><?php echo display('sex'); ?>:</td>
                                <td><?php echo html_escape($bill->sex); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('address'); ?>:</td>
                                <td><?php echo html_escape($bill->address); ?></td>
                                <td><?php echo display('doctor_name'); ?>:</td>
                                <td><?php echo html_escape($bill->doctor_name); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Patient Package -->
                <div class="patient_package">
                    <table class="package">
                        <tbody>
                            <tr>
                                <td><?php echo display('admission_date'); ?>:</td>
                                <td><?php echo html_escape($bill->admission_date); ?></td>
                                <td><?php echo display('package_name'); ?>:</td>
                                <td><?php echo html_escape($bill->package_name); ?></td>
                                <td><?php echo display('total_days'); ?>:</td>
                                <td><?php echo html_escape($bill->total_days); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('discharge_date'); ?>:</td>
                                <td><?php echo html_escape($bill->discharge_date); ?></td>
                                <td><?php echo display('insurance_name'); ?>:</td>
                                <td><?php echo html_escape($bill->insurance_name); ?></td>
                                <td><?php echo display('policy_no'); ?>:</td>
                                <td><?php echo html_escape($bill->policy_no); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Patient Charge -->
                <div class="patient_charge">
                    <table class="charge">
                        <thead>
                            <tr>
                                <th><?php echo display('serial'); ?></th>
                                <th><?php echo display('service_name'); ?></th>
                                <th><?php echo display('quantity'); ?></th>
                                <th><?php echo display('rate'); ?></th>
                                <th><?php echo display('subtotal'); ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $subtotal = "0.00"; 
                        $sl = 1; 
                        foreach($services as $service)
                        {  
                            $subtotal+=($service->quantity*$service->amount);
                        ?>
                        <tr>
                            <td class="description">
                                <p><?php echo $sl++; ?></p> 
                            </td>
                            <td class="description">
                                <p><?php echo html_escape($service->name); ?></p> 
                            </td>
                            <td class="charge">
                                <p><?php echo html_escape($service->quantity); ?></p> 
                            </td>
                            <td class="discount">
                                <p><?php echo html_escape($service->amount); ?></p> 
                            </td>
                            <td class="ballance">
                                <p><?php echo html_escape(($service->quantity*$service->amount)); ?></p> 
                            </td>
                        </tr>
                        <?php
                        } 
                        ?> 
                        </tbody> 
                    </table>
                </div>
                
                <div class="row">
                    <div class="col-md-4 col-xs-12 m-t-10">
                        <div class="advance_payment"> 
                            <table class="payment">
                                <thead>
                                    <tr>
                                        <th colspan="3"><h4><?php echo display('advance_payment'); ?></h4></th> 
                                    </tr>
                                    <tr>
                                        <th><?php echo display('date'); ?></th>
                                        <th><?php echo display('receipt_no'); ?></th>
                                        <th><?php echo display('amount'); ?></th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <?php  
                                    $pay_advance = "0.00";
                                    foreach($advance as $adv)
                                    {
                                    $pay_advance+=$adv->amount;
                                    ?>
                                    <tr>
                                        <td><?php echo html_escape($adv->date); ?></td>
                                        <td><?php echo html_escape($adv->receipt_no); ?></td>
                                        <td><?php echo html_escape($adv->amount); ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 m-t-10">
                        <table class="payment">
                            <thead>
                                <tr>
                                    <th><?php echo display('payment_method'); ?></th>
                                    <th><?php echo html_escape($bill->payment_method); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo display('card_cheque_no'); ?></td>
                                    <td><?php echo html_escape($bill->card_cheque_no); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo display('receipt_no'); ?></td>
                                    <td><?php echo html_escape($bill->receipt_no); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-xs-12 m-t-10">
                        <table class="payment">
                            <thead>
                                <tr>
                                    <td><?php echo display('total'); ?></td>
                                    <th><?php echo html_escape(sprintf("%.2f", (isset($subtotal)?$subtotal:"0.00"))); ?></th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr> 
                                    <td><?php echo display('discount'); ?> (<?php echo html_escape(sprintf("%.2f", (($bill->discount/$subtotal)*100))); ?>%)</td>
                                    <td><?php echo html_escape(sprintf("%.2f", $bill->discount)); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo display('tax'); ?> (<?php echo html_escape(sprintf("%.2f", (($bill->tax/$subtotal)*100))); ?>%)</td>
                                    <td><?php echo html_escape(sprintf("%.2f", $bill->tax)); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo display('pay_advance'); ?></td>
                                    <td><?php echo html_escape(sprintf("%.2f", (isset($pay_advance)?$pay_advance:"0.00"))); ?></td>
                                </tr> 
                            </tbody>
                            <thead>
                                <tr>
                                    <td><?php echo display('payable'); ?></td>
                                    <th><?php echo html_escape(sprintf("%.2f", ($subtotal-$bill->discount+$bill->tax-$pay_advance),2)); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="my_sign">
                    <span>___________________________</span>
                    <p><?php echo display('signature'); ?></p>
                </div>
            </div> 
        </div>
    </div>
</div>
