<div class="row">
    <!--  table area -->
    <div class="col-sm-12" id="PrintMe">
        <div class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("dashboard_accountant/messages/message/new_message") ?>"> <i class="fa fa-send-o"></i>  <?php echo display('new_message') ?> </a>
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard_accountant/messages/message") ?>"> <i class="fa fa-inbox"></i>  <?php echo display('inbox') ?> </a>
                    <a class="btn btn-info" href="<?php echo base_url("dashboard_accountant/messages/message/sent") ?>"> <i class="fa fa-share"></i>  <?php echo display('sent') ?> </a>

                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger"><i class="fa fa-print"></i></button> 
                </div> 
            </div>
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt><?php echo display('sender') ?></dt>
                    <dd><?php echo html_escape($this->session->userdata('fullname')) ?></dd>
                    <dt><?php echo display('receiver_name') ?></dt>
                    <dd><?php echo html_escape($message->receiver_name);?></dd>
                    <dt><?php echo display('date') ?></dt>
                    <dd><?php echo html_escape(date('d M Y h:i:s a', strtotime($message->datetime))) ?></dd>
                    <dt><?php echo display('subject') ?></dt>
                    <dd><?php echo html_escape($message->subject); ?></dd>
                    <dt><?php echo display('message') ?></dt> 
                    <dd><?php echo html_escape(strip_tags($message->message)); ?></dd>
                </dl>
            </div> 
        </div>
    </div> 

</div>
 

  


