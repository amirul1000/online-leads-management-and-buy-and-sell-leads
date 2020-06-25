<style>
	  .btn + .btn {
	   margin-left: 0px; 
	}
	
	.btn-block+.btn-block {
	     margin-top: 1px; 
	}
</style>
<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<?php
			  $b_name_file = basename($_SERVER['SCRIPT_FILENAME']);
			  $b_name_arr  = explode(".",$b_name_file);
			  $b_name      = $b_name_arr[0];
			?>
                        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				
              
                <li class="start">
					<a href="../home">
					<i class="icon-home"></i>
					<span class="title">Home</span>
					</a>
				</li>
				<li class="start active open">
					<a href="javascript:;">
					<i class="fa fa-cogs"></i>
					<span class="title">Menu</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>					
				</li>
                <li class="start"><a href="../users/index.php?cmd=list"><i class="icon-rocket"></i>Users</a></li>
                <li class="start"><a href="../country/index.php?cmd=list"><i class="icon-rocket"></i>Country</a></li>
                <li class="start"><a href="../state/index.php?cmd=list"><i class="icon-rocket"></i>State</a></li>
                <li class="start"><a href="../city/index.php?cmd=list"><i class="icon-rocket"></i>City</a></li>
                <li class="start"><a href="../company/index.php?cmd=list"><i class="icon-rocket"></i>Company</a></li>
                <li class="start"><a href="../leads/index.php?cmd=list"><i class="icon-rocket"></i>Leads</a></li>
                <li class="start"><a href="../payment_key/index.php?cmd=list"><i class="icon-rocket"></i>Payment Key</a></li>
                <li class="start"><a href="../plan/index.php?cmd=list"><i class="icon-rocket"></i>Plan</a></li>
                <li class="start"><a href="../transaction/index.php?cmd=list"><i class="icon-rocket"></i>Transaction</a></li>
                <li class="start"><a href="../leadtransaction/index.php?cmd=list"><i class="icon-rocket"></i>Lead transaction</a></li>
                <li class="start"><a href="../terms_condition/index.php?cmd=list"><i class="icon-rocket"></i>Terms condition</a></li>
                <li class="start"><a href="../support/index.php?cmd=list"><i class="icon-rocket"></i>Support</a></li>
                
                
                <li <?php if($b_name=="cmslogo" || $b_name=="cms_homeslide" || $b_name=="cms_priceslide") { ?> class="active open" <?php } ?>>
                    <a href="javascript:;">
                    <i class="fa fa-wrench"></i> 
                    <span class="title">CMS</span>
                    <span class="selected"></span>
                    <span class="arrow  <?php if($b_name=="cmslogo") { echo 'open'; } ?>"></span>
                    </a>
                    <ul class="sub-menu">
                          <li   <?php if($b_name=="cmslogo") { echo 'class="active"'; } ?>>
                            <a href="../cmslogo/index.php?cmd=list">
                            <i class="fa  fa-user"></i>
                            Logo</a>
                          </li>
                          <li   <?php if($b_name=="cms_homeslide") { echo 'class="active"'; } ?>>
                            <a href="../cms_homeslide/index.php?cmd=list">
                            <i class="fa  fa-user"></i>
                            CMS home slide</a>
                          </li>
                           <li   <?php if($b_name=="cms_serviceslide") { echo 'class="active"'; } ?>>
                            <a href="../cms_serviceslide/index.php?cmd=list">
                            <i class="fa  fa-user"></i>
                            CMS service slide</a>
                          </li>
                          <li   <?php if($b_name=="cms_priceslide") { echo 'class="active"'; } ?>>
                            <a href="../cms_priceslide/index.php?cmd=list">
                            <i class="fa  fa-user"></i>
                            CMS prices slide</a>
                          </li>
                    </ul>        
             	</li> 
                
                
			</ul>
			<!-- END SIDEBAR MENU -->
           
	
          
			
		</div>
	</div>
