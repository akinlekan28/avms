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
		<div class="col-md-12">
			<!-- PANEL HEADLINE -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title text-center">View Comments</h3>
				</div>
				<div class="panel-body">

<table class="table table-hover" id="example">
						<thead>
							<tr>
                <th>#</th>
                <th>Post</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Date Added</th>
                <th>Action</th>
              </tr>
						</thead>
						<tbody>
              <?php
                $sn = 1;
                foreach($comments as $comment):?>
              <tr>
                <td><?php echo $sn?></td>
                <td><?php echo $comment->getPostName()?></td>
                <td><?php echo $comment->name?></td>
                <td><?php echo $comment->message?></td>
                <td><?php echo $comment->date_added?></td>
                <td>
                  <a href="#" data="<?php echo $comment->comment_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i>
                  </a> &nbsp;
              </td>
              </tr>
              <?php $sn ++;
                endforeach?>
						</tbody>
					</table>


		</div>
			</div>
			<!-- END PANEL HEADLINE -->
		</div>
</div>


<script>
    $('.delete').click(function (){
        const comment_id = $(this).attr('data');
        delete_comment(comment_id);
    });

    function delete_comment(comment_id){
        swal({
                title: "Are you sure?",
                text: "This comment will be deleted parmanently!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deleteComment/'+comment_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Deleted" , "Comment Deleted" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error Deleting Comment")
                    });
            });
    }

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>