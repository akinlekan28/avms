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

<link href="<?php echo base_url()?>assetadmin/summernote/summernote.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assetadmin/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<div class="panel panel-headline" style="margin-top:50px">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Update News</h3>
				</div>
				<div class="panel-body">
          <form method="post" enctype="multipart/form-data">

            <div class="form-group">
            <p><?php echo form_error('title')?></p>
               <input type="text" class="form-control" name="title" value="<?php echo $news->title?>">
            </div>

            <div class="form-group">
             <p><?php echo form_error('news_post')?></p>
               <textarea class="summernote" name="news_post"><?php echo $news->news_post ?></textarea>
             </div>

            <div class="form-group">
               <input type="file" class="form-control" placeholder="Cover Photo" name="pic">
            </div>

            <div class="text-center">
              <input type="submit" value="Update" class="btn btn-primary" name="update">
            </div>
          </form>
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

<?php $this->load->view('partials/mod_footer'); ?>