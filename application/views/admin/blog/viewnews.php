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
					<h3 class="panel-title text-center">View Posted News</h3>
				</div>
				<div class="panel-body">

<table class="table table-hover" id="example">
						<thead>
							<tr>
                <th>#</th>
                <th>Picture</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date Added</th>
                <th>Action</th>
              </tr>
						</thead>
						<tbody>
              <?php
                $sn = 1;
                foreach($newss as $news):?>
              <tr>
                <td><?php echo $sn?></td>
                <td><img src="<?php echo base_url("$news->pic")?>" style="height:100px; width:100px;"></td>
                <td><?php echo $news->title?></td>
                <td><?php echo $news->getUser()?></td>
                <td><?php echo $news->date_added?></td>
                <td>
                  <a href="#" data="<?php echo $news->news_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i>
                  </a> &nbsp;
                  <a href="<?php echo site_url("dashboard/editnews/{$news->news_id}")?>" class="btn-form-modal" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Edit" data-target="#default" ><i class="fa fa-edit text-success"></i></a>
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
        const news_id = $(this).attr('data');
        delete_news(news_id);
    });

    function delete_news(news_id){
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deletenews/'+news_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Deleted" , "News Deleted" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error Deleting News")
                    });
            });
    }

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>