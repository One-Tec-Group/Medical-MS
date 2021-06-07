<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard_accountant/account_manager/invoice") ?>"> <i class="fa fa-list"></i>  <?php echo display('invoice_list') ?> </a>  
                </div>
            </div> 

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 table-responsive">
                        <?php echo form_open('dashboard_accountant/account_manager/invoice/edit/'.$invoice->id) ?> 
                        <?php echo form_hidden('id',$invoice->id) ?>
                        <table class="table table-striped">
                            <tfoot>
                                <tr>  
                                    <th width="40%">
                                        <ul class="list-unstyled"> 
                                            <li>
                                                <strong><?php echo display('patient_id') ?></strong>
                                                <input type="text" required name="patient_id" id="patient_id" class="invoice-input" value="<?php echo html_escape($invoice->patient_id); ?>">
                                                <p class="text-center text-danger  invlid_patient_id" 
                                                ></p>
                                            </li>   
                                            <li><strong><?php echo display('full_name') ?></strong>
                                                <input type="text" class="invoice-input" id="patient_name" value="<?php echo html_escape($invoice->firstname.' '.$invoice->lastname)?>">
                                            </li>  
                                            <li> 
                                            <strong><?php echo display('address') ?>&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                                                <input type="text" class="invoice-input" id="patient_address" value="<?php echo html_escape($invoice->address); ?>">
                                            </li>  
                                        </ul>
                                    </th>  
                                    <th width="20%" class="text-center"> 
                                        <strong class="text-border"><?php echo display('invoice') ?></strong> 
                                    </th>  
                                    <th width="40%">
                                        <h4>
                                            <?php echo display('date') ?> :  
                                            <input type="text" name="date" required class="datepicker invoice-input" value="<?php echo html_escape(date('d-m-Y', strtotime($invoice->date))); ?>"> <br>
                                            <?php echo html_escape($website->title); ?><br> 
                                            <?php echo html_escape($website->description); ?>
                                        </h4>
                                    </th> 
                                </tr>
                            </tfoot>
                        </table>



                        <table id="invoice" class="table table-striped"> 
                            <thead>
                                <tr class="bg-primary">
                                    <th><?php echo display('account_name') ?></th>
                                    <th><?php echo display('description') ?></th>
                                    <th width="50"><?php echo display('quantity') ?></th>
                                    <th width="120"><?php echo display('price') ?></th>
                                    <th width="120"><?php echo display('subtotal') ?></th>  
                                    <th width="160"><?php echo display('add_or_remove') ?></th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(!empty($invoice_data)) { 
                                foreach ($invoice_data as $value) { 
                                ?>
                                <tr>
                                    <td>
                                        <?php echo form_dropdown('account_id[]', $debit_account_list, $value->account_id , 'class="dont-select-me form-control" required'); ?>
                                    </td> 
                                    <td><textarea name="description[]" class="form-control" placeholder="<?php echo display('description') ?>"><?php echo html_escape($value->description) ?></textarea></td> 
                                    <td><input type="number" name="quantity[]" required autocomplete="off" class="totalCal form-control" placeholder="<?php echo display('quantity') ?>" value="<?php echo html_escape($value->quantity) ?>" ></td>  
                                    <td><input type="number" name="price[]" required autocomplete="off" class="totalCal form-control" placeholder="<?php echo display('price') ?>" value="<?php echo html_escape($value->price) ?>"></td>  
                                    <td><input type="number" name="subtotal[]" required readonly autocomplete="off" class="subtotal form-control" placeholder="<?php echo display('subtotal') ?>" value="<?php echo html_escape($value->subtotal); ?>"></td>   

                                    <td>
                                      <div class="btn btn-group">
                                        <button type="button" class="btn btn-sm btn-primary addBtn"><?php echo display('add') ?></button>
                                        <button type="button" class="btn btn-sm btn-danger removeBtn"><?php echo display('remove') ?></button>
                                        </div>
                                    </td>   
                                </tr>  
                                <?php 
                                } 
                                } 
                                ?>
                            </tbody>
                            <tfoot> 
                                <tr class="bg-info">  
                                    <td colspan="3"></td> 
                                    <th class="text-right"><?php echo display('total') ?></th>  
                                    <th><input type="text" name="total" id="total" class="form-control" readonly required placeholder="<?php echo display('total') ?>"  value="<?php echo html_escape($invoice->total); ?>"></th>  
                                    <td></td> 
                                </tr>
                                <tr>  
                                    <th colspan="3" class="text-right"><?php echo display('vat') ?></th> 
                                    <td>
                                        <div class="input-group">
                                          <div class="input-group-addon">%</div>
                                          <input type="number" id="vatParcent" required autocomplete="off"  class="form-control vatP" value="0">
                                        </div>
                                    </td> 
                                    <td><input type="number" name="vat" id="vat" required autocomplete="off"  class="vatDiscount paidDue form-control" placeholder="<?php echo display('vat') ?>" value="<?php echo html_escape($invoice->vat); ?>"></td>  
                                    <td></td> 
                                </tr>
                                <tr>  
                                    <th colspan="3" class="text-right"><?php echo display('discount') ?></th> 
                                    <td>
                                        <div class="input-group">
                                          <div class="input-group-addon">%</div>
                                          <input type="number" id="discountParcent" required autocomplete="off" class=" form-control discountP" value="0">
                                        </div>
                                    </td> 

                                    <td><input type="number" name="discount" required autocomplete="off" id="discount" class="vatDiscount paidDue form-control" placeholder="<?php echo display('discount') ?>"  value="<?php echo html_escape($invoice->discount) ?>"></td> 
                                    <td></td>  
                                </tr> 
                                <tr class="bg-success">  
                                    <td colspan="3"></td>  
                                    <th class="text-right"><?php echo display('grand_total') ?></th>  
                                    <th><input type="number" name="grand_total" readonly required autocomplete="off"  id="grand_total" class="paidDue form-control" placeholder="<?php echo display('grand_total') ?>" value="<?php echo html_escape($invoice->grand_total) ?>"></th> 
                                    <td></td>  
                                </tr>
                                <tr>  
                                    <td colspan="3"></td>  
                                    <th class="text-right"><?php echo display('paid') ?></th>
                                    <td><input type="number" name="paid" id="paid" autocomplete="off"  class="paidDue form-control" required placeholder="<?php echo display('paid') ?>"  value="<?php echo html_escape($invoice->paid) ?>"></td> 
                                    <td></td>  
                                </tr>
                                <tr class="bg-danger">  
                                    <td colspan="3"></td>  
                                    <th class="text-right"><?php echo display('due') ?></th> 
                                    <td><input type="number" name="due" id="due" autocomplete="off" class="paidDue form-control" required placeholder="<?php echo display('due') ?>" value="<?php echo html_escape($invoice->due) ?>"></td> 
                                    <td></td>  
                                </tr>
                                <tr>  
                                    <td colspan="3">
                                        <div class="form-group row">
                                            <label class="col-xs-3"><?php echo display('status') ?></label>
                                            <div class="col-xs-9"> 
                                                <div class="form-check">
                                                    <label class="radio-inline"><input type="radio" name="status" value="1" checked><?php echo display('active') ?></label>
                                                    <label class="radio-inline"><input type="radio" name="status" value="0"><?php echo display('inactive') ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>  
                                    <td><button type="reset" class="btn btn-info btn-block"><?php echo display('reset') ?></button></td>  
                                    <td><button class="btn btn-success btn-block"><?php echo display('update') ?></button></td>  
                                    <td></td> 
                                </tr>
                            </tfoot>
                        </table>  
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/admin/d_accountant/invoice.js') ?>" type="text/javascript"></script>