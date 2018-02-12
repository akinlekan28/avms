<?php $this->load->view('partials/mod_header'); ?>
<?php if(isset($response)):?>
    <?php if($response == TRUE):?>
        <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Success",
                    text: <?php echo json_encode($message)?>,
                    type: "success",
                })
            });
        </script>
    <?php elseif($response == FALSE):?>
        <script>
            $(document).ready(function(){
                swal({
                    title: "Success",
                    text: <?php echo json_encode($message)?>,
                    type: "danger",
                })
            });
        </script>
    <?php endif?>
<?php endif?>

<div class="panel panel-headline" style="margin-top:25px">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Update</h3>
				</div>
				<div class="panel-body">
          <form method="post">

            <div class="form-group">
               <input type="text" class="form-control" value="<?php echo $exco->fullname?>" name="fullname">
              <p><?php echo form_error('fullname')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" value="<?php echo $exco->position?>" name="position">
              <p><?php echo form_error('position')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" value="<?php echo $exco->level?>" name="level">
              <p><?php echo form_error('level')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" value="<?php echo $exco->phone?>" name="phone">
              <p><?php echo form_error('phone')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" value="<?php echo $exco->nick?>" name="nick">
            </div>

            <div class="text-center">
              <input type="submit" value="Update" class="btn btn-primary" name="update">
            </div>
          </form>
				</div>
      </div>
      
<?php $this->load->view('partials/mod_footer'); ?>