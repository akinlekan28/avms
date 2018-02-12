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
					<h3 class="panel-title text-center">Add Dues</h3>
				</div>
				<div class="panel-body">
          <form method="post">

            <div class="form-group">
               <input type="text" class="form-control" placeholder="Due Name" name="due_name">
              <p><?php echo form_error('due_name')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" placeholder="Amount" name="price">
              <p><?php echo form_error('price')?></p>
            </div>

            <div class="text-center">
              <input type="submit" value="Add Due" class="btn btn-primary" name="adddue">
            </div>
          </form>
				</div>
			</div>
			<!-- END PANEL HEADLINE -->
		</div>
</div>

<div class="row">

  <div class="col-md-9">

			<!-- TABLE HOVER -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title text-center">View Dues</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover" id="example">
						<thead>
							<tr>
                <th>#</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Date Added</th>
                <th>Action</th>
              </tr>
						</thead>
						<tbody>
              <?php
                $sn = 1;
                foreach($dues as $due):?>
              <tr>
                <td><?php echo $sn?></td>
                <td><?php echo $due->due_name?></td>
                <td><?php echo $due->price?></td>
                <td><?php echo $due->date_added?></td>
                <td>
                  <a href="#" data="<?php echo $due->due_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i>
                  </a> &nbsp;
                  <a href="<?php echo site_url("dashboard/editDue/{$due->due_id}")?>" class="btn-form-modal" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Edit" data-target="#default" ><i class="fa fa-edit text-success"></i></a>
              </td>
              </tr>
              <?php $sn ++;
                endforeach?>
						</tbody>
					</table>
				</div>
			</div>

</div>

<script>
    $('.delete').click(function (){
        const due_id = $(this).attr('data');
        delete_due(due_id);
    });

    function delete_due(due_id){
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Due information!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deleteDue/'+due_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Deleted" , "Due Removed" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error Deleting Due")
                    });
            });
    }

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>