<link rel="stylesheet" href="<?php echo base_url(); ?>assetadmin/vendor/chartist/css/chartist-custom.css">
<script src="<?php echo base_url(); ?>assetadmin/vendor/chartist/js/chartist.min.js"></script>
<div class="row">
		<div class="col-md-12">
			<!-- PANEL HEADLINE -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Website Overview</h3>
				</div>
				<div class="panel-body">

          <div class="row">
            <div class="col-md-12">
              <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-tv"></i></span>
										<p>
											<span class="number"><?php echo $news ?></span>
											<span class="title">News</span>
										</p>
									</div>
								</div>

                <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-pencil-square-o"></i></span>
										<p>
											<span class="number"><?php echo $posts ?></span>
											<span class="title">Published Post</span>
										</p>
									</div>
								</div>

                 <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-save"></i></span>
										<p>
											<span class="number"><?php echo $drafts ?></span>
											<span class="title">Drafted Post</span>
										</p>
									</div>
								</div>

                
                 <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-paperclip"></i></span>
										<p>
											<span class="number"><?php echo $comments ?></span>
											<span class="title">Comments</span>
										</p>
									</div>
								</div>

            </div>

            <div class="col-md-12">
								<div class="col-md-9">
									<div id="headline-chart" class="ct-chart"></div>
								</div>
								<div class="col-md-3">
									<div class="weekly-summary text-right">
										<span class="number"><?php echo $categories ?></span>
										<span class="info-label">Categories</span>
									</div>
									<div class="weekly-summary text-right">
										<span class="number"><?php echo $materials ?></span>
										<span class="info-label">Materials</span>
									</div>
									<div class="weekly-summary text-right">
										<span class="number">
                      <?php foreach ($siteviews as $siteview): ?>
                      <?php echo $siteview->page_count ?>
                      <?php endforeach;?>
                    </span>
										<span class="info-label">Site Visits</span>
									</div>
								</div>

            </div>
          </div>

        </div>
      </div>
    </div>
<div>

<script>

  $(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35]
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);

		

  });
</script>