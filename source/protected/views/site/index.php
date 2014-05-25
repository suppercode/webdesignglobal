<?php $themeUrl = Yii::app()->theme->baseUrl;?>
<?php 
Yii::app()->getClientScript()->registerCssFile("$themeUrl/css/prettyPhoto.css");
Yii::app()->getClientScript()->registerScriptFile("$themeUrl/js/jquery.prettyPhoto.js");
?>
<script type="text/javascript">
  $(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'fast', /* fast/slow/normal */
		slideshow: 5000, /* false OR interval time in ms */
		autoplay_slideshow: false, /* true/false */
		opacity: 0.70, /* Value between 0 and 1 */
		show_title: true, /* true/false */
		allow_resize: true, /* Resize the photos bigger than viewport. true/false */
		default_width: 500,
		default_height: 344,
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: 'pp_default' /* light_rounded / dark_rounded / light_square / dark_square / facebook */
	});
  });
</script>
<div id="main">
	<?php $this->widget('application.widgets.SlidePhotos.SlidePhotosWidget')?>
	<!-- boxes -->
	<section class="boxes">
		<div class="holder">
			<!-- title-box -->
			<div class="title-box">
				<h2>Inbound Marketing Software</h2>
				<p>SaleFly's software contains everything you need to do inbound marketing. You can blog, send email, monitor social media, create web and landing pages, do marketing automation, SEO and more - all in one integrated platform</p>
			</div>
			<!-- boxes-section -->
			<div class="boxes-section">
				<article class="col">
					<a href="#"><div class="icon ico1"></div></a>
					<div class="text-box">
						<h3>Tools to Attract Visitors</h3>
						<p>Blogging software that fuels lead generation.</p>
						<a href="#" class="btn">Read more</a>
					</div>
				</article>
				<article class="col">
					<a href="#"><div class="icon ico2"></div></a>
					<div class="text-box">
						<h3>Tools to Convert Leads</h3>
						<p>Create a powerful landing page in 3 easy steps</p>
						<a href="#" class="btn">Read more</a>
					</div>
				</article>
				<article class="col last">
					<a href="#"><div class="icon ico3"></div></a>
					<div class="text-box">
						<h3>Tools to Close Customers</h3>
						<p>All your analytics in one place.</p>
						<a href="#" class="btn">Read more</a>
					</div>
				</article>
			</div>
		</div>
	</section>
	<div class="main-container holder">
		<!-- grid-cols -->
		<div class="grid-cols">
			<!-- col67 -->
			<div class="col67">
				<div class="col-holder">
					<h3>Why Choose SaleFly Inbound Marketing Software ? We'll Tell You!</h3>
					<span class="image alignleft"><img src="<?php echo $themeUrl; ?>/images/portfolio-4.jpg" alt="image description" /></span>									
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. </p>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper. </p>									
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper. </p>									
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper. </p>									
								</div>
							</div>					
							<!-- col33 -->
			<div class="col33">
				<div class="col-holder">
					<h3>Awesome Features</h3>
					<!-- accordion -->
									<ul id="accord" class="accordion">
										<li class="active">
											<a href="#" class="opener">Blogging</a>
											<div class="slide">
												<p>Easily create remarkable content that will help your business get found.</p>
											</div>
										</li>
										<li>
											<a href="#" class="opener">Social Inbox</a>
											<div class="slide">
												<p>Publish and see Social Analytics across Facebook, LinkedIn, Twitter and other networks.</p>
											</div>
										</li>
										<li>
											<a href="#" class="opener">SEO</a>
											<div class="slide">
												<p>Improve your search rankings and get found by quality leads.</p>
											</div>
										</li>
										<li>
											<a href="#" class="opener">Sites</a>
											<div class="slide">
												<p>Manage the pages of your website and track performance.</p>
											</div>
										</li>
										<li>
											<a href="#" class="opener">Calls-to-Action</a>
											<div class="slide">
												<p>Build beautiful buttons and callouts to convert traffic to leads in a snap</p>
											</div>
										</li>
										<li>
											<a href="#" class="opener">Landing Pages</a>
											<div class="slide">
												<p>Create more pages that improve conversion rates and generate leads.</p>
											</div>
										</li>	
                                        <li>
											<a href="#" class="opener">Forms</a>
											<div class="slide">
												<p>Ask the right questions at the right time to optimize lead conversions.</p>
											</div>
										</li>
                                        <li>
											<a href="#" class="opener">Lead Management</a>
											<div class="slide">
												<p>Segment leads based on their activity across your site and other channels.</p>
											</div>
										</li>
                                        <li>
											<a href="#" class="opener">Email</a>
											<div class="slide">
												<p>Personalize your emails with any field from your marketing database.</p>
											</div>
										</li>
                                        <li>
											<a href="#" class="opener">Marketing Automation</a>
											<div class="slide">
												<p>Use marketing automation to trigger timed follow up emails to your contacts.</p>
											</div>
										</li>	
                                        <li>
											<a href="#" class="opener">Analytics</a>
											<div class="slide">
												<p>See which traffic sources are generating the most leads, plus other insights.</p>
											</div>
										</li>
                                        <li>
											<a href="#" class="opener">Salesforce Sync</a>
											<div class="slide">
												<p>Use Salesforce data to segment contacts, personalize email, and more.</p>
											</div>
										</li>								
									</ul>
								</div>
							</div>
						</div>
						<!-- grid-cols -->
		<div class="grid-cols">
			<!-- col67 -->
			<div class="col67">
				<div class="col-holder">
					<span class="image alignleft"><img src="<?php echo $themeUrl; ?>/images/portfolio-1.jpg" alt="image description" /></span>	
					<h3>Well being of our clients first!</h3>
					<h6>Lorem ipsum dolor sit amet, crossover corectetuer et adipiscing elit, sed diam nonummy nibh euismod tincidu ...</h6>									
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam. Nam liber tempor cum soluta nobis eleifend option congue nihil ...</p>
				</div>
			</div>						
			<!-- col33 -->
			<div class="col33">
				<div class="col-holder testimonials">
					<!-- testimonials-item -->
					<h3>Client Testimonials</h3>
					<ul>
						<li>
							<img class="image" src="<?php echo $themeUrl; ?>/images/testimonial-2.jpg" alt="image description" />
							<blockquote>
								<q>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</q>
								<cite>- John, <a href="#">The Bright Agency</a></cite>
							</blockquote>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- clients -->
	<section class="clients">
		<div class="holder">
			<h3>We have done work for prominent, international companies. Would you like to work with us?</h3>
			<p>Listing them all would take a little time so we thought weâ€™d pull a few well known names from the list. We also have testimonials from customers regarding positive experiences with our service.</p>
			<!-- sponsors -->
			<ul class="sponsors">
				<li>
					<a href="#">
						<span>
							<img src="<?php echo $themeUrl; ?>/images/img4.png" alt="image description" />
							<img class="hover" src="<?php echo $themeUrl; ?>/images/img4-hover.png" alt="image description" />
						</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>
							<img src="<?php echo $themeUrl; ?>/images/img5.png" alt="image description" />
							<img class="hover" src="<?php echo $themeUrl; ?>/images/img5-hover.png" alt="image description" />
						</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>
							<img src="<?php echo $themeUrl; ?>/images/img6.png" alt="image description" />
							<img class="hover" src="<?php echo $themeUrl; ?>/images/img6-hover.png" alt="image description" />
						</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>
							<img src="<?php echo $themeUrl; ?>/images/img7.png" alt="image description" />
							<img class="hover" src="<?php echo $themeUrl; ?>/images/img7-hover.png" alt="image description" />
						</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>
							<img src="<?php echo $themeUrl; ?>/images/img8.png" alt="image description" />
							<img class="hover" src="<?php echo $themeUrl; ?>/images/img8-hover.png" alt="image description" />
						</span>
					</a>
				</li>
			</ul>
		</div>
	</section>
</div>