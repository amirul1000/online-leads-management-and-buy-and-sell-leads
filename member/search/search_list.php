<?php
 include("../template/header.php");
 include("../template/header_extra.php");
?>
<script language="javascript">
	function fillState(value)
	{
	
		objselect = document.getElementById("state_id");
		objselect.options.length = 0;
		$("#spinner2").html('<img src="../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  url: 'index.php?cmd=get_state&country_id='+value,
		  success: function(data) {
				  var obj = eval(data);
				  objselect.add(new Option('-- Select State/Provience  --',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					 objselect.add(new Option(obj[i].name,obj[i].id), null);
				  }
				$("#spinner2").html('');
			  }
			});
	}
	function fillCity(value)
	{
	
		objselect = document.getElementById("city_id");
		objselect.options.length = 0;
		$("#spinner3").html('<img src="../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  url: 'index.php?cmd=get_city&state_id='+value,
		  success: function(data) {
				  var obj = eval(data);
				  objselect.add(new Option('-- Select City  --',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					 objselect.add(new Option(obj[i].name,obj[i].id), null);
				  }
				$("#spinner3").html('');
			  }
			});
	}
	
   function show(id) 
   {
	    $("#spinner").html('<img src="../images/indicator.gif" alt="Wait" />');        
        $.ajax({
        type: "POST",
        url: 'index.php',
        data: {
                cmd : 'detail',
				id  : id
              },
        success: function(data) {
               $("#lead_details_id_"+id).html(data);
               $("#spinner").html('');
            }
        });
	 
   }
   
</script>
<div id="authorize-container" class="desktop-md center-block">
<!--<div class="row-fluid">
<div class="span6">-->
            
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","Search"))?></b>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>             
            <div class="portlet-body">
	         <div class="table-responsive">
                 <form name="search_frm" id="search_frm" method="post">
							<div class="portlet-body">
					         <div class="table-responsive">	
                                <label for="searchbar"><img src="../images/icon_searchbox.png" alt="Search"></label>
				                <table class="table">
                                       <tr>
                                             <td>First Name</td>
                                             <td>
                                                <input type="form-control-static" name="first_name1" id="first_name"  value="<?=$_SESSION['first_name1']?>" class="form-control-static">
                                             </td>
                                        
                                             <td>Last Name</td>
                                             <td>
                                                <input type="form-control-static" name="last_name1" id="last_name"  value="<?=$_SESSION['last_name1']?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Contact</td>
                                             <td>
                                                <input type="form-control-static" name="contact" id="contact"  value="<?=$_SESSION['contact']?>" class="form-control-static">
                                             </td>
                                             <td>Title</td>
                                             <td>
                                                <?php
													$info['table']    = "leads";
													$info['fields']   = array("distinct(title) as title");   	   
													$info['where']    =  "1=1 ORDER BY title ASC";
													$restitle  =  $db->select($info);
												?>
												<select  name="title" id="title"   class="form-control-static">
													<option value="">--All--</option>
													<?php
													   foreach($restitle as $key=>$each)
													   { 
													?>
													  <option value="<?=$restitle[$key]['title']?>" <?php if($restitle[$key]['title']==$_SESSION['title']){ echo "selected"; }?>><?=$restitle[$key]['title']?></option>
													<?php
													 }
													?> 
												</select>
                                             </td>
                                         </tr><tr>
                                             <td>Company</td>
                                             <td>
                                                <input type="form-control-static" name="company" id="company"  value="<?=$_SESSION['company']?>" class="form-control-static">
                                             </td>
                                             <td>Business Email</td>
                                             <td>
                                                <input type="form-control-static" name="business_email" id="business_email"  value="<?=$_SESSION['business_email']?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Company Web</td>
                                             <td>
                                                <input type="form-control-static" name="company_web" id="company_web"  value="<?=$_SESSION['company_web']?>" class="form-control-static">
                                             </td>
                                             <td>City</td>
                                             <td>
                                                <?php
													$info['table']    = "leads";
													$info['fields']   = array("distinct(city) as city");   	   
													$info['where']    =  "1=1 ORDER BY city ASC";
													$rescity  =  $db->select($info);
												?>
												<select  name="city" id="city"   class="form-control-static">
													<option value="">--All--</option>
													<?php
													   foreach($rescity as $key=>$each)
													   { 
													?>
													  <option value="<?=$rescity[$key]['city']?>" <?php if($rescity[$key]['city']==$_SESSION['city']){ echo "selected"; }?>><?=$rescity[$key]['city']?></option>
													<?php
													 }
													?> 
												</select>
                                            
                                             </td>
                                         </tr><tr>
                                             <td>State</td>
                                             <td>
                                                <?php
													$info['table']    = "leads";
													$info['fields']   = array("distinct(state) as state");   	   
													$info['where']    =  "1=1 ORDER BY state ASC";
													$resstate  =  $db->select($info);
												?>
												<select  name="state" id="state"   class="form-control-static">
													<option value="">--All--</option>
													<?php
													   foreach($resstate as $key=>$each)
													   { 
													?>
													  <option value="<?=$resstate[$key]['state']?>" <?php if($resstate[$key]['state']==$_SESSION['state']){ echo "selected"; }?>><?=$resstate[$key]['state']?></option>
													<?php
													 }
													?> 
												</select>
                                             </td>
                                             <td></td>
                                             <td></td>
                                         </tr>
                                      <tr>
                                             <td colspan="3"></td>
                                             <td nowrap="nowrap" align="right">
                                              <input type="hidden" name="cmd" id="cmd" value="search" >                                              
                                              <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="button" />
                                             </td>
									  </TR>
									</table>
							</div>
							</div>
						  </form>
             
             </div>
            </div>          
</div>
             

 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","leads"))?></b>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>             
            <div class="portlet-body">
	         <div class="table-responsive">	
                <div id="spinner"></div>
                <table class="table">
                 
				   <tr>
				   <td> 
				
						<div class="portlet-body">
				      <div class="table-responsive">
                        <?php
						 if($_SESSION["search"]=="yes")
						 {
						?>	
				          <table class="table">
							<tr bgcolor="#ABCAE0">
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Contact</td>
                                <td>Title</td>
                                <td>Company</td>
                                <td>Business Email</td>
                                <td>Company Web</td>
                                <td>City</td>
                                <td>State</td>
                                <td></td>
							</tr>
						 <?php
								
								if(!empty($_SESSION['title']))
								{
									$whrstr .=" AND title  LIKE '%".$_SESSION["title"]."%'";
								}
								if(!empty($_SESSION['first_name1']))
								{
									$whrstr .=" AND first_name LIKE '%".$_SESSION["first_name1"]."%'";
								}
								if(!empty($_SESSION['last_name1']))
								{
									$whrstr .=" AND last_name LIKE '%".$_SESSION["last_name1"]."%'";
								}
								if(!empty($_SESSION['business_email1']))
								{
									$whrstr .=" AND business_email LIKE '%".$_SESSION["business_email"]."%'";
								}
								if(!empty($_SESSION['contact']))
								{
									$whrstr .=" AND contact LIKE '%".$_SESSION["contact"]."%'";
								}
								if(!empty($_SESSION['company']))
								{
									$whrstr .=" AND company LIKE '%".$_SESSION["company"]."%'";
								}
								if(!empty($_SESSION['city']))
								{
									$whrstr .=" AND city LIKE '%".$_SESSION["city"]."%'";
								}
								if(!empty($_SESSION['state']))
								{
									$whrstr .=" AND state LIKE '%".$_SESSION["state"]."%'";
								}
								
								$rowsPerPage = 100;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
											  
								$info["table"] = "leads";
								$info["fields"] = array("leads.*"); 
								$info["where"]   = "1   $whrstr ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
													
								
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
                                 <td><?=$arr[$i]['first_name']?></td>
                                  <td><?=$arr[$i]['last_name']?></td>
                                  <td><?=$arr[$i]['contact']?></td>
                                  <td><?=$arr[$i]['title']?></td>
                                  <td><?=$arr[$i]['company']?></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><?=$arr[$i]['city']?></td>
                                  <td><?=$arr[$i]['state']?></td>
                                <td><input type="button" value="View Contact" class="btn blue"  onClick="show(<?=$arr[$i]['id']?>);"/></td>
							</tr>
                            <tr id="row_id_<?=$arr[$i]['id']?>">
                             <td colspan="12">
                                <div id="lead_details_id_<?=$arr[$i]['id']?>">
                                </div>
                             </td>
                            </tr>
						<?php
								  }
						?>
						
						<tr>
						   <td colspan="10" align="center">
							  <?php              
									  unset($info);
					
									   $info["table"] = "leads";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY id DESC";
									  
									   $res  = $db->select($info);  
					
												
										$numrows = $res[0]['total_rows'];
										$maxPage = ceil($numrows/$rowsPerPage);
										$self = 'index.php?cmd=list';
										$nav  = '';
										
										$start    = ceil($pageNum/5)*5-5+1;
										$end      = ceil($pageNum/5)*5;
										
										if($maxPage<$end)
										{
										  $end  = $maxPage;
										}
										
										for($page = $start; $page <= $end; $page++)
										//for($page = 1; $page <= $maxPage; $page++)
										{
											if ($page == $pageNum)
											{
												$nav .= "<li>$page</li>"; 
											}
											else
											{
												$nav .= "<li><a href=\"$self&&page=$page\" class=\"nav\">$page</a></li>";
											} 
										}
										if ($pageNum > 1)
										{
											$page  = $pageNum - 1;
											$prev  = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a></li>";
									
										   $first = "<li><a href=\"$self&&page=1\" class=\"nav\">[First Page]</a></li>";
										} 
										else
										{
											$prev  = '<li>&nbsp;</li>'; 
											$first = '<li>&nbsp;</li>'; 
										}
									
										if ($pageNum < $maxPage)
										{
											$page = $pageNum + 1;
											$next = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Next]</a></li>";
									
											$last = "<li><a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a></li>";
										} 
										else
										{
											$next = '<li>&nbsp;</li>'; 
											$last = '<li>&nbsp;</li>'; 
										}
										
										if($numrows>1)
										{
										  echo '<ul id="navlist">';
										   echo $first . $prev . $nav . $next . $last;
										  echo '</ul>';
										}
									?>     
						   </td>
						</tr>
						</table>
                        <?php
						 }
						?>
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
	include("../template/footer_extra.php");
	include("../template/footer.php");
?>