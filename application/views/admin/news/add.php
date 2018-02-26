
<link href="<?php echo base_url()?>assetadmin/summer/summernote.css" rel="stylesheet" />
<div class="row">
		<div class="col-md-12">
			<!-- PANEL HEADLINE -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Add News</h3>
				</div>
				<div class="panel-body">
          <form method="post">
            <div class="form-group">
            <p><?php echo form_error('title')?></p>
               <input type="text" class="form-control" placeholder="Title" name="title">
            </div>
            
             <div class="form-group">
              <p><?php echo form_error('news_post')?></p>
               <textarea class="summernote" name="news_post"></textarea>
             </div>

             <div class="form-group">
               <input type="file" class="form-control" placeholder="Cover Photo" name="pic">
            </div>

            <div class="text-center">
              <input type="submit" value="Publish" class="btn btn-primary" name="Post">
            </div>

          </form>
				</div>
			</div>
			<!-- END PANEL HEADLINE -->
    </div>
</div>    

<script src="<?php echo base_url()?>assetadmin/summer/summernote.min.js"></script>

<script>

    jQuery(document).ready(function(){

        $('.summernote').summernote({
            height: 240,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
     });
</script>