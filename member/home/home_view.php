
<?php
 include("../template/header.php");
 include("../template/header_extra.php");
?>
<div id="authorize-container" class="desktop-md center-block">
<!--<div class="row-fluid">
<div class="span6">-->
 
 <div class="portlet box blue">
           <div class="portlet-title">
                  Home
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            
            
            </div>  
            <div class="portlet-body"> 
            <h3 class="page-title">
				Dashboard <small>reports & statistics</small>
			</h3>   
              <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php
								 
								        $whrstr = " AND users_id='".$_SESSION['users_id']."'";
										
								  			unset($info);	
											unset($data);					
									   $info["table"] = "company";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY id DESC";
									   $res  = $db->select($info);  
					
												
										$numrows = $res[0]['total_rows'];
										echo $numrows;
								 ?>
							</div>
							<div class="desc">
								 Company
							</div>
						</div>
						<a class="more" href="../company">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                
                
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php
								 
								      $whrstr = " AND owner_users_id='".$_SESSION['users_id']."'";
										
								  			unset($info);	
											unset($data);					
									   $info["table"] = "myleads";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY id DESC";
									   $res  = $db->select($info);  
					
												
										$numrows = $res[0]['total_rows'];
										echo $numrows;
								 ?>
							</div>
							<div class="desc">
								Viewed  Leads (Bought)
							</div>
						</div>
						<a class="more" href="../leads/">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php
								 
								    $whrstr = " AND  users_id='".$_SESSION['users_id']."'";
									
									 unset($info);			  
									$info["table"] = "transaction";
									$info["fields"] = array("sum(transaction.credit)-sum(transaction.debit) as balance"); 
									$info["where"]   = "1   $whrstr";
									$arr =  $db->select($info);
									echo round($arr[0]['balance'],4);
								 ?>
							</div>
							<div class="desc">
								  Balance
							</div>
						</div>
						<a class="more" href="../transaction/">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php
								 
								     $whrstr = " AND  users_id='".$_SESSION['users_id']."'";
									 unset($info);		
									 unset($data);		
									$info["table"] = "leadtransaction";
									$info["fields"] = array("sum(leadtransaction.credit)-sum(leadtransaction.debit) as leads_remaining"); 
									$info["where"]   = "1   $whrstr";
									$arr =  $db->select($info);
									$leads_remaining =  $arr[0]['leads_remaining'];
									echo $leads_remaining;
								 ?>
							</div>
							<div class="desc">
								  no of leads allow
							</div>
						</div>
						<a class="more" href="../leadtransaction/">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                
                
            
            
            
            
                   
            
</div>
           </div>
</div>           
<!--</div>
</div>-->
</div>          
<?php
	include("../template/footer_extra.php");
	include("../template/footer.php");
?>









