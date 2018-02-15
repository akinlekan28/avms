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
					<h3 class="panel-title text-center">Add Blog Category</h3>
				</div>
				<div class="panel-body">
            <form method="post">
              <div class="form-group">
                <input type="text" name="category_name" Placeholder="Category Name" class="form-control">
                <p><?php echo form_error('category_name')?></p>
              </div>

              <div class="form-group">
                <input type="text" name="category_description" Placeholder="Description" class="form-control">
              </div>

              <div class="text-center">
              <input type="submit" value="Submit" class="btn btn-primary" name="submit">
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
                <th>Description</th>
                <th>Action</th>
              </tr>
						</thead>
						<tbody>
              <?php
                $sn = 1;
                foreach($categories as $category):?>
              <tr>
                <td><?php echo $sn?></td>
                <td><?php echo $category->category_name?></td>
                <td><?php echo $category->category_description?></td>
                <td>
                  <a href="#" data="<?php echo $category->category_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i>
                  </a> &nbsp;
                  <a href="<?php echo site_url("dashboard/editCategory/{$category->category_id}")?>" class="btn-form-modal" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Edit" data-target="#default" ><i class="fa fa-edit text-success"></i></a>
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
        const category_id = $(this).attr('data');
        delete_category(category_id);
    });

    function delete_category(category_id){
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Category!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deleteCategory/'+category_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Deleted" , "Category Removed" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error Deleting Category")
                    });
            });
    }

</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script> -->