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
                            <dt><?php echo display('package_name') ?></dt><dd>&nbsp;<?php echo html_escape($package->name); ?></dd>
                            <dt><?php echo display('description') ?></dt><dd>&nbsp;<?php echo html_escape($package->description); ?></dd>
                            <dt><?php echo display('disease_details') ?></dt>
                            <dd>&nbsp;
                            <?php 
                                $services = json_decode($package->services, true);  
                                echo "<table border='1' width='50%'>";
                                echo "<tr class='bg-primary'><th class='p-2-5'>SL</th><th class='p-2-5'>Name</th><th class='p-2-5'>Quantity</th><th class='p-2-5'>Rate</th></tr>";
                                for($i=0;$i<count($services);$i++)
                                {
                                    if(isset($services[$i]))
                                    echo "<tr><td class='p-2-5'>".($i+1)."</td><td class='p-2-5'>".html_escape($services[$i]['name'])."</td><td class='p-2-5'>".html_escape($services[$i]['quantity'])."</td><td class='p-2-5'>".html_escape($services[$i]['amount'])."</td></tr>"; 
                                } 
                                echo "</table>";
                            ?>
                            </dd> 
                            <dt><?php echo display('discount') ?></dt><dd>&nbsp;<?php echo html_escape($package->discount); ?></dd>
                            <dt><?php echo display('status') ?></dt><dd>&nbsp;<?php echo (!empty($package->status)?
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
