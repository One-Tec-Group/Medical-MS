<div class="row">
    <div class="col-sm-12" id="PrintMe">
        <div  class="panel panel-default thumbnail"> 
            <div class="panel-heading no-print">
                 <div class="btn-group">
                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-success" ><i class="fa fa-print"></i></button>
                </div>
            </div>

            <div class="panel-body">  
                <div class="row">
                    <div class="col-sm-12"> 
                        <dl class="dl-horizontal">  
                            <dt><?php echo display('patient_id') ?></dt><dd><?php echo html_escape($approval->patient_id) ?></dd>
                            <dt><?php echo display('patient_name') ?></dt><dd><?php echo html_escape($approval->patient_name) ?></dd>
                            <dt><?php echo display('address') ?></dt><dd><?php echo html_escape($approval->address) ?></dd>
                            <dt><?php echo display('date_of_birth') ?></dt><dd><?php echo html_escape($approval->date_of_birth) ?></dd>
                            <dt><?php echo display('sex') ?></dt><dd><?php echo html_escape($approval->sex) ?></dd>
                            <dt><?php echo display('room_no') ?></dt><dd><?php echo html_escape($approval->room_no) ?></dd>
                            <dt><?php echo display('disease_details') ?></dt>
                            <dd>
                                <?php 
                                $disease = json_decode(html_escape($approval->disease_details), true);
                                echo "<table class='table-b-w'>";
                                echo "<tr class='bg-primary'><th class='p-2-5'>Name</th><th class='p-2-5'>Charge</th></tr>";
                                if ($disease>0)
                                foreach ($disease as $key => $value)
                                echo "<tr class='p-2-5'><td class='p-2-5'>$key</td><td class='p-2-5'>$value</td></tr>";
                                echo "</table>";
                                ?>
                            </dd> 
                            <dt><?php echo display('consultant_name') ?></dt><dd><?php echo html_escape($approval->consultant_name) ?></dd>
                            <dt><?php echo display('policy_name') ?></dt><dd><?php echo html_escape($approval->policy_name) ?></dd>
                            <dt><?php echo display('policy_no') ?></dt><dd><?php echo html_escape($approval->policy_no) ?></dd>
                            <dt><?php echo display('policy_holder_name') ?></dt><dd><?php echo html_escape($approval->policy_holder_name) ?></dd>
                            <dt><?php echo display('insurance_name') ?></dt><dd><?php echo html_escape($approval->insurance_name) ?></dd>
                            <dt><?php echo display('approval_breakup') ?></dt> 
                            <dd>
                                <?php 
                                $disease = json_decode(html_escape($approval->approval_breakup), true);
                                echo "<table class='table-b-w'>";
                                echo "<tr class='bg-primary'><th class='p-2-5'>Name</th><th class='p-2-5'>Charge</th></tr>";
                                if ($disease>0)
                                foreach ($disease as $key => $value)
                                echo "<tr class='p-2-5'><td class='p-2-5'>$key</td><td class='p-2-5'>$value</td></tr>";
                                echo "</table>";
                                ?>
                            </dd> 
                            <dt><?php echo display('total') ?></dt><dd><?php echo html_escape($approval->total) ?></dd>
                            <dt><?php echo display('date') ?></dt><dd><?php echo html_escape($approval->date) ?></dd>
                            
                            <dt><?php echo display('status') ?></dt><dd><?php echo (!empty($approval->status)?
                            display('active'):display('inactive')) ?></dd>
                        </dl> 
                    </div>
                </div>  

            </div> 

            <div class="panel-footer">
                <div class="text-center">
                    <strong><?php echo $this->session->userdata('title') ?></strong>
                    <p class="text-center"><?php echo $this->session->userdata('address') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
