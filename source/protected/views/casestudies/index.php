<?php $themeUrl = Yii::app()->theme->baseUrl;?>
<?php 
Yii::app()->getClientScript()->registerCssFile("$themeUrl/css/prettyPhoto.css");
Yii::app()->getClientScript()->registerScriptFile("$themeUrl/js/jquery.prettyPhoto.js");
Yii::app()->getClientScript()->registerScript(
		'pretty',
		"$(document).ready(function(){
			$(\"a[rel^='prettyPhoto']\").prettyPhoto({
				animation_speed: 'fast', /* fast/slow/normal */
				slideshow: 5000, /* false OR interval time in ms */
				autoplay_slideshow: false, /* true/false */
				opacity: 0.70, /* Value between 0 and 1 */
				show_title: true, /* true/false */
				allow_resize: true, /* Resize the photos bigger than viewport. true/false */
				default_width: 500,
				default_height: 344,
				counter_separator_label: '/', /* The separator for the gallery counter 1 \"of\" 2 */
				theme: 'pp_default' /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			});
		})",
		CClientScript::POS_HEAD
);
?>
<div id="main">
	<!-- content-panel -->
	<div class="content-panel">
		<div class="page-title">
			<h2>Portfolio One Column</h2>
			<!-- breadcrumbs -->
			<ul class="breadcrumbs">
				<li><a href="./index.html">Home</a></li>
				<li>/</li>	
				<li><a href="#">Portfolio</a></li>
				<li>/</li>									
				<li>Portfolio One Column</li>
			</ul>
		</div>
	</div>
	<!-- portfolio-box -->
	<section class="portfolio-box">
		<span class="image">
			<img src="<?php echo $themeUrl;?>/images/portfolio-1-big.jpg" alt="image description" />
			<span class="mask"></span>
			<a href="https://www.youtube.com/watch?v=oMtjZkrTiJ8" class="btn-video" data-rel="prettyPhoto[pp_gallery1]">video</a> 										
		</span>
		<div class="text-box">
			<h4>Portfolio Item 1 (About Project)</h4>
			<p>We worked with the client to create a strong list of descriptive words that would be used in practical marketing executions like packaging.</p>
			<h5>Job Description:</h5>
			<p>Praesent lacinia dictum ligula, vitae consectetur nisl dapibus sit amet:</p>
			<ul>
				<li>Brand Identity</li>
				<li>Print Design</li>
				<li>Signage</li>
				<li>Consulting</li>
				<li>Marketing Strategy</li>
			</ul>
			<p>Praesent lacinia dictum ligula, vitae consectetur nisl dapibus sit amet. Nulla a orci nec nisl iverra hendrerit. Cras condimentum varius dignissim.</p>							
			<a href="#" class="btn red">Read more</a>
		</div>
	</section>
	<!-- portfolio-box -->
	<section class="portfolio-box">
		<h4></h4>
		<span class="image">
			<img src="<?php echo $themeUrl;?>/images/portfolio-2-big.jpg" alt="image description" />
			<span class="mask"></span>
			<a href="<?php echo $themeUrl;?>/images/portfolio-2-big.jpg" class="btn-photo" data-rel="prettyPhoto[pp_gallery1]">photo</a>
		</span>
		<div class="text-box">
			<h4>Portfolio Item 2 (About Project)</h4>
			<p>We worked with the client to create a strong list of descriptive words that would be used in practical marketing executions like packaging.</p>
			<h5>Job Description:</h5>
			<p>Praesent lacinia dictum ligula, vitae consectetur nisl dapibus sit amet:</p>
			<ul>
				<li>Brand Identity</li>
				<li>Print Design</li>
				<li>Signage</li>
				<li>Consulting</li>
				<li>Marketing Strategy</li>
			</ul>
			<p>Praesent lacinia dictum ligula, vitae consectetur nisl dapibus sit amet. Nulla a orci nec nisl iverra hendrerit. Cras condimentum varius dignissim.</p>							
			<a href="#" class="btn red">Read more</a>
		</div>
	</section>
	<!-- portfolio-box -->
	<section class="portfolio-box last">
		<h4></h4>
		<span class="image">
			<img src="<?php echo $themeUrl;?>/images/portfolio-3-big.jpg" alt="image description" />
			<span class="mask"></span>
			<a href="<?php echo $themeUrl;?>/images/portfolio-3-big.jpg" class="btn-photo" data-rel="prettyPhoto[pp_gallery1]">photo</a>
		</span>
		<div class="text-box">
			<h4>Portfolio Item 3 (About Project)</h4>
			<p>We worked with the client to create a strong list of descriptive words that would be used in practical marketing executions like packaging.</p>
			<h5>Job Description:</h5>
			<p>Praesent lacinia dictum ligula, vitae consectetur nisl dapibus sit amet:</p>
			<ul>
				<li>Brand Identity</li>
				<li>Print Design</li>
				<li>Signage</li>
				<li>Consulting</li>
				<li>Marketing Strategy</li>
			</ul>
			<p>Praesent lacinia dictum ligula, vitae consectetur nisl dapibus sit amet. Nulla a orci nec nisl iverra hendrerit. Cras condimentum varius dignissim.</p>							
			<a href="#" class="btn red">Read more</a>
		</div>
	</section>					
	<!-- paging -->
	<div class="paging">
		<ul>
			<li><a href="#">&laquo; Previous</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li>...</li>
			<li><a href="#">10</a></li>
			<li><a href="#">Next &raquo;</a></li>
		</ul>
	</div>
</div>