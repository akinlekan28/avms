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
            var message = <?php echo json_encode($message)?>;
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

<div class="row">
		<div class="col-md-9">
			<!-- PANEL HEADLINE -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Change User Access Level</h3>
				</div>
				<div class="panel-body">
            <form method="post">

                <div class="form-group">
                <select class="form-control" name="user_id">
                    <option value="">Select User</option>
                    <?php foreach ($users as $user):?>
                    <option value="<?php echo $user->user_id?>"><?php echo $user->firstname . " ". $user->lastname?></option>
                    <?php endforeach;?>
                </select>
                <p><?php echo form_error('user_id')?></p>
            </div>

            <div class="form-group">
                <select class="form-control" name="privilege">
                    <option value="">Select Access</option>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                </select>
                <p><?php echo form_error('privilege')?></p>
            </div>

            <div class="text-center">
              <input type="submit" value="Update" class="btn btn-primary" name="access">
            </div>

            </form>
				</div>
			</div>
			<!-- END PANEL HEADLINE -->
		</div>
</div>