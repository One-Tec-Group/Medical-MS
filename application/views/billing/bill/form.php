<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd billing-panel ">

            <div class="panel-heading no-print row">
                <div class="btn-group col-md-4 col-xs-12"> 
                    <a class="btn btn-primary" href="<?php echo base_url("billing/bill") ?>"> <i class="fa fa-list"></i>  <?php echo display('bill_list') ?> </a>  
                </div>
                <h2 class="col-md-8 col-xs-12 text-left text-success"><?php echo display('add_bill') ?></h2>
            </div> 
 
            <div class="panel-body">
            <?php echo form_open('billing/bill/form', array('class'=>'billig-form')) ?>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="admission_id" value="" name="admission_id" placeholder="<?php echo display('admission_id') ?>" required/>
                                            <span class="input-group-btn"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="patient_id" value="" placeholder="<?php echo display('patient_id') ?>" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input name="bill_date" type="text" class="form-control datepicker" id="bill_date"  placeholder="<?php echo display('bill_date') ?>" required/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="patient_name" placeholder="<?php echo display('patient_name') ?>" disabled/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="date_of_birth" placeholder="<?php echo display('date_of_birth') ?>" disabled/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="<?php echo display('address') ?>" id="address" disabled></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group row">
                                    <label for="sex" class="col-sm-4 col-md-2 col-form-label"><?php echo display('sex') ?></label>
                                    <div id="sex" class="col-sm-8 col-md-10">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="male"  disabled>
                                            <label for="male"><?php echo display('male') ?></label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="female" disabled>
                                            <label for="female"><?php echo display('female') ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="doctor_name"  placeholder="<?php echo display('doctor_name') ?>" disabled/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="avatar-img center-block">
                            <img id="picture" src="<?php echo base_url('assets/images/staff.png') ?>"  class="img-responsive img-hw-200" alt="">
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
                                    <input class="form-control" type="text" value="" placeholder="<?php echo display('admission_date') ?>" id="admission_date" disabled>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="package_name" class="col-sm-4 col-form-label"><?php echo display('package_name') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="package_name" type="text" value="" placeholder="<?php echo display('package_name') ?>" id="package_name" disabled>
                                    <input name="package_id" type="hidden" id="package_id">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="total_days" class="col-sm-4 col-form-label"><?php echo display('total_days') ?><br/>&nbsp;</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text"  placeholder="<?php echo display('total_days') ?>" id="total_days" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="discharge_date" class="col-sm-4 col-form-label"><?php echo display('discharge_date') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="<?php echo display('discharge_date') ?>" id="discharge_date" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="insurance_name" class="col-sm-4 col-form-label"><?php echo display('insurance_name') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="<?php echo display('insurance_name') ?>" id="insurance_name" disabled>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="policy_no" class="col-sm-4 col-form-label"><?php echo display('policy_no') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="<?php echo display('policy_no') ?>" id="policy_no" disabled>
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
                                    echo form_dropdown('payment_method', $paymentList, null, array('class'=>'form-control basic-single', 'required'=>'required'));
                                ?>  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="card_cheque_no" class="col-sm-4 col-md-4 col-form-label"><?php echo display('card_cheque_no') ?></label>
                            <div class="col-sm-8 col-md-8">
                                <input name="card_cheque_no" class="form-control" type="text" id="card_cheque_no" placeholder="<?php echo display('card_cheque_no') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="receipt_no" class="col-sm-4 col-md-4 col-form-label"><?php echo display('receipt_no') ?></label>
                            <div class="col-sm-8 col-md-8">
                                <input name="receipt_no" class="form-control" type="text" value="" id="receipt_no" placeholder="<?php echo display('receipt_no') ?>">
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
                                        <td><input name="total" type="number" class="form-control grand-calc" id="total" value="0.00"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                              <div class="input-group-addon"><?php echo display('discount') ?> %</div>
                                              <input type="number" id="discountPercent" required="" autocomplete="off" class="form-control tax-discount-calc" value="0">
                                            </div>
                                        </td>
                                        <td><input name="discount" type="number" class="form-control grand-calc" id="discount" value="0.00"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                              <div class="input-group-addon"><?php echo display('tax') ?> %</div>
                                              <input type="number" id="taxPercent" required="" autocomplete="off" class="form-control tax-discount-calc" value="0">
                                            </div>
                                        </td>
                                        <td><input name="tax" type="number" class="form-control grand-calc" id="tax" value="0.00"></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo display('pay_advance') ?></td>
                                        <td><input type="number" class="form-control grand-calc" id="pay_advance" value="0.00"></td> 
                                    </tr>
                                    <tr>
                                        <td><?php echo display('payable') ?></td>
                                        <td><input type="number" class="form-control grand-calc" id="payable" value="0.00"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <textarea name="note" class="form-control" rows="5" placeholder="<?php echo display('notes') ?>"></textarea>
                </div> 


                <div class="form-group">
                    <div class="form-check">
                        <label class="radio-inline"><input type="radio" name="status" value="0" checked><?php echo display('unpaid') ?></label>
                        <label class="radio-inline"><input type="radio" name="status" value="1"><?php echo display('paid') ?></label>
                    </div>
                </div> 


                <div class="panel-footer text-center"> 
                    <button type="submit" class="btn btn-success w-md"><?php echo display('save') ?></button>
                </div>

            <?php echo form_close() ?>
            </div>

        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/admin/billing/bill.js') ?>" type="text/javascript"></script>