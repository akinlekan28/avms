<style>
  @media screen and (max-width: 759px){
  .mar-fix{
    margin-top: -200px !important;
  }

}

  @media screen and (min-width: 760px){
    .mar-fix{
    margin-top: -230px !important;
  }
  }
</style>

<section class="u-py-100 u-pt-lg-200 u-pb-lg-150 u-flex-center" style="
  background: #2CD44A;
  background-image: -webkit-linear-gradient(left, #2CD44A 0%, #2CD404 100%);
  background-image: -o-linear-gradient(left, #2CD44A 0%, #2CD404 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(#2CD44A), to(#2CD404));
  background-image: linear-gradient(to right, #2CD44A 0%, #2CD404 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2CD44A', endColorstr='#2CD404', GradientType=1);
  ">
  
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white">
    			Free Study Materials
    		</h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    		<p class="lead">
    			We have a curated list of study materials up for free <br> in this section.
    		</p>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->


<section class="mar-fix">
  <div class="container">
    <div class="row text-center">
     <?php foreach ($materials as $material):?>
      <div class="col-lg-4 col-md-6 u-mt-30">
        <div class="bg-white px-4 py-5 px-md-5 u-h-100p rounded box-shadow-v1">
          <h4 class="u-fs-26 u-pt-30 u-pb-20">
            <?php echo $material['material_name']?>
          </h4>
          <strong>
            <p>
              Date Added: <?php echo $material['date_added']?>
            </p>
          </strong>
           <a href="<?php echo base_url().$material['material']; ?>" class="btn btn-success">Download</a>
        </div>
      </div> <!-- END col-lg-4 col-md-6--> 
     <?php endforeach; ?>
      
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END section-->