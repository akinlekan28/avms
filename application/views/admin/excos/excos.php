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
					<h3 class="panel-title text-center">Add Executive</h3>
				</div>
				<div class="panel-body">
          <form method="post" enctype="multipart/form-data">

            <div class="form-group">
               <input type="text" class="form-control" placeholder="Full Name" name="fullname">
              <p><?php echo form_error('fullname')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" placeholder="Post" name="position">
              <p><?php echo form_error('position')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" placeholder="Level" name="level">
              <p><?php echo form_error('level')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" placeholder="Phone Number" name="phone">
              <p><?php echo form_error('phone')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" placeholder="Nick Name" name="nick">
            </div>

            <div class="form-group">
               <input type="file" class="form-control" placeholder="Picture" name="pic">
            </div>

            <div class="text-center">
              <input type="submit" value="Submit" class="btn btn-primary" name="addexco">
            </div>
          </form>
				</div>
			</div>
			<!-- END PANEL HEADLINE -->
		</div>
</div>

<div class="row">
		<div class="col-md-12">
      <!-- PANEL HEADLINE -->
      <?php foreach ($excos as $exco):?>
        <div class="col-md-4">
          <div class="panel panel-headline exco-list">
				    <div class="panel-heading">
					<h4 class="text-center"><?php echo $exco->fullname;?></h4>
				    </div>
				      <div class="panel-body text-center">
                <img src="<?php echo base_url("$exco->pic")?>" style="height:150px; width:150px;">
                  <br><br>
                <p><strong>Post: <?php echo $exco->position?></strong></p>
                <p><strong>Level: <?php echo $exco->level?></strong></p>
                <p><strong>Nickname: <?php echo $exco->nick?></strong></p>
                <p><strong>Phone: <?php echo $exco->phone?></strong></p>
              </div>
              <div class="panel-footer text-center">

                <a href="#" data="<?php echo $exco->exco_id; ?>" class="delete"><i class="lnr lnr-trash" style="color: #EB5E28;"></i>
                  </a>

                  <a href="<?php echo site_url("dashboard/editExco/{$exco->exco_id}")?>" class="btn-form-modal" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Edit" data-target="#default" ><i class="lnr lnr-pencil text-info"></i></a>

              </div>
		      	</div>
          </div>
          <?php endforeach;?>
			<!-- END PANEL HEADLINE -->
		</div>
</div>

<script>
    $('.delete').click(function (){
        const exco_id = $(this).attr('data');
        delete_exco(exco_id);
    });

    function delete_exco(exco_id){
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this information!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deleteExco/'+exco_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Deleted" , "Executive Deleted" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error Deleting Executive")
                    });
            });
    }

</script>