<?php
   
	$b_name_file = basename($_SERVER['SCRIPT_FILENAME']);
	$b_name_arr  = explode(".",$b_name_file);
	$b_name      = $b_name_arr[0];
	
   
    ////////////Logo//////////////
      unset($info);
	  unset($data);
    $info["table"] = "cmslogo";
	$info["fields"] = array("cmslogo.*"); 
	$info["where"]   = "1";
	$arr =  $db->select($info);
	$file_logo = $arr[0]['file_logo'];
	
	/////////////////////////////////
	
  

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Correctleads.com</title>
	<link rel="icon" type="image/x-icon" href="images/icon/favicon.ico"/>
	<!--[if lt IE 9]>
	<script src="seo_v1.1/js/vendor/html5.js" type="text/javascript">
	</script>
	<![endif]-->
	<link rel='stylesheet' id='packed-css' href='seo_v1.1/css/_packed.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='fontello-css' href='seo_v1.1/css/fontello.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='main-style-css' href='seo_v1.1/css/style.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='shortcodes-css' href='seo_v1.1/css/shortcodes.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='theme-skin-css' href='seo_v1.1/css/general.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='responsive-css' href='seo_v1.1/css/responsive.css' type='text/css' media='all'/>
</head>

<body class="page fullscreen top_panel_above top_panel_opacity_transparent theme_skin_general usermenu_show">
	<!--[if lt IE 9]>
	<div class="sc_infobox sc_infobox_style_error">
	<div style="text-align:center;">It looks like you're using an old version of Internet Explorer. For the best WordPress experience, please <a href="http://microsoft.com" style="color:#191919">update your browser</a> or learn how to <a href="http://browsehappy.com" style="color:#222222">browse happy</a>!</div>
	</div>	<![endif]-->
	<div class="main_content">
		<div class="boxedWrap">
			<header class="noFixMenu menu_right with_user_menu no_container_padding">
				<div class="topWrapFixed"></div>
				<div class="topWrap">
					<div class="usermenu_area">
						<div class="container">
							<div class="menuUsItem menuItemRight">
								<ul class="usermenu_list" id="usermenu">
									<li class="menu-item ">
										<a href="#">Register for FREE!</a>
									</li>
									<li class="menu-item ">
										<a href="#">Support &#038; FAQ</a>
									</li>
									<li class="usermenu_login">
										<!--<a href="#user-popUp" class="user-popup-link">Login</a>-->
                                        <a href="http://correctleads.com/member/login" class="">Login</a>
									</li>
								</ul>
							</div>
							<div class="menuUsItem menuItemLeft">
							<span class="icon-phone"></span> 
							0800 123 4567
							<span class="icon-email"></span>
							<a href="#">
								<span>info@example.com</span>
							</a>
							</div>
						</div>
					</div>
					<div class="mainmenu_area">
						<div class="container with_logo_left">
							<div class="logo logo_left">
								<a href="index.php">
									<?php
									  if(is_file($file_logo) && file_exists($file_logo))
									  {
									?>
                                    <img src="<?=$file_logo?>" style="width:209px;height:64px;" class="logo_main" alt="">
									<img src="<?=$file_logo?>"  style="width:209px;height:64px;"  class="logo_fixed" alt="">
									<span class="logo_slogan"></span>
                                    <?php
									  }
									  else
									  {
									?>
                                    <img src="seo_v1.1/images//209x64.png" class="logo_main" alt="">
									<img src="seo_v1.1/images//209x64.png" class="logo_fixed" alt="">
									<span class="logo_slogan"></span>
                                    <?php
									  }
									?>  
								</a>
							</div>
						<div class="search" title="Open/close search form">
							<div class="searchForm">
								<form role="search" method="get" class="search-form" action="#">
									<button type="submit" class="searchSubmit" title="Start search">
										<span class="icoSearch"></span>
									</button>
									<input type="text" class="searchField" placeholder="Search &hellip;" value="" name="s" title="Search for:"/>
								</form>
							</div>
							<div class="ajaxSearchResults"></div>
						</div>
						<a href="#" class="openResponsiveMenu">Menu</a>
						<nav role="navigation" class="menuTopWrap topMenuStyleLine">
							<ul id="mainmenu" class="">
								<li class="menu-item   menu-item-home">
									<a href="index.php">Home</a>
								</li>
								<!--<li class="menu-item menu-item-has-children columns custom_view_item">
									<a title="Tools and Pages" href="#">Features</a>
									<ul class="menu-panel columns">
										<li>
											<ul class="custom-menu-style columns sub-menu">
												<li class="menu-item menu-item-has-children">
													<a href="#">
														Tools
														<span class="menu_item_description">
															Standard theme instruments
														</span>
													</a>
													<ul class="sub-menu">
														<li class="menu-item">
															<a href="features_tools_typography.html">Typography</a>
														</li>
														<li class="menu-item">
															<a href="features_tools_shortcodes_accordion.html">Shortcodes</a>
														</li>
														<li class="menu-item">
															<a href="features_tools_post_formats.html">Post formats &#038; All widgets</a>
														</li>
														<li class="menu-item">
															<a href="features_tools_events_calendar.html">Events Calendar</a>
														</li>
														<li class="menu-item">
															<a target="_blank" href="doc/index.html">Documentation</a>
														</li>
													</ul>
												</li>
												<li class="menu-item menu-item-has-children">
													<a href="#">
														Pages
														<span class="menu_item_description">
															Sample theme pages
														</span>
													</a>
													<ul class="sub-menu">
														<li class="menu-item">
															<a href="features_pages_about_us.html">About Us</a>
														</li>
														<li class="menu-item">
															<a href="features_pages_contact_us.html">Contact Us</a>
														</li>
														<li class="menu-item">
															<a href="features_pages_faq.html">FAQ</a>
														</li>
														<li class="menu-item">
															<a href="features_pages_404.html">Page 404</a>
														</li>
														<li class="menu-item">
															<a href="features_pages_under_constraction.html">Under Construction</a>
														</li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</li>-->
								<li class="menu-item  current-menu-item current_page_item">
									<a href="services.php">Services</a>
								</li>
								<li class="menu-item">
									<a href="pricing.php">Pricing</a>
								</li>
								<!--<li class="menu-item menu-item-has-children">
									<a title="Posts pages" href="#">Blog</a>
									<ul class="sub-menu">
										<li class="menu-item menu-item-has-children">
											<a href="#">Classic Style</a>
											<ul class="sub-menu">
												<li class="menu-item">
													<a href="blog_classic_blog_with_sidebar.html">Blog with sidebar</a>
												</li>
												<li class="menu-item">
													<a href="blog_classic_blog_without_sidebar.html">Blog without sidebar</a>
												</li>
											</ul>
										</li>
										<li class="menu-item menu-item-has-children">
											<a href="#">Masonry Style</a>
											<ul class="sub-menu">
												<li class="menu-item">
													<a href="blog_masonry_2_columns.html">2 columns</a>
												</li>
												<li class="menu-item">
													<a href="blog_masonry_2_columns_with_sidebar.html">2 columns with sidebar</a>
												</li>
												<li class="menu-item">
													<a href="blog_masonry_3_columns.html">3 columns</a>
												</li>
												<li class="menu-item">
													<a href="blog_masonry_3_columns_with_sidebar.html">3 columns with sidebar</a>
												</li>
												<li class="menu-item">
													<a href="blog_masonry_4_columns.html">4 columns</a>
												</li>
											</ul>
										</li>
										<li class="menu-item menu-item-has-children">
											<a href="#">Single post</a>
											<ul class="sub-menu">
												<li class="menu-item">
													<a href="blog_single_post_standard_post.html">Standard Post</a>
												</li>
												<li class="menu-item">
													<a href="blog_single_post_standard_post_with_sidebar.html">Standard Post with Sidebar</a>
												</li>
												<li class="menu-item">
													<a href="blog_single_post_review_post.html">Review Post</a>
												</li>
												<li class="menu-item">
													<a href="blog_single_post_review_post_with_sidebar.html">Review Post with Sidebar</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="menu-item menu-item-has-children">
									<a title="Layouts and hovers" href="#">Projects</a>
									<ul class="sub-menu">
										<li class="menu-item menu-item-has-children">
											<a href="#">Classic Style</a>
											<ul class="sub-menu">
												<li class="menu-item">
													<a href="projects_classic_1_columns.html">1 columns</a>
												</li>
												<li class="menu-item">
													<a href="projects_classic_2_columns.html">2 columns</a>
												</li>
												<li class="menu-item">
													<a href="projects_classic_2_columns_with_sidebar.html">2 columns with sidebar</a>
												</li>
												<li class="menu-item">
													<a href="projects_classic_3_columns.html">3 columns</a>
												</li>
												<li class="menu-item">
													<a href="projects_classic_3_columns_with_sidebar.html">3 columns with sidebar</a>
												</li>
												<li class="menu-item">
													<a href="projects_classic_4_columns.html">4 columns</a>
												</li>
											</ul>
										</li>
										<li class="menu-item menu-item-has-children">
											<a href="#">Masonry style</a>
											<ul class="sub-menu">
												<li class="menu-item">
													<a href="projects_masonry_2_columns.html">2 columns</a>
												</li>
												<li class="menu-item">
													<a href="projects_masonry_2_columns_with_sidebar.html">2 columns with sidebar</a>
												</li>
												<li class="menu-item">
													<a href="projects_masonry_3_columns.html">3 columns</a>
												</li>
												<li class="menu-item">
													<a href="projects_masonry_3_columns_with_sidebar.html">3 columns with sidebar</a>
												</li>
												<li class="menu-item">
													<a href="projects_masonry_4_columns.html">4 columns</a>
												</li>
											</ul>
										</li>
										<li class="menu-item menu-item-has-children">
											<a href="#">Portfolio post</a>
											<ul class="sub-menu">
												<li class="menu-item">
													<a href="projects_portfolio_post_standard.html">Standard</a>
												</li>
												<li class="menu-item">
													<a href="projects_portfolio_post_fullscreen.html">Fullscreen</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>-->
							</ul>
						</nav>
						</div>
					</div>
				</div>
			</header>
             
             
            <?php
			      unset($info);
				  unset($data);
			   	$info["table"] = "cms_serviceslide";
				$info["fields"] = array("cms_serviceslide.*"); 
				$info["where"]   = "1";
				$arr2 =  $db->select($info);
			
			?> 
             
             
			<section class="dark_section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="text-center">
								<h1 class="sc_title sc_title_regular sc_title_bold margin_top_large">
									 <?php
									  if(isset($arr2[0]['text1']))
									  {
								 	 ?>
                                       <?=$arr2[0]['text1']?>
                                      <?php
									  }
									  else
									  {  
									?>
                                       Want to get ranked number 1?
                                    <?php	  
									  }
									?> </h1>
								<h5 class="sc_highlight"> <?php
									  if(isset($arr2[0]['text2']))
									  {
								 	 ?>
                                       <?=$arr2[0]['text2']?>
                                      <?php
									  }
									  else
									  {  
									?>
                                       Order a bundle of the most comprehensive marketing services from us!
                                    <?php	  
									  }
									?></h5>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="text-center animated">
								<div class="sc_button sc_button_style_global sc_button_size_banner squareButton global banner">
									<a href="<?php
									  if(isset($arr2[0]['link']))
									  {
								 	 ?>
                                       <?=$arr2[0]['link']?>
                                      <?php
									  }
									?>" class=""><?php
									  if(isset($arr2[0]['text3']))
									  {
								 	 ?>
                                       <?=$arr2[0]['text3']?>
                                      <?php
									  }
									  else
									  {  
									?>
                                      Request a quote
                                    <?php	  
									  }
									?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			<div class="mainWrap without_sidebar">
				<div class="content">
					
					<section class="light_section">
						<div class="container">
							
							<div class="row animated">
								<div class="col-sm-12">
									<div class="text-center">
										<h1 class="sc_title sc_title_regular sc_title_bold">How We Turn You Into A Leader</h1>
										<h3 class="sc_title sc_title_regular">We are driven by the passion to explore new strategies, innovate, and experiment. Our mission is to maximize the reputation, performance and positioning of our customers.</h3>
									</div>
								</div>
							</div>
							<div class="row animated">
								<div class="col-sm-4">
									<div class="text-center">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt=""/>
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">SEO Audit &amp; Review</h3>
										</a>
										<div class="sc_section bg_tint_none sc_aligncenter">
											<span class="sc_highlight sc_highlight_style_3">We’ll conduct a free audit of your site&#8230;</span>
										</div>
										<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small margin_bottom_middle ico">
											<a href="#" class="inherit">Learn More</a>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="text-center">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt=""/>
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Search Engine Optimization</h3>
										</a>
										<div class="sc_section bg_tint_none sc_aligncenter">
											<span class="sc_highlight sc_highlight_style_3">You will be found on top of search list&#8230;</span>
										</div>
										<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small margin_bottom_middle ico">
											<a href="#" class="inherit">Learn More</a>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="text-center">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt=""/>
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Pay-Per-Click Advertising</h3>
										</a>
										<div class="sc_section bg_tint_none sc_aligncenter">
											<span class="sc_highlight sc_highlight_style_3">Adwords, Yahoo, and Bing advertising&#8230;</span>
										</div>
										<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small margin_bottom_middle ico">
											<a href="#" class="inherit">Learn More</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row animated">
								<div class="col-sm-4">
									<div class="text-center">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt=""/>
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Social Media Development</h3>
										</a>
										<div class="sc_section bg_tint_none sc_aligncenter">
											<span class="sc_highlight sc_highlight_style_3">Your social accounts administration&#8230;</span>
										</div>
										<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small margin_bottom_middle ico">
											<a href="#" class="inherit">Learn more</a>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="text-center">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt=""/>
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">E-mail Marketing</h3>
										</a>
										<div class="sc_section bg_tint_none sc_aligncenter">
											<span class="sc_highlight sc_highlight_style_3">Keeping in touch with your customers&#8230;</span>
										</div>
										<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small margin_bottom_middle ico">
											<a href="#" class="inherit">Learn more</a>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="text-center">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt=""/>
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Web Design &amp; Development</h3>
										</a>
										<div class="sc_section bg_tint_none sc_aligncenter">
											<span class="sc_highlight sc_highlight_style_3">Outstanding design to be recognized&#8230;</span>
										</div>
										<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small margin_bottom_middle ico">
											<a href="#" class="inherit">Learn more</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row animated">
								<div class="col-sm-4">
									<div class="text-center">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt=""/>
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Conversion Optimization</h3>
										</a>
										<div class="sc_section bg_tint_none sc_aligncenter">
											<span class="sc_highlight sc_highlight_style_3">We turn your visitors into your clients&#8230;</span>
										</div>
										<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small ico">
											<a href="#" class="inherit">Learn more</a>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="text-center">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt=""/>
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Mobile Optimization</h3>
										</a>
										<div class="sc_section bg_tint_none sc_aligncenter">
											<span class="sc_highlight">Completely dynamic mobile websites&#8230;</span>
										</div>
										<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small ico">
											<a href="#" class="inherit">Learn More</a>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="text-center">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt=""/>
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Reputation Management</h3>
										</a>
										<div class="sc_section bg_tint_none sc_aligncenter">
											<span class="sc_highlight sc_highlight_style_3">We make sure your image stays fixed&#8230;</span>
										</div>
										<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small ico">
											<a href="#" class="inherit">Learn More</a>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</section>
					<section class="yellow_section">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-sm-7">
									<h2 class="sc_title sc_title_bold sc_title_regular">Try our 30 days free services</h2>
									<span class="sc_highlight sc_highlight_style_6">See how we optimize your site’s performances and grow your business!</span>
								</div>
								<div class="col-md-4 col-sm-5">
									<div class="text-center">
										<div class="sc_button sc_button_style_dark sc_button_size_banner squareButton dark banner margin_top_small">
											<a href="#" class="">Request Free SEO</a>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</section>
				</div>
			</div>

			<div class="footerContentWrap">
				<footer class="footerWrap footerStyleDark">
					<div class="container footerWidget widget_area">
						<aside class="col-md-4 col-sm-12 widgetWrap widget widget_text">
							<h3 class="title">Follow us</h3>			
							<div class="textwidget">
								<p>Don't miss our news, debates, and inspiring stories. Find us on social networks!
								<ul  class="sc_social">
									<li>
										<a class="social_icons social_facebook" target="_blank" href="http://facebook.com"> </a>
									</li>
									<li>
										<a class="social_icons social_pinterest" target="_blank" href="http://pinterest.com"> </a>
									</li>
									<li>
										<a class="social_icons social_twitter" target="_blank" href="http://twitter.com"> </a>
									</li>
									<li>
										<a class="social_icons social_gplus" target="_blank" href="http://gplus.com"> </a>
									</li>
									<li>
										<a class="social_icons social_linkedin" target="_blank" href="http://linkedin.com"> </a>
									</li>
									<li>
										<a class="social_icons social_vimeo" target="_blank" href="http://vimeo.com"> </a>
									</li>
								</ul>
								<p>
									&copy; 2015 All rights reserved. 
									<a href="#">Terms of Use</a> 
									and 
									<a href="#">Privacy Policy</a>
								</p>
							</div>
						</aside>
						<aside class="col-md-4 col-sm-6 widgetWrap widget widget_nav_menu">
							<h3 class="title">General Information</h3>
							<div class="menu-general-information-container">
								<ul id="menu-general-information" class="menu">
									<li class="menu-item ">
										<a href="#">Plans &#038; Pricing</a>
									</li>
									<li class="menu-item ">
										<a href="#">Free SEO Tools</a>
									</li>
									<li class="menu-item ">
										<a href="#">Support and FAQ</a>
									</li>
									<li class="menu-item ">
										<a href="#">Blog &#038; Articles</a>
									</li>
									<li class="menu-item ">
										<a href="#">Company &#038; Contact Info</a>
									</li>
									<li class="menu-item ">
										<a href="#">Terms of Service</a>
									</li>
									<li class="menu-item ">
										<a href="#">Privacy Policy</a>
									</li>
								</ul>
							</div>
						</aside>
						<aside class="col-md-4 col-sm-6 widgetWrap widget widget_text">
							<h3 class="title">Request a free quote</h3>
							<div class="textwidget">
								<p>Looking for SEO consultation?
								<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge">
								<a href="#" class="">SEND REQUEST</a>
								</div>
							</div>
						</aside>
					</div>
				</footer>
			</div>
		</div>
	</div>

	<div id="preloader" class="preloader">
	    <div class="preloader_image"></div>
	</div>


	<script type='text/javascript' src='seo_v1.1/js/vendor/jquery.js'></script>
	<script type='text/javascript' src='seo_v1.1/js/vendor/jquery-migrate.min.js'></script>
	<script type='text/javascript' src='seo_v1.1/js/vendor/bootstrap.min.js'></script>

	<script type='text/javascript' src='seo_v1.1/js/custom/_main.js'></script>

	<script type='text/javascript' src='seo_v1.1/js/vendor/_packed.js'></script>
	<script type='text/javascript' src='seo_v1.1/js/custom/shortcodes_init.min.js'></script>
	<script type='text/javascript' src='seo_v1.1/js/custom/_front.min.js'></script>
	
</body>
</html>
