<div class="panel panel-default thumbnail">
 
    <div class="panel-heading">
        <div class="btn-group"> 
            <a class="btn btn-success" href="<?php echo base_url("language/phrase") ?>"> <i class="fa fa-plus"></i> Add Phrase</a>
        </div> 
        <div class="btn-group"> 
            <a class="btn btn-primary" href="<?php echo base_url("language") ?>"> <i class="fa fa-list"></i>  Language List </a> 
        </div> 
    </div>


    <div class="panel-body">
        <div class="row">

            <!-- phrase -->
            <div class="col-sm-12">
 
                <?php echo form_open('language/addlebel') ?>
                <table class="table table-striped">
                    <thead> 
                        <tr>
                            <td colspan="3"> 
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="fa fa-th-list"></i></th>
                            <th>Phrase</th>
                            <th>Label</th> 
                        </tr>
                    </thead>

                    <tbody>
                        <?php echo form_hidden('language', $language) ?>
                            <?php if (!empty($phrases)) {?>
                                <?php $sl = 1 ?>
                                <?php foreach ($phrases as $value) {?>
                                <tr class="<?php echo (empty($value->$language)?"bg-danger":null) ?>">
                                
                                    <td><?php echo $sl++ ?></td>
                                    <td><input type="text" name="phrase[]" value="<?php echo html_escape($value->phrase); ?>" class="form-control" readonly></td>
                                    <td><input type="text" name="lang[]" value="<?php echo html_escape($value->$language); ?>" class="form-control"></td> 
                                </tr>
                                <?php } ?>
                            <?php } ?>
                            <?php if($this->session->userdata('demoM')==1){ ?>
                                <?php echo form_close() ?>
                                <tr>
                                    <td colspan="3"> 
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-success" onclick="demoModeEnable()">Save</button>
                                    </td>
                                </tr>
                            <?php }else{ ?>
                                <tr>
                                    <td colspan="3"> 
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </td>
                                </tr>
                                <?php echo form_close() ?>
                            <?php }?>
                    </tbody>
                </table>
            </div> 

        </div>
    </div>
 

</div>