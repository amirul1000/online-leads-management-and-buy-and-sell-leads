<?php
 include("../template/header.php");
?>
<div id="authorize-container" class="desktop-md center-block">
<!--<div class="row-fluid">
<div class="span6">-->

 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","plan"))?></b>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>             
            <div class="portlet-body">
	         <div class="table-responsive">	
                <table class="table">                 
				   <tr>
				   <td> 
				
						<div class="portlet-body">
				      <div class="table-responsive">	
				          <table class="table">
							<tr bgcolor="#ABCAE0">
                                <td>Plan name</td>
                                <td>Price</td>
                                <td>No Of Leads Allow</td>
                                <td>Description</td>
                                <td></td>
							</tr>
						 <?php
										  
								$info["table"] = "plan";
								$info["fields"] = array("plan.*"); 
								$info["where"]   = "1   $whrstr ORDER BY price ASC";
													
								
								$arr =  $db->select($info);
								
								for($i=0;$i<count($arr);$i++)
								{
								
								   $rowColor;
						
									if($i % 2 == 0)
									{
										
										$row="#C8C8C8";
									}
									else
									{
										
										$row="#FFFFFF";
									}
								
						 ?>
							<tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
							  <td><?=$arr[$i]['plan_name']?></td>
                              <td><?=$arr[$i]['price']?></td>
                              <td><?=$arr[$i]['no_of_leads_allow']?></td>
                              <td><?=$arr[$i]['description']?></td>
							  <td nowrap >
								  <form action="http://correctleads.com/member/buy_leads/index.php" method="POST">
                                      <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_2SkKeiVfRjOQGtQtK49yVzaU"
                                        data-amount="<?=$arr[$i]['price']*100?>"
                                        data-name="correctleads"
                                        data-description="<?=$arr[$i]['description']?>"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto">
                                      </script>
                                      <input type="hidden" name="inputvalue" value="<?=$arr[$i]['price']?>">
                                      <input type="hidden" name="leads" value="<?=$arr[$i]['no_of_leads_allow']?>">
                                      <input type="hidden" name="cmd" value="payment_success">
                                    </form>							
                                                            
                             </td>
						
							</tr>
						<?php
								  }
						?>
						
						</table>
						</div>
					 </div>				
				</td>
				</tr>
				</table>
				</div>
			</div>
		</div>
        
<!--</div>
</div>-->
</div>         
<?php
include("../template/footer.php");
?>









