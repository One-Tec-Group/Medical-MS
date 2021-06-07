<div class="row">
    <!--  form area -->
    <div class="col-sm-12"  id="PrintMe">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("prescription/prescription") ?>"> <i class="fa fa-list"></i>  <?php echo display('prescription_list') ?> </a>  
                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger" ><i class="fa fa-print"></i></button> 
                </div>
            </div> 

            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">

                        <!-- Headline -->
                        <table class="table">
                            <thead>
                                <tr  class="bg-primary">
                                    <td>
                                        <strong><?php echo display('patient_id') ?></strong>: <?php echo html_escape($prescription->patient_id); ?>, 
                                        <strong>App ID</strong>: <?php echo html_escape($prescription->appointment_id); ?>
                                    </td>
                                    <td  class="text-right"><strong><?php echo display('date') ?></strong>: <?php echo date('m/d/Y', strtotime(html_escape($prescription->date))); ?>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>  
                                    <td width="50%">
                                        <ul class="list-unstyled">
                                            <li><strong><?php echo html_escape($prescription->doctor_name); ?></strong></li> 
                                            <li><?php echo html_escape($prescription->specialist); ?></li>
                                            <li><strong><?php echo html_escape($prescription->department_name); ?></strong></li>   
                                            <li><?php echo html_escape($prescription->designation); ?></li>  
                                            <li><?php echo html_escape($prescription->address); ?></li>   
                                        </ul>
                                    </td>      
                                    <td width="50%" class="text-right">
                                        <ul class="list-unstyled">
                                            <li><strong><?php echo html_escape($website->title); ?></strong></li>  
                                            <li><?php echo html_escape($website->description); ?></li>  
                                            <li><?php echo html_escape($website->email); ?></li>  
                                            <li><?php echo html_escape($website->phone); ?></li>  
                                        </ul>
                                    </td> 
                                </tr>  
                            </tbody>
                            <tfoot>
                                <tr class="bg-primary">
                                    <td colspan="2">
                                        <?php
                                            $date1=date_create($prescription->date_of_birth);
                                            $date2=date_create(date('Y-m-d'));
                                            $diff=date_diff($date1,$date2); 
                                        ?>
                                        <strong><?php echo display('patient_name') ?></strong>: <?php echo html_escape($prescription->patient_name); ?>, 
                                        <strong><?php echo display('age') ?></strong>: <?php echo "$diff->y Years $diff->m Months"; ?>,
                                        <strong><?php echo display('sex') ?></strong>: <?php echo html_escape($prescription->sex); ?>,
                                        <strong><?php echo display('weight') ?></strong>: <?php echo html_escape($prescription->weight); ?>,
                                        <strong>BP</strong>: <?php echo html_escape($prescription->blood_pressure); ?>,
                                        <strong><?php echo display('insurance_name') ?></strong>: <?php echo html_escape($prescription->insurance_name); ?>
                                    </td> 
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-12">
                        <div class="chief_complain">
                            <!-- chief_complain -->
                            <p>
                                <strong><?php echo display('chief_complain') ?></strong>: <?php echo html_escape($prescription->chief_complain); ?>
                            </p>
                            
                            <!-- patient_notes -->
                            <p>
                                <strong><?php echo display('patient_notes') ?></strong>: <?php echo html_escape($prescription->patient_notes); ?>
                            </p> 
                        </div>

                        <div class="prescript_medicine">
                            <!-- Medicine -->
                            <table class="table table-striped"> 
                                <thead>
                                    <tr class="bg-info header-2">
                                        <th><?php echo display('medicine_name') ?></th>
                                        <th width="80"><?php echo display('type') ?></th>
                                        <th width="80"><?php echo display('days') ?></th>
                                        <th><?php echo display('instruction') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($prescription->medicine)) {
                                    $medicine = json_decode($prescription->medicine);
                                    if(!empty($medicine))
                                        if (sizeof($medicine) > 0) 
                                            foreach ($medicine as $value) { 
                                                ?>
                                            <tr>
                                                <td><?php echo html_escape($value->name); ?></td> 
                                                <td><?php echo html_escape($value->type); ?></td> 
                                                <td><?php echo html_escape($value->days); ?></td>  
                                                <td><?php echo html_escape($value->instruction); ?></td> 
                                            </tr>
                                             <?php  
                                            }
                                    }
                                ?> 
                                </tbody> 
                            </table> 


                            <!-- diagnosis -->
                            <table class="table table-striped"> 
                                <thead>
                                    <tr class="bg-info header-2">
                                        <th><?php echo display('diagnosis') ?></th>
                                        <th><?php echo display('instruction') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($prescription->diagnosis)) {
                                    $diagnosis = json_decode($prescription->diagnosis);
                                    if(!empty($diagnosis))
                                        if (sizeof($diagnosis) > 0) 
                                            foreach ($diagnosis as $value) { 
                                            ?>
                                            <tr>
                                                <td><?php echo html_escape($value->name); ?></td> 
                                                <td><?php echo html_escape($value->instruction); ?></td> 
                                            </tr>
                                            <?php  
                                            }
                                    }
                                ?> 
                                </tbody> 
                            </table>  
                        </div> 
                    </div>
                </div>




                <div class="row">
                    <div class="col-sm-12">
                        <!-- Signature -->
                        <table class="table" class="pres-mt-50"> 
                            <thead> 
                                <tr>
                                    <th class="pres-w-50"></th>
                                    <td class="pres-w-50">
                                        <div class="pres-signature"></div>
                                        <i>Signature</i>
                                    </td>
                                </tr>
                            </thead>
                        </table> 

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

