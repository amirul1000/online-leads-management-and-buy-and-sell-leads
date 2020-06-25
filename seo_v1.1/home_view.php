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
	<link rel='stylesheet' id='rs-plugin-settings-css' href='seo_v1.1/js/vendor/revslider/css/settings.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='fontello-css' href='seo_v1.1/css/fontello.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='main-style-css' href='seo_v1.1/css/style.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='shortcodes-css' href='seo_v1.1/css/shortcodes.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='theme-skin-css' href='seo_v1.1/css/general.css' type='text/css' media='all'/>
	<style id="theme-skin-inline-css" type="text/css"></style>
	<link rel='stylesheet' id='responsive-css' href='seo_v1.1/css/responsive.css' type='text/css' media='all'/>
	
	<!--<link rel='stylesheet' href='seo_v1.1/custom_tools/css/custom_tools.css' type='text/css' media='all'/>-->
	
</head>

<body class="home page wild top_panel_above top_panel_opacity_transparent theme_skin_general usermenu_show">
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
									<li class="menu-item">
										<a href="#">Register for FREE!</a>
									</li>
									<li class="menu-item ">
										<a href="#">Support &#038; FAQ</a>
									</li>
									<li class="usermenu_login">
										<!--<a href="#user-popUp" class="user-popup-link">Login</a>-->
                                        <a href="member/login" class="">Login</a>
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
								<li class="menu-item  current-menu-item current_page_item  menu-item-home">
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
								<li class="menu-item ">
									<a href="services.php">Services</a>
								</li>
								<li class="menu-item ">
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
					 unset($info); 
					$info["table"] = "cms_homeslide";
					$info["fields"] = array("cms_homeslide.*"); 
					$info["where"]   = "1";
					$arr2 =  $db->select($info);
			
			?>

			<div id="mainslider_1" class="sliderHomeBullets staticSlider slider_engine_revo slider_alias_revo-seo1">
				<div id="rev_slider_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
					<div id="rev_slider" class="rev_slider fullwidthabanner">
						<ul>
							<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
								<img src="seo_v1.1/images/slider/transparent.png" class="slider_1_bg" alt="babbysitter-slider-ground" data-bgposition="center bottom" data-bgfit="normal" data-bgrepeat="no-repeat">
								<div class="tp-caption lfl rs-parallaxlevel-0" data-x="center" data-hoffset="-305" data-y="bottom" data-voffset="-111" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<div class="tp-layer-inner-rotation rs-slideloop" data-easing="Power3.easeInOut" data-speed="2" data-xs="0" data-xe="0" data-ys="0" data-ye="0">
									<?php
									  if(is_file($arr2[0]['file_slide1_472_272']) && file_exists($arr2[0]['file_slide1_472_272']))
									  {
									?>
                                        <img src="<?=$arr2[0]['file_slide1_472_272']?>" alt="">
                                      <?php
									  }
									  else
									  {  
									?>
                                    <img src="seo_v1.1/images//472x272.png" alt="">
                                    <?php	  
									  }
									?>  
									</div>
								</div>
								<div class="tp-caption customin rs-parallaxlevel-0" data-x="center" data-hoffset="-301" data-y="center" data-voffset="69" data-customin="x:0;y:60;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<?php
									  if(is_file($arr2[0]['file_slide1_297_118']) && file_exists($arr2[0]['file_slide1_297_118']))
									  {
									?>
                                        <img src="<?=$arr2[0]['file_slide1_297_118']?>" alt="">
                                      <?php
									  }
									  else
									  {  
									?>
                                   <img src="seo_v1.1/images//297x118.png" alt="">
                                    <?php	  
									  }
									?>  
                                    
                                    
								</div>
								<div class="tp-caption sfb rs-parallaxlevel-1" data-x="center" data-hoffset="-201" data-y="center" data-voffset="24" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									
                                     <?php
									  if(is_file($arr2[0]['file_slide1_139_149']) && file_exists($arr2[0]['file_slide1_139_149']))
									  {
									?>
                                        <img src="<?=$arr2[0]['file_slide1_139_149']?>" alt="">
                                      <?php
									  }
									  else
									  {  
									?>
                                    <img src="seo_v1.1/images//139x149.png" alt="">
                                    <?php	  
									  }
									?>  
                                    
                                   
								</div>
								<div class="tp-caption _seo_title lfr tp-resizeme rs-parallaxlevel-0" data-x="681" data-y="221" data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<div class="tp-layer-inner-rotation _seo_title  rs-slideloop" data-easing="Power3.easeInOut" data-speed="2" data-xs="0" data-xe="0" data-ys="0" data-ye="0">
										
                                   <?php
									  if(isset($arr2[0]['slide1_text1']))
									  {
									?>
                                       <?=$arr2[0]['slide1_text1']?>
                                      <?php
									  }
									  else
									  {  
									?>
                                    Let us make
                                    <?php	  
									  }
									?>  
                                       
									</div>
								</div>
								<div class="tp-caption _seo_title sfr tp-resizeme rs-parallaxlevel-0" data-x="681" data-y="291" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<div class="tp-layer-inner-rotation _seo_title  rs-slideloop" data-easing="Power3.easeInOut" data-speed="2" data-xs="0" data-xe="0" data-ys="0" data-ye="0">
									 <?php
									  if(isset($arr2[0]['slide1_text2']))
									  {
								 	 ?>
                                        <?=$arr2[0]['slide1_text2']?>
                                      <?php
									  }
									  else
									  {  
									?>
                                     your website stand out
                                    <?php	  
									  }
									?>  
                                        
                                       
									</div>
								</div>
								<!--<div class="tp-caption _text lfr tp-resizeme rs-parallaxlevel-0" data-x="681" data-y="391" data-speed="300" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<div class="tp-layer-inner-rotation _text  rs-slideloop" data-easing="Power3.easeInOut" data-speed="2" data-xs="0" data-xe="0" data-ys="0" data-ye="0">
										<a href='seo_v1.1/#' class='button-action red' data-text='FREE SEO REVIEW'>
											<span>FREE SEO REVIEW</span>
										</a>
									</div>
								</div>-->
							</li>
							<!--<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
								<img src="seo_v1.1/images/slider/transparent.png" class="slider_2_bg" alt="babbysitter-slider-ground" data-bgposition="center bottom" data-bgfit="normal" data-bgrepeat="no-repeat">
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="-445" data-y="center" data-voffset="150" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//36x37.png" alt="">
								</div>
								<div class="tp-caption tp-fade customout rs-parallaxlevel-0" data-x="center" data-hoffset="-445" data-y="center" data-voffset="150" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1.8;scaleY:1.8;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="600" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="900" data-endspeed="700">
									<img src="seo_v1.1/images//36x37.png" alt="">
								</div>
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="-445" data-y="center" data-voffset="100" data-speed="300" data-start="650" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//3x47.png" alt="">
								</div>
								<div class="tp-caption lft rs-parallaxlevel-0" data-x="center" data-hoffset="-444" data-y="center" data-voffset="20" data-speed="300" data-start="700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//109x116.png" alt="">
								</div>
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="262" data-y="center" data-voffset="145" data-speed="300" data-start="800" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//416x8.png" alt="">
								</div>
								<div class="tp-caption _seo_text sfb tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="-445" data-y="center" data-voffset="200" data-speed="300" data-start="800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									Ideas
								</div>
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="-230" data-y="center" data-voffset="50" data-speed="300" data-start="1100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//94x94.png" alt="">
								</div>
								<div class="tp-caption customin rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="150" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1.2;scaleY:1.2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//36x37.png" alt="">
								</div>
								<div class="tp-caption tp-fade customout rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="150" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1.8;scaleY:1.8;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1600" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="1900" data-endspeed="700">
									<img src="seo_v1.1/images//36x37.png" alt="">
								</div>
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="100" data-speed="300" data-start="1650" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//3x47.png" alt="">
								</div>
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="-10" data-speed="300" data-start="1700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//150x143.png" alt="">
								</div>
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="51" data-y="center" data-voffset="-25" data-speed="300" data-start="2100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//107x46.png" alt="">
								</div>
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="50" data-y="center" data-voffset="-30" data-speed="300" data-start="2000" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//104x54.png" alt="">
								</div>
								<div class="tp-caption _seo_text sfb tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="200" data-speed="300" data-start="1800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									Targeting
								</div>
								<div class="tp-caption customin rs-parallaxlevel-0" data-x="707" data-y="center" data-voffset="145" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 50%;" data-speed="300" data-start="1800" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//416x8.png" alt="">
								</div>
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="230" data-y="center" data-voffset="50" data-speed="300" data-start="2100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//150x143.png" alt="">
								</div>
								<div class="tp-caption customin rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="151" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1.2;scaleY:1.2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="2500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//36x37.png" alt="">
								</div>
								<div class="tp-caption tp-fade customout rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="151" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1.8;scaleY:1.8;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="2600" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="2900" data-endspeed="700">
									<img src="seo_v1.1/images//36x37.png" alt="">
								</div>
								<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="100" data-speed="300" data-start="2650" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//3x47.png" alt="">
								</div>
								<div class="tp-caption sft rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="20" data-speed="300" data-start="2700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<img src="seo_v1.1/images//103x86.png" alt="">
								</div>
								<div class="tp-caption _seo_text sfb tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="200" data-speed="300" data-start="2800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									Mission
								</div>
							</li>-->
							<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
								<img src="seo_v1.1/images/slider/transparent.png" class="slider_3_bg" alt="babbysitter-slider-ground" data-bgposition="center bottom" data-bgfit="normal" data-bgrepeat="no-repeat">
								<div class="tp-caption lfr rs-parallaxlevel-0" data-x="866" data-y="181" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									
                                      <?php
									  if(is_file($arr2[0]['file_slide2_395_319_1']) && file_exists($arr2[0]['file_slide2_395_319_1']))
									  {
									?>
                                        <img src="<?=$arr2[0]['file_slide2_395_319_1']?>" alt="">
                                      <?php
									  }
									  else
									  {  
									?>
                                   <img src="seo_v1.1/images//395x319.png" alt="">
                                    <?php	  
									  }
									?>  
                                    
                                    
                                    
								</div>
								<div class="tp-caption customin rs-parallaxlevel-0" data-x="center" data-hoffset="370" data-y="center" data-voffset="51" data-customin="x:0;y:60;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<div class="tp-layer-inner-rotation rs-pulse" data-easing="Power3.easeInOut" data-speed="2" data-zoomstart="1" data-zoomend="1.08">
										
                                    <?php
									  if(is_file($arr2[0]['file_slide2_361_129']) && file_exists($arr2[0]['file_slide2_361_129']))
									  {
									?>
                                        <img src="<?=$arr2[0]['file_slide2_361_129']?>" alt="">
                                      <?php
									  }
									  else
									  {  
									?>
                                    <img src="seo_v1.1/images//361x129.png" alt="">
                                    <?php	  
									  }
									?> 
                                       
									</div>
								</div>
								<div class="tp-caption tp-fade fadeout rs-parallaxlevel-0" data-x="866" data-y="181" data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1">
									
                                      <?php
									  if(is_file($arr2[0]['file_slide2_395_319_2']) && file_exists($arr2[0]['file_slide2_395_319_2']))
									  {
									?>
                                        <img src="<?=$arr2[0]['file_slide2_395_319_2']?>" alt="">
                                      <?php
									  }
									  else
									  {  
									?>
                                    <img src="seo_v1.1/images//395x319.png" alt="">
                                    <?php	  
									  }
									?>  
                                    
                                    
                                    
								</div>
								<div class="tp-caption _seo_title_small lfl tp-resizeme rs-parallaxlevel-0" data-x="116" data-y="201" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									
                                    <?php
									  if(isset($arr2[0]['slide2_text1']))
									  {
								 	 ?>
                                        <?=$arr2[0]['slide2_text1']?>
                                      <?php
									  }
									  else
									  {  
									?>
                                     Internet Marketing Solutions
                                    <?php	  
									  }
									?>  
                                    
                                    
								</div>
								<div class="tp-caption _seo_title_small lfl tp-resizeme rs-parallaxlevel-0" data-x="116" data-y="261" data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									
                                    <?php
									  if(isset($arr2[0]['slide2_text2']))
									  {
								 	 ?>
                                       <?=$arr2[0]['slide2_text2']?>
                                      <?php
									  }
									  else
									  {  
									?>
                                      Fast and Affordable
                                    <?php	  
									  }
									?>  
                                    
                                    
                                   
								</div>
								<!--<div class="tp-caption _text lfl tp-resizeme rs-parallaxlevel-0" data-x="116" data-y="371" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
									<a href='seo_v1.1/#' class='button-action darkgrey big' data-text='GET IT NOW!'>
										<span>GET IT NOW!</span>
									</a>
								</div>-->
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="mainWrap without_sidebar">
				<div class="content">
					<section class="light_section">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="sc_section bg_tint_none">
										<div class="sc_section bg_tint_none text-center">
											<div class="animated">
												<h3 class="sc_title sc_title_regular">Check your website’s SEO problems for free!</h3>
												<div class="sc_contact_form sc_contact_form_custom check_your_site">
													<form data-formtype="custom" method="post" action="#">
														<div class="sc_contact_form_field label_top site">
															<input type="text" name="1" value="" placeholder="Type in your Website URL">
														</div>
														<div class="sc_contact_form_field label_top email">
															<input type="text" name="2" value="" placeholder="Your Email">
														</div>
														<div class="sc_contact_form_field label_top button">
															<div class="sc_contact_form_button">
																<div class="squareButton global ico">
																	<a href="#" class="sc_contact_form_submit icon-comment-1">Checkup!</a>
																</div>
															</div>
														</div>
														<div class="result sc_infobox"></div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="grey_section">
						<div class="container">
							<div class="row ">
								<div class="col-sm-4">
									<div class="text-center animated">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt="" />
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Years of Expertise</h3>
										</a>
										<span class="sc_highlight sc_highlight_style_3">
											We have been on web marketing for 12 years helping you compete on Internet and converting your visitors into your clients.
										</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="text-center animated">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt="" />
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Over 2000 Clients</h3>
										</a>
										<span class="sc_highlight sc_highlight_style_3">
											We strive to ensure that our customers are satisfied and we work continuously to develop your projects and surpass your expectations.
										</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="text-center animated">
										<a class="sc_title_linked" href="#">
											<div class="sc_title_icon sc_title_top sc_size_huge inherit">
												<img src="seo_v1.1/images/icon/165x165.png" alt="" />
											</div>
											<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small">Real Results</h3>
										</a>
										<span class="sc_highlight sc_highlight_style_3">
											Rankings, links, brand, content, traffic – all you need is right here! Simply drop us a line, and you will get your conversions!
										</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="text-center animated">
										<div class="sc_button margin_top_big sc_button_style_dark sc_button_size_banner squareButton dark banner">
											<a href="#" class="">Start my Free 30-Day Trial</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="text-center animated">
										<h1 class="sc_title sc_title_regular margin_top_middle sc_title_big">What is SEO?</h1>
										<h3 class="sc_title sc_title_regular">Search Engine Optimization (SEO)</h3>
										<div class="sc_section bg_tint_none text-center">
											<span class="sc_highlight">
												Is the science of adjusting a website&#8217;s code, content and structure to make it visible on a search engine result page for particular keywords or combinations of keywords. The end-goal in any marketing venture is to generate a return on your investment, and SEO is capable of generating very attractive returns by bringing people to your website through search engines!
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</section>
					<section class="dark_section">
						<div class="container">
							<div class="">
								<div class="">
									<div class="row">
										<div class="text-center animated">
											<div class="col-sm-12">
												<h1 class="sc_title sc_title_big sc_title_regular">Our Services</h1>
												<h3 class="sc_title sc_title_regular margin_bottom_small">What You Get Using Our SEO Company&#8217;s Help</h3>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="animated">
												<div class="text-right margin_bottom_big">
													<div class="sc_title_icon sc_title_right sc_size_mini icon-record"></div>
													<h4 class="sc_title sc_title_iconed">
														<a href="#">Free Technical Audit</a>
													</h4>
													<div class="sc_section bg_tint_none">
														<span class="sc_highlight sc_highlight_style_3">
															We will check up to 200 pages for broken links, images, missing anchors and other issues.
														</span>
													</div>
												</div>
												<div class="text-right margin_bottom_big">
													<div class="sc_title_icon sc_title_right sc_size_mini icon-record"></div>
													<h4 class="sc_title sc_title_iconed">
														<a href="#">Free Keyword Suggestion</a>
													</h4>
													<div class="sc_section bg_tint_none">
														<span class="sc_highlight sc_highlight_style_3">
															Get unlimited suggestions of keywords and phrases related to your business.
														</span>
													</div>
												</div>
												<div class="text-right margin_bottom_big">
													<div class="sc_title_icon sc_title_right sc_size_mini icon-record"></div>
													<h4 class="sc_title sc_title_iconed">
														<a href="#">Content Submission</a>
													</h4>
													<div class="sc_section bg_tint_none">
														<span class="sc_highlight sc_highlight_style_3">
															We&#8217;ll post and share your URLs, text/media content across search engines and directories.
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="text-center animated">
												<figure class="sc_image  sc_image_shape_square">
													<img src="seo_v1.1/images/235x493.png" alt="" />
												</figure>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="animated">
												<div class="text-left margin_bottom_big">
													<div class="sc_title_icon sc_title_left sc_size_mini icon-record"></div>
													<h4 class="sc_title sc_title_iconed">
														<a href="#">Social Media Marketing</a>
													</h4>
													<div class="sc_section bg_tint_none">
														<span class="sc_highlight sc_highlight_style_3">
															We&#8217;ll generate a sitemap for your site, submit it to search engines and track crawler access.
														</span>
													</div>
												</div>
												<div class="text-left margin_bottom_big">
													<div class="sc_title_icon sc_title_left sc_size_mini icon-record"></div>
													<h4 class="sc_title sc_title_iconed">
														<a href="#"> Internal Links Optimization</a>
													</h4>
													<div class="sc_section bg_tint_none">
														<span class="sc_highlight sc_highlight_style_3">
															Get insights about your internal link texts and page authority metrics for up to 1000 pages.
														</span>
													</div>
												</div>
												<div class="text-left margin_bottom_big">
													<div class="sc_title_icon sc_title_left sc_size_mini icon-record"></div>
													<h4 class="sc_title sc_title_iconed">
														<a href="#">Paid Google Advertising</a>
													</h4>
													<div class="sc_section bg_tint_none">
														<span class="sc_highlight sc_highlight_style_3">
															Get insights about your internal link texts and page authority metrics for up to 1000 pages.
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="animated text-center margin_top_small">
												<div class="sc_button sc_button_style_global sc_button_size_big squareButton global big  ico" >
													<a href="#" class="inherit">Get a quote</a>
												</div>
												<div class="sc_button sc_button_style_global sc_button_size_big squareButton global big  ico">
													<a href="#" class="inherit">Learn More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</section>
					<section class="darkgrey_section">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-sm-7">
									<div class="animated">
										<span class="sc_highlight sc_highlight_style_4">Not enough for your SEO needs?</span>
										<span class="sc_highlight sc_highlight_style_5">Want to add more projects/ keywords/ pages to analyze?</span>
									</div>
								</div>
								<div class="col-md-4 col-sm-5">
									<div class="text-center">
										<div class="sc_button sc_button_style_dark sc_button_size_banner squareButton dark banner animated">
											<a href="#" class="">Go to Premium Features</a>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</section>
					<section class="light_section">
						<div class="container">
							<div class="row">
								<div class="col-sm-5">
									<div class="text-center animated">
										<figure class="sc_image  sc_image_shape_square">
											<img src="seo_v1.1/images/434x617.png" alt="" />
										</figure>
									</div>
								</div>
								<div class="col-sm-7 no_margin">
									<div class="animated">
										<h2 class="sc_title sc_title_regular sc_title_big">Premium Services Available in Higher Plans</h2>
										<div class="margin_top_small margin_bottom_middle">
											With the Free subscription plan, you can use 12 out of the 14 SEO tools available on the Web CEO SEO Platform. The premium SEO tool that is available only in paid subscription plans is the <strong>Competitor Backlink Spy Tool</strong> that will help you spy on your competitors&#8217; backlink strategies and find more link building opportunities for your site.
										</div>
										<ul class="sc_list sc_list_style_disk_style2">
											<li class="sc_list_item inherit">
												Inbound Marketing Strategy
											</li>
											<li class="sc_list_item inherit">
												Reputation Management
											</li>
											<li class="sc_list_item inherit">
												Web Design / Development
											</li>
											<li class="sc_list_item inherit">
												Website Speed Optimization
											</li>
											<li class="sc_list_item inherit">
												Responsive Website Design
											</li>
										</ul>
										<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge margin_top_small">
											<a href="#" class="">Sign Up Free!</a>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</section>
					<section class="red_section">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="animated text-center">
										<h1 class="sc_title sc_title_bold sc_title_regular">Our Customers Love us</h1>
										<div class="sc_testimonials sc_testimonials_style_4">
											<div class="sc_slider sc_slider_swiper sc_slider_nopagination sc_slider_autoheight swiper-slider-container" data-interval="7000">
												<ul class="sc_testimonials_items slides swiper-wrapper">
													<li class="sc_testimonials_item swiper-slide">
														<div class="sc_testimonials_item_content">
															<div class="sc_testimonials_item_quote">
																<div class="sc_testimonials_item_text">
																	This SEO Company has been a fantastic asset to our online marketing strategy. Over a few years of poorly managed SEO, they were able to come on-board and turn our website ranking around. Great reporting processes and contact from our campaign manager. We will continue to use their services for many years to come!
																</div>
															</div>
															<div class="sc_testimonials_item_author">
																<div class="sc_testimonials_item_avatar">
																	<img alt="avatar_1.png" src="seo_v1.1/images/100x100.png">
																</div>
																<div class="sc_testimonials_item_name">
																	Larry Himmel,
																</div>
																<div class="sc_testimonials_item_position">
																	Web Designer, Axiom
																</div>
															</div>
															<div class="sc_testimonials_item_object">
																<div class="object"></div>
															</div>
														</div>
													</li>
													<li class="sc_testimonials_item swiper-slide">
														<div class="sc_testimonials_item_content">
															<div class="sc_testimonials_item_quote">
																<div class="sc_testimonials_item_text">
																	Our traffic has increased by 64% since they’ve worked on our site and they got multiple keywords we were ranking poorly for up to the page. In fact, our keywords have improved by an average of 56 positions during our time with this company. I highly recommend their SEO as they have made a great difference to our business.
																</div>
															</div>
															<div class="sc_testimonials_item_author">
																<div class="sc_testimonials_item_avatar">
																	<img alt="avatar_1.png" src="seo_v1.1/images/100x100.png">
																</div>
																<div class="sc_testimonials_item_name">
																	John Doe,
																</div>
																<div class="sc_testimonials_item_position">
																	CEO, Global Logic
																</div>
															</div>
															<div class="sc_testimonials_item_object">
																<div class="object"></div>
															</div>
														</div>
													</li>
													<li class="sc_testimonials_item swiper-slide">
														<div class="sc_testimonials_item_content">
															<div class="sc_testimonials_item_quote">
																<div class="sc_testimonials_item_text">
																	My company has had a very noticeable positive growth in organic traffic and rankings since they were brought on board. The team that has been assigned my site continues to demonstrate great communication and knowledge regarding not only link building, but also on and off-site SEO practices as well.
																</div>
															</div>
															<div class="sc_testimonials_item_author">
																<div class="sc_testimonials_item_avatar">
																	<img src="seo_v1.1/images/100x100.png" alt="">
																</div>
																<div class="sc_testimonials_item_name">
																	Henry Kimmel,
																</div>
																<div class="sc_testimonials_item_position"> 
																	Senior Manager, AutoSale
																</div>
															</div>
															<div class="sc_testimonials_item_object">
																<div class="object"></div>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>	
					<section class="light_section">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="text-center animated">
										<h1 class="sc_title sc_title_bold sc_title_regular">Recent Articles</h1>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="sc_blogger style_image style_image_large animated">
									<article class="sc_blogger_item">
										<div class="thumb">
											<a href="#">
												<img alt="Make Users Fall in Love With Your Website" src="seo_v1.1/images/400x277.png">
											</a>
										</div>
										<h4 class="sc_blogger_title sc_title">
											<a href="#">Make Users Fall in Love With Your Website</a>
										</h4>		
										<div class="sc_blogger_content"></div>
										<div class="sc_blogger_info">
											<div class="squareButton light ico sc_blogger_more">
												<a class="icon-link" title="" href="#">More</a>
											</div>
											<div class="sc_blogger_author">
												Posted by 
												<a href="#" class="post_author">admin</a>
												<span class="separator">|</span> 
												Views 
												<span class="comments_number">281</span>
											</div>
										</div>
									</article>
								</div>
								</div>		
								<div class="col-sm-4">
									<div class="sc_blogger style_image style_image_large animated">
									<article class="sc_blogger_item">
										<div class="thumb">
											<a href="#">
												<img alt="How to Create Contents That Get Traffic" src="seo_v1.1/images/400x277.png">
											</a>
										</div>
										<h4 class="sc_blogger_title sc_title">
											<a href="#">How to Create Contents That Get Traffic</a>
										</h4>		
										<div class="sc_blogger_content"></div>
										<div class="sc_blogger_info">
											<div class="squareButton light ico sc_blogger_more">
												<a class="icon-link" title="" href="#">More</a>
											</div>
											<div class="sc_blogger_author">
												Posted by 
												<a href="#" class="post_author">admin</a>
												<span class="separator">|</span> 
												Views 
												<span class="comments_number">238</span>
											</div>
										</div>
									</article>
									</div>
								</div>		
								<div class="col-sm-4">
									<div class="sc_blogger style_image style_image_large animated">
									<article class="sc_blogger_item sc_blogger_item_last">
										<div class="thumb">
											<a href="#">
												<img alt="10 Marketing Blogs You Should be Reading" src="seo_v1.1/images/400x277.png">
											</a>
										</div>
										<h4 class="sc_blogger_title sc_title">
											<a href="#">10 Marketing Blogs You Should be Reading</a>
										</h4>		
										<div class="sc_blogger_content"></div>
										<div class="sc_blogger_info">
											<div class="squareButton light ico sc_blogger_more">
												<a class="icon-link" title="" href="#">More</a>
											</div>
											<div class="sc_blogger_author">
												Posted by 
												<a href="#" class="post_author">admin</a>
												<span class="separator">|</span> 
												Views 
												<span class="comments_number">162</span>
											</div>
										</div>
									</article>
									</div>
								</div>
							</div>
						</div>					
					</section>
				</div>
			</div>
			<div class="footerContentWrap">
				<footer class="footerWrap footerStyleDark">
					<div class="container footerWidget with_padding widget_area">
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
								<p class="copyright">
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
	<script type='text/javascript' src='seo_v1.1/js/vendor/revslider/js/jquery.themepunch.tools.min.js'></script>
	<script type='text/javascript' src='seo_v1.1/js/vendor/revslider/js/jquery.themepunch.revolution.min.js'></script>
	
	<script type='text/javascript' src='seo_v1.1/js/custom/_main.js'></script>
	<script type='text/javascript' src='seo_v1.1/js/vendor/_packed.js'></script>
	<script type='text/javascript' src='seo_v1.1/js/custom/shortcodes_init.min.js'></script>
	<script type='text/javascript' src='seo_v1.1/js/custom/_front.min.js'></script>
	
	<!--<script type='text/javascript' src='seo_v1.1/custom_tools/js/_customizer.js'></script>-->

</body>
</html>