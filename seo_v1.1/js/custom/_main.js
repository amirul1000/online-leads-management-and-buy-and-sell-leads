jQuery(window).load(function() {
    "use strict";
    preloader();
})

jQuery(document).ready(function() {
    "use strict";
	main_slider_init();
	uptoscroll_inited();
	popup_block_inited();
	reviews_stars();
	reject_init();
	Axiom_contact_form_send();	
});


//preloader
function preloader(){
    "use strict";
    jQuery(".preloaderimg", "#preloader").fadeOut();
    jQuery("#preloader").delay(200).fadeOut("slow").delay(200, function(){
        jQuery(this).remove();
    });
}


/* init reject */	
function reject_init(){
    "use strict";
		jQuery.reject({
		reject : {
			all: false, // Nothing blocked
			msie5: true, msie6: true, msie7: true, msie8: true // Covers MSIE 5-8
		},
		imagePath: "images/",
		header: "Your browser is out of date", // Header Text
		paragraph1: "You are currently using an unsupported browser", // Paragraph 1
		paragraph2: "Please install one of the many optional browsers below to proceed",
		closeMessage: "Close this window at your own demise!" // Message below close window link
	});
}

/* init main slider */
function main_slider_init(){
    "use strict";

        if (jQuery("#mainslider_1").length > 0) {
			var setREVStartSize = function() {
					var	tpopt = new Object();
					tpopt.startwidth = 1386;
					tpopt.startheight = 586;
					tpopt.container = jQuery('#rev_slider');
					tpopt.fullScreen = "off";
					tpopt.forceFullWidth="off";
				tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
			};
			/* CALL PLACEHOLDER */
			setREVStartSize();
			var tpj=jQuery;
			tpj.noConflict();
			var revapi9;
			tpj(document).ready(function() {
			if(tpj('#rev_slider').revolution == undefined)
				revslider_showDoubleJqueryError('#rev_slider');
			else
			revapi9 = tpj('#rev_slider').show().revolution(
				{
					dottedOverlay:"none",
					delay:14000,
					startwidth:1386,
					startheight:586,
					hideThumbs:200,
					thumbWidth:100,
					thumbHeight:50,
					thumbAmount:3,
					simplifyAll:"off",
					navigationType:"bullet",
					navigationArrows:"solo",
					navigationStyle:"round",
					touchenabled:"on",
					onHoverStop:"on",
					nextSlideOnWindowFocus:"off",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					drag_block_vertical: false,
					parallax:"mouse",
					parallaxBgFreeze:"off",
					parallaxLevels:[2,4,6,8,10,12,14,16,18,20],
					parallaxDisableOnMobile:"on",
					keyboardNavigation:"off",
					navigationHAlign:"center",
					navigationVAlign:"bottom",
					navigationHOffset:0,
					navigationVOffset:20,
					soloArrowLeftHalign:"left",
					soloArrowLeftValign:"center",
					soloArrowLeftHOffset:20,
					soloArrowLeftVOffset:0,
					soloArrowRightHalign:"right",
					soloArrowRightValign:"center",
					soloArrowRightHOffset:20,
					soloArrowRightVOffset:0,
					shadow:0,
					fullWidth:"on",
					fullScreen:"off",
					spinner:"spinner0",
					stopLoop:"off",
					stopAfterLoops:-1,
					stopAtSlide:-1,
					shuffle:"off",
					autoHeight:"off",
					forceFullWidth:"off",
					hideThumbsOnMobile:"off",
					hideNavDelayOnMobile:1500,
					hideBulletsOnMobile:"off",
					hideArrowsOnMobile:"off",
					hideThumbsUnderResolution:0,
					hideSliderAtLimit:0,
					hideCaptionAtLimit:0,
					hideAllCaptionAtLilmit:0,
					startWithSlide:0					
				});
				
			});
		}
		if (jQuery("#mainslider_2").length > 0) {
			/******************************************
				-	PREPARE PLACEHOLDER FOR SLIDER	-
			******************************************/
			

			var setREVStartSize = function() {
				var	tpopt = new Object();
					tpopt.startwidth = 1150;
					tpopt.startheight = 350;
					tpopt.container = jQuery('#rev_slider');
					tpopt.fullScreen = "off";
					tpopt.forceFullWidth="off";

				tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
			};

			/* CALL PLACEHOLDER */
			setREVStartSize();


			var tpj=jQuery;
			tpj.noConflict();
			var revapi7;

			tpj(document).ready(function() {

			if(tpj('#rev_slider').revolution == undefined)
				revslider_showDoubleJqueryError('#rev_slider');
			else
			   revapi7 = tpj('#rev_slider').show().revolution(
				{
					dottedOverlay:"none",
					delay:7000,
					startwidth:1150,
					startheight:350,
					hideThumbs:200,
					thumbWidth:100,
					thumbHeight:50,
					thumbAmount:5,
					minHeight:350,
					simplifyAll:"off",
					navigationType:"thumb",
					navigationArrows:"solo",
					navigationStyle:"round",
					touchenabled:"on",
					onHoverStop:"on",
					nextSlideOnWindowFocus:"off",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					drag_block_vertical: false,
					parallax:"mouse",
					parallaxBgFreeze:"off",
					parallaxLevels:[5,10,15,20,25,30,35,40,45,50],
					parallaxDisableOnMobile:"on",
					keyboardNavigation:"off",
					navigationHAlign:"center",
					navigationVAlign:"bottom",
					navigationHOffset:0,
					navigationVOffset:20,
					soloArrowLeftHalign:"left",
					soloArrowLeftValign:"center",
					soloArrowLeftHOffset:20,
					soloArrowLeftVOffset:0,
					soloArrowRightHalign:"right",
					soloArrowRightValign:"center",
					soloArrowRightHOffset:20,
					soloArrowRightVOffset:0,
					shadow:0,
					fullWidth:"on",
					fullScreen:"off",
					spinner:"spinner0",
					stopLoop:"off",
					stopAfterLoops:-1,
					stopAtSlide:-1,
					shuffle:"off",
					autoHeight:"off",
					forceFullWidth:"off",
					hideThumbsOnMobile:"off",
					hideNavDelayOnMobile:1500,
					hideBulletsOnMobile:"off",
					hideArrowsOnMobile:"off",
					hideThumbsUnderResolution:0,
					hideSliderAtLimit:0,
					hideCaptionAtLimit:0,
					hideAllCaptionAtLilmit:0,
					startWithSlide:0					
				});
				
			});	/*ready*/
		}
}

/* Add login popup block */
function popup_block_inited() {
    "use strict";
	if (jQuery("body.usermenu_show").length > 0) {

		var usermenu  ='<div id="user-popUp" class="user-popUp mfp-with-anim mfp-hide">';
		usermenu  +=	'<div class="sc_tabs">';
		usermenu  +=		'<ul class="loginHeadTab">';
		usermenu  +=			'<li>';
		usermenu  +=				'<a href="#loginForm" class="loginFormTab icon">Log In</a>';
		usermenu  +=			'</li>';
		usermenu  +=			'<li>';
		usermenu  +=				'<a href="#registerForm" class="registerFormTab icon">Create an Account</a>';
		usermenu  +=			'</li>';
		usermenu  +=		'</ul>';
		usermenu  +=		'<div id="loginForm" class="formItems loginFormBody">';
		usermenu  +=			'<div class="itemformLeft">';
		usermenu  +=				'<form action="#" method="post" name="login_form" class="formValid">';
		usermenu  +=					'<input type="hidden" name="redirect_to" value="#" />';
		usermenu  +=					'<ul class="formList">';
		usermenu  +=						'<li class="icon formLogin">';
		usermenu  +=							'<input type="text" id="login" name="log" value="" placeholder="Login">';
		usermenu  +=						'</li>';
		usermenu  +=						'<li class="icon formPass">';
		usermenu  +=							'<input type="password" id="password" name="pwd" value="" placeholder="Password">';
		usermenu  +=						'</li>';
		usermenu  +=						'<li class="remember">';
		usermenu  +=							'<a href="#" class="forgotPwd">Forgot password?</a>';
		usermenu  +=							'<input type="checkbox" value="forever" id="rememberme" name="rememberme">';
		usermenu  +=							'<label for="rememberme">Remember me</label>';
		usermenu  +=						'</li>';
		usermenu  +=						'<li>';
		usermenu  +=						'<a href="#" class="sendEnter enter">Login</a>';
		usermenu  +=						'</li>';
		usermenu  +=					'</ul>';
		usermenu  +=				'</form>';
		usermenu  +=			'</div>';
		usermenu  +=			'<div class="itemformRight">';
		usermenu  +=				'<ul class="formList">';
		usermenu  +=					'<li>You can login using your social profile</li>';
		usermenu  +=					'<li class="loginSoc">';
		usermenu  +=						'<a href="#" class="iconLogin fb"></a>';
		usermenu  +=						'<a href="#" class="iconLogin tw"></a>';
		usermenu  +=						'<a href="#" class="iconLogin gg"></a>';
		usermenu  +=					'</li>';
		usermenu  +=					'<li>';
		usermenu  +=						'<a href="#" class="loginProblem">Problem with login?</a>';
		usermenu  +=					'</li>';
		usermenu  +=				'</ul>';
		usermenu  +=			'</div>';
		usermenu  +=			'<div class="result messageBlock"></div>';
		usermenu  +=		'</div>';
		usermenu  +=		'<div id="registerForm" class="formItems registerFormBody">';
		usermenu  +=			'<form name="register_form" method="post" class="formValid">';
		usermenu  +=				'<input type="hidden" name="redirect_to" value="#"/>';
		usermenu  +=				'<div class="itemformLeft">';
		usermenu  +=					'<ul class="formList">';
		usermenu  +=						'<li class="icon formUser">';
		usermenu  +=							'<input type="text" id="registration_username" name="registration_username"  value="" placeholder="User name (login)">';
		usermenu  +=						'</li>';
		usermenu  +=						'<li class="icon formLogin">';
		usermenu  +=							'<input type="text" id="registration_email" name="registration_email" value="" placeholder="E-mail">';
		usermenu  +=						'</li>';
		usermenu  +=						'<li class="i-agree">';
		usermenu  +=							'<input type="checkbox" value="forever" id="i-agree" name="i-agree">';
		usermenu  +=							'<label for="i-agree">I agree with</label>';
		usermenu  +=							'<a href="#">Terms &amp; Conditions</a>';
		usermenu  +=						'</li>';
		usermenu  +=						'<li>';
		usermenu  +=							'<a href="" class="sendEnter enter">Sign Up</a>';
		usermenu  +=						'</li>';
		usermenu  +=					'</ul>';
		usermenu  +=				'</div>';
		usermenu  +=				'<div class="itemformRight">';
		usermenu  +=					'<ul class="formList">';
		usermenu  +=						'<li class="icon formPass">';
		usermenu  +=							'<input type="password" id="registration_pwd" name="registration_pwd" value="" placeholder="Password">';
		usermenu  +=						'</li>';
		usermenu  +=						'<li class="icon formPass">';
		usermenu  +=							'<input type="password" id="registration_pwd2" name="registration_pwd2" value="" placeholder="Confirm Password">';
		usermenu  +=						'</li>';
		usermenu  +=					'</ul>';
		usermenu  +=					'<div class="formDescription">Minimum 6 characters</div>';
		usermenu  +=				'</div>';
		usermenu  +=			'</form>';
		usermenu  +=			'<div class="result messageBlock"></div>';
		usermenu  +=		'</div>';
		usermenu  +=	'</div>';
		usermenu  +='</div>';

		jQuery('body').append(usermenu);

	}
}

/*Scroll to top*/
function uptoscroll_inited() {
    "use strict";

    var uptoscroll  ='<div class="upToScroll">';
    uptoscroll  +=	'<a href="#" class="addBookmark icon-star-empty" title="Add the current page into bookmarks"></a>';
	uptoscroll  +=	'<a href="#" class="scrollToTop icon-up-open-big" title="Back to top"></a>';
	uptoscroll  +='</div>';

	jQuery('body').append(uptoscroll);	
}

/*reviews stars*/
function reviews_stars() {
    "use strict";
    if (jQuery(".ratingItem").length > 0) {
        jQuery(".ratingItem").each(function() {
            var percent = jQuery(this).attr("data-mark");
            jQuery(this).find('.starHover').css({'width': percent + '%'});
        });
    }
}
