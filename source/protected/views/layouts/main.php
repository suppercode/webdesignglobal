<?php require_once '_header.php';?>
<body class="inner">
	<!-- wrapper -->
	<div id="wrapper">
		<div class="w1">
			<div class="w2">
				<!-- header -->
				<header id="header">
					<!-- section -->
					<div class="section">
						<h1 class="logo"><a href="./index.html">SmartBusiness</a></h1>
						<div class="contact-box">
							<strong class="phone">0914.937.496</strong>
							<!-- social -->
							<ul class="social">
								<li><a href="#" class="twitter">twitter</a></li>
								<li><a href="#" class="facebook">facebook</a></li>
								<li><a href="#" class="pinterest">pinterest</a></li>
								<li><a href="#" class="google">google</a></li>
								<li><a href="#" class="rss">rss</a></li>
							</ul>
						</div>
					</div>
					<!-- nav-box -->
				<!--
				<nav class="nav-box">
					<ul id="nav">
						<li class="active"><a href="./index.html">Home</a>
							<ul>
								<li><a>1</a></li>
								<li><a>1</a><ul>
								<li><a>1</a></li>
								<li><a>1</a></li>
							</ul></li>
							</ul>
						</li>
						<li><a href="software.html">Software</a></li>								
						<li><a href="pricing.html">Pricing</a></li>								
						<li><a href="casestudies.html">Case Studies</a></li>							
						<li><a href="testimonials.html">Testimonials</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="blog.html">Blog</a></li>
					</ul>
				</nav>
				-->
				<?php $this->widget('application.widgets.Menu.Menu', array('_item_active'=>$this->activemenu,'_gmid'=>1,'_style'=>'style2'));?>
				</header>
				<!-- main -->
				<?php echo $content;?>
			</div>
		</div>
		<!-- footer -->
		<?php require_once '_footer.php';?>
	</div>
	<script type="text/javascript">
	$('a[data-rel]').each(function() {
	$(this).attr('rel', $(this).attr('data-rel')).removeAttr('data-rel');
	});
	</script>	
	<!--<div class="theme_settings_wrapper">
		<a href="javascript:void(0)" id="show_settings_button"></a>
		<div class="theme_settings_container">
			<div class="theme_settings_container_top"></div>
			<div class="theme_settings_container_bott"></div>
			<a href="javascript:void(0)" id="hide_settings_button"></a>
			<h3>Support</h3>
			<a href="../../wide/light-red/"><img src="<?php echo $themeUrl; ?>/demo/images/settings/circle.png" alt="image description" /> Sale</a><br />
			<a href="./index.html"><img src="<?php echo $themeUrl; ?>/demo/images/settings/circle.png" alt="image description" /> Technical</a><br /><br /><h4>&nbsp;</h4>
			<h3>Social Page</h3>
			<ul id="color_scheme" class="styleswitcher">
				<li><a href="../light-blue/index.html" id="blue" title="Blue">Blue</a></li>
				<li><a href="../light-orange/index.html" id="orange" title="Orange">Orange</a></li>
				<li><a href="./index.html" id="red" title="Red">Red</a></li>
				<li><a href="../light-green/index.html" id="green" title="Green">Green</a></li>
			</ul>
		</div>	
	</div>
	-->
</body>
</html>
