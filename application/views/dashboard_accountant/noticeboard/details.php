<div class="row">
    <!--  table area -->
    <div class="col-sm-12" id="PrintMe">
        <div class="panel panel-default thumbnail">

            <div class="panel-heading">
                <h3 class="heading"><?php echo html_escape((!empty($title) ? $title : null)); ?></h3>
            </div> 

            <div class="panel-body">
                <p><?php echo html_escape(strip_tags($notice->description)); ?></p>
                 <dl class="dl-horizontal">
                    <dt><?php echo display('assign_by') ?></dt>
                     <dd>
                        <?php echo html_escape($notice->assign_by); ?>  
                    </dd>
                    <dt><?php echo display('start_date') ?></dt>
                    <dd><?php echo html_escape(date('d M Y', strtotime($notice->start_date))); ?></dd>
                    <dt><?php echo display('end_date') ?></dt>
                    <dd><?php echo html_escape(date('d M Y', strtotime($notice->end_date))); ?></dd>
                </dl>
            </div>

        </div>
    </div>
</div>
 
  


