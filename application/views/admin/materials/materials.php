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
					<h3 class="panel-title text-center">Add Study Materials</h3>
				</div>
				<div class="panel-body">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <p><small class="text-danger">* File upload limit is 20mb</small></p>
               <input type="text" class="form-control" placeholder="Material Name" name="material_name">
              <p><?php echo form_error('material_name')?></p>
            </div>

            <div class="form-group">
               <input type="text" class="form-control" placeholder="Author" name="author">
              <p><?php echo form_error('author')?></p>
            </div>

            <div class="form-group">
               <input type="file" class="form-control" placeholder="Material" name="material">
            </div>
            <div class="text-center">
              <input type="submit" value="Upload" class="btn btn-primary" name="upload">
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
					<h3 class="panel-title text-center">Uploaded Materials</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover" id="example">
						<thead>
							<tr>
                <th>#</th>
                <th>Name</th>
                <th>Author</th>
                <th>Date Added</th>
                <th>Action</th>
              </tr>
						</thead>
						<tbody>
              <?php
                $sn = 1;
                foreach($materials as $material):?>
              <tr>
                <td><?php echo $sn?></td>
                <td><?php echo $material->material_name?></td>
                <td><?php echo $material->author?></td>
                <td><?php echo $material->date_added?></td>
                <td><a href="#" data="<?php echo $material->material_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i></a></td>
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
        const material_id = $(this).attr('data');
        delete_material(material_id);
    });

    function delete_material(material_id){
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Material!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deleteMaterial/'+material_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Deleted" , "Material Removed" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error Deleting Material")
                    });
            });
    }

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>