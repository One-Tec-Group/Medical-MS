<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="sms">
                    <thead>
                        <tr>
                            <th class=""><?php echo display('reciver');?></th>
                            <th class=""><?php echo display('provider');?></th>
                            <th class=""><?php echo display('date_time');?></th>
                            <th class=""><?php echo display('message');?></th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach($coustom_sms as $value){?>
                        <tr>
                            <td><?php echo html_escape($value->reciver);?></td>
                            <td><?php echo html_escape($value->gateway);?></td>
                            <td><?php echo html_escape($value->sms_date_time);?></td>
                            <td><?php echo html_escape($value->message);?></td>
                        </tr>
                        <?php
                            }
                        ?>

                         <?php foreach($auto_sms as $value){?>
                        <tr>
                            <td><?php echo html_escape($value->reciver);?></td>
                            <td><?php echo html_escape($value->gateway);?></td>
                            <td><?php echo html_escape($value->sms_date_time);?></td>
                            <td><?php echo html_escape($value->message);?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
