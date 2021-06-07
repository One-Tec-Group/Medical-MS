<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd billing-panel ">

            <div class="panel-heading no-print row">
                <div class="col-md-4 col-xs-12">
                    <div class="btn-group"><a class="btn btn-primary" href="<?php echo base_url("billing/bill") ?>"> <i class="fa fa-list"></i>  <?php echo display('bill_list') ?> </a> </div>
                    <div class="btn-group"><a class="btn btn-success" href="<?php echo base_url("billing/bill/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_bill') ?> </a></div>
                </div>
                <h2 class="col-md-8 col-xs-12 text-left text-success"><?php echo display('update_bill') ?></h2>
            </div> 
 
            <div class="panel-body">

            <?php echo form_open('billing/bill/edit/'.html_escape($bill->bill_id), array('class'=>'billig-form')) ?>
            <?php echo form_hidden('id', html_escape($bill->id)) ?>
            <?php echo form_hidden('bill_id', html_escape($bill->bill_id)) ?>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="admission_id" value="<?php echo html_escape($bill->admission_id); ?>" name="admission_id" placeholder="<?php echo display('admission_id') ?>" readonly/>
                                            <span class="input-group-btn"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="patient_id" value="<?php echo html_escape($bill->patient_id); ?>" placeholder="<?php echo display('patient_id') ?>" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input name="bill_date" type="text" class="form-control datepicker" id="bill_date"  placeholder="<?php echo display('bill_date') ?>" value="<?php echo html_escape($bill->bill_date); ?>" required/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="patient_name" placeholder="<?php echo display('patient_name') ?>" value="<?php echo html_escape($bill->patient_name); ?>" disabled/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="date_of_birth" placeholder="<?php echo display('date_of_birth') ?>" value="<?php echo html_escape($bill->date_of_birth) ?>" disabled/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="<?php echo display('address') ?>" id="address" disabled><?php echo html_escape($bill->address); ?></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group row">
                                    <label for="sex" class="col-sm-4 col-md-2 col-form-label"><?php echo display('sex') ?></label>
                                    <div id="sex" class="col-sm-8 col-md-10">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="male"  disabled <?php echo ((html_escape($bill->sex)=="Male")?"checked":"") ?>>
                                            <label for="male"><?php echo display('male') ?></label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="female" <?php echo ((html_escape($bill->sex)=="Female")?"checked":"") ?>  disabled>
                                            <label for="female"><?php echo display('female') ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="doctor_name"  placeholder="<?php echo display('doctor_name') ?>" value="<?php echo $bill->doctor_name ?>" disabled/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="avatar-img center-block">
                            <img id="picture" src="<?php echo (!empty($bill->picture)?base_url(html_escape($bill->picture)):base_url('assets/images/staff.png')) ?>" class="img-responsive img-hw-200" alt="">
                        </div> 
                    </div>
                </div>

                <!--<hr>-->
                <div class="form-horizontal">
                    <div class="row"> 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="admission_date" class="col-sm-4 col-form-label"><?php echo display('admission_date') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo html_escape($bill->admission_date); ?>" placeholder="<?php echo display('admission_date') ?>" id="admission_date" disabled>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="package_name" class="col-sm-4 col-form-label"><?php echo display('package_name') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="package_name" type="text" value="<?php echo html_escape($bill->package_name); ?>" placeholder="<?php echo display('package_name') ?>" id="package_name" disabled>
                                    <input name="package_id" type="hidden" id="package_id"  value="<?php echo html_escape($bill->package_id); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="total_days" class="col-sm-4 col-form-label"><?php echo display('total_days') ?><br/>&nbsp;</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text"  placeholder="<?php echo display('total_days') ?>" value="<?php echo html_escape($bill->total_days); ?>" id="total_days" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="discharge_date" class="col-sm-4 col-form-label"><?php echo display('discharge_date') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo html_escape($bill->discharge_date); ?>" placeholder="<?php echo display('discharge_date') ?>" id="discharge_date" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="insurance_name" class="col-sm-4 col-form-label"><?php echo display('insurance_name') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo html_escape($bill->insurance_name); ?>" placeholder="<?php echo display('insurance_name') ?>" id="insurance_name" disabled>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="policy_no" class="col-sm-4 col-form-label"><?php echo display('policy_no') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo html_escape($bill->policy_no) ?>" placeholder="<?php echo display('policy_no') ?>" id="policy_no" disabled>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

 
                <div id="parentx" class="table-responsive">
                    <table id="fixTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="100"><i class="fa fa-cogs"></i></th>
                                <th><?php echo display('service_name') ?></th>
                                <th><?php echo display('quantity') ?></th>
                                <th><?php echo display('rate') ?></th>
                                <th><?php echo display('subtotal') ?></th>
                            </tr>
                        </thead>
                        <tbody id="services">
                           <?php 
                            $subtotal = "0.00"; 
                            $sl = 1;  
                            foreach($services as $service)
                            {  
                                $subtotal+=($service->quantity*$service->amount); 
                            ?>
                            <tr>
                                <td>
                                    <div class="btn btn-group">
                                        <button type="button" class="addMore btn btn-sm btn-success">+</button>
                                        <button type="button" class="remove btn btn-sm btn-danger">-</button>
                                    </div>
                                </td>
                                <td>
                                    <input name="service_name[]" class="form-control service_name service_data" type="text" placeholder="<?php echo display('service_name') ?>" value="<?php echo html_escape($service->name); ?>" required><input name="service_id[]" type="hidden" class="service_id" value="<?php echo html_escape($service->id); ?>" required>
                                </td>
                                <td>
                                    <input name="quantity[]" class="form-control quantity item-calc" type="number" placeholder="<?php echo display('quantity') ?>" value="<?php echo html_escape($service->quantity); ?>" required>
                                </td>
                                <td>
                                    <input name="amount[]" class="form-control amount item-calc" type="number" placeholder="<?php echo display('amount') ?>"  value="<?php echo html_escape($service->amount); ?>"  required>
                                </td>
                                <td>
                                    <input name="subtotal[]" class="form-control subtotal" type="number" placeholder="<?php echo display('subtotal') ?>"  value="<?php echo html_escape(($service->quantity*$service->amount)); ?>" required>
                                </td>
                            </tr>
                            <?php
                            } 
                            ?> 
                        </tbody>
                    </table>
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <h3 class="block-title-2"><?php echo display('advance_payment') ?></h3>
                        <div class="table-responsive table-height">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo display('date') ?></th>
                                        <th><?php echo display('receipt_no') ?></th>
                                        <th><?php echo display('amount') ?></th>
                                    </tr>
                                </thead>
                                <tbody id="advance_data"> 
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



                    <div class="col-sm-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-md-4 col-form-label"><?php echo display('payment_method') ?></label>
                            <div class="col-sm-8 col-md-8">
                                <?php 
                                    $paymentList = array(
                                        ''    => display('select_option'),
                                        'Cash'=>display('cash'),
                                        'Card'=>display('card'),
                                        'Cheque'=>display('cheque'),
                                    );
                                    echo form_dropdown('payment_method', $paymentList, html_escape($bill->payment_method), array('class'=>'form-control basic-single', 'required'=>'required'));
                                ?>  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="card_cheque_no" class="col-sm-4 col-md-4 col-form-label"><?php echo display('card_cheque_no') ?></label>
                            <div class="col-sm-8 col-md-8">
                                <input name="card_cheque_no" value="<?php echo html_escape($bill->card_cheque_no); ?>" class="form-control" type="text" id="card_cheque_no" placeholder="<?php echo display('card_cheque_no') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="receipt_no" class="col-sm-4 col-md-4 col-form-label"><?php echo display('receipt_no') ?></label>
                            <div class="col-sm-8 col-md-8">
                                <input name="receipt_no" class="form-control" type="text" value="<?php echo html_escape($bill->receipt_no); ?>" id="receipt_no" placeholder="<?php echo display('receipt_no') ?>">
                            </div>
                        </div> 
                    </div>



                    <div class="col-sm-4">
                        <div class="table-responsive m-b-20">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo display('total') ?></th>
                                        <th><?php echo display('receipt') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo display('total') ?></td>
                                        <td><input name="total" type="text" class="form-control grand-calc" id="total" value="<?php echo html_escape(sprintf("%.2f",(isset($subtotal)?$subtotal:"0.00"))) ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                              <div class="input-group-addon"><?php echo display('discount') ?> %</div>
                                              <input type="number" id="discountPercent" required="" autocomplete="off" class="form-control tax-discount-calc" value="<?php echo html_escape(sprintf("%.2f",(($bill->discount/$subtotal)*100))) ?>">
                                            </div>
                                        </td>
                                        <td><input name="discount" type="number" class="form-control grand-calc" id="discount" value="<?php echo html_escape(sprintf("%.2f", $bill->discount)) ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                              <div class="input-group-addon"><?php echo display('tax') ?> %</div>
                                              <input type="number" id="taxPercent" required="" autocomplete="off" class="form-control tax-discount-calc" value="<?php echo html_escape(sprintf("%.2f", (($bill->tax/$subtotal)*100))) ?>">
                                            </div>
                                        </td>
                                        <td><input name="tax" type="number" class="form-control grand-calc" id="tax" value="<?php echo html_escape(sprintf("%.2f", $bill->tax)) ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo display('pay_advance') ?></td>
                                        <td><input type="text" class="form-control grand-calc" id="pay_advance" value="<?php echo html_escape(sprintf("%.2f", (isset($pay_advance)?$pay_advance:"0.00"))) ?>"></td> 
                                    </tr>
                                    <tr>
                                        <td><?php echo display('payable') ?></td>
                                        <td><input type="number" class="form-control grand-calc" id="payable" value="<?php echo html_escape(sprintf("%.2f", ($subtotal-$bill->discount+$bill->tax-$pay_advance))) ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <textarea name="note" class="form-control" rows="5" placeholder="<?php echo display('notes') ?>"><?php echo html_escape($bill->note); ?></textarea>
                </div> 


                <div class="form-group">
                    <div class="form-check">
                        <label class="radio-inline"><input type="radio" name="status" value="0" <?php echo ((html_escape($bill->status)==0)?"checked":null) ?>><?php echo display('unpaid') ?></label>
                        <label class="radio-inline"><input type="radio" name="status" value="1" <?php echo ((html_escape($bill->status)==1)?"checked":null) ?>><?php echo display('paid') ?></label>
                    </div>
                </div> 


                <div class="panel-footer text-center"> 
                    <button type="submit" class="btn btn-success w-md"><?php echo display('update') ?></button>
                </div>

            <?php echo form_close() ?>
            </div>

        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/admin/billing/bill.js') ?>" type="text/javascript"></script>