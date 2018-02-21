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

<link href="<?php echo base_url()?>assetadmin/summernote/summernote.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assetadmin/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<div class="row">
		<div class="col-md-12">
			<!-- PANEL HEADLINE -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Add Post</h3>
				</div>
				<div class="panel-body">
          <form method="post">
            <div class="form-group">
               <input type="text" class="form-control" placeholder="Title" name="title">
              <p><?php echo form_error('title')?></p>
            </div>
            
             <div class="form-group">
               <textarea class="summernote" name="post_description" name="post"></textarea>
                <p><?php echo form_error('post')?></p>
             </div>

             <div class="form-group">
               <Select name="category_id" class="form-control">
                <option value="">Select Category</option>
                  <?php foreach ($categories as $category):?>
                  <option value="<?php echo $category->category_id?>"><?php echo $category->category_name?></option>
                <?php endforeach;?>
               </Select>
              <p><?php echo form_error('category_id')?></p>
            </div>

            <div class="form-group">
               <input type="file" class="form-control" placeholder="Cover Photo" name="pic">
            </div>

          </form>
				</div>
			</div>
			<!-- END PANEL HEADLINE -->
    </div>
</div>    

<script src="<?php echo base_url()?>assetadmin/summernote/summernote.min.js"></script>
<script src="<?php echo base_url()?>assetadmin/select2/js/select2.min.js" type="text/javascript"></script>

<script>

    jQuery(document).ready(function(){

        $('.summernote').summernote({
            height: 240,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
     });
</script>