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

<div class="panel panel-headline" style="margin-top:50px">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Update</h3>
				</div>
				<div class="panel-body">
          <form method="post">

            <div class="form-group">
               <input type="text" class="form-control" value="<?php echo $due->due_name?>" name="due_name">
              <p><?php echo form_error('due_name')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" placeholder="Enter price" name="price">
              <p><?php echo form_error('price')?></p>
            </div>

            <div class="text-center">
              <input type="submit" value="Update" class="btn btn-primary" name="update">
            </div>
          </form>
				</div>
      </div>
      
<?php $this->load->view('partials/mod_footer'); ?>