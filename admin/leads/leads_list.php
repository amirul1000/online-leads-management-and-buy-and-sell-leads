<?php
 include("../template/header.php");
?>

<script type="form-control-static/javascript" src="../../tinybox2/tinybox.js"></script>
<link rel="stylesheet" type="form-control-static/css" href="../../tinybox2/style.css" />
<script type="form-control-static/javascript">
    function popUp(url)
    { 
      var parentWindow = window;
      TINY.box.show({iframe:url,closejs:function(){return false;},boxid:'frameless',width:850,height:650,fixed:false,maskid:'bluemask',maskopacity:40});
    } 
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script language="javascript">

			function CheckAll()
			 {
				 numrows = parseInt($("#numrows").html());  
				 for(i=0;i<numrows;i++)
				 {
					id = "#chk_"+i;
					$(id).prop('checked', true);
				 }
			 }
		
	 
	 function set_action(value)
	 {
		if(value=='delete_all')
	   {
		   val = confirm("Selected records will be deleted permanently,Are you sure to delete those items?");
		   if(val == true)
		   {
			  $("#delete_all_form").append('<input type="hidden" name="cmd" value="delete_all">');
			  $("#delete_all_form").submit();
		   }
	   }
	   if(value=='download_all')
	   {
		  $("#delete_all_form").append('<input type="hidden" name="cmd" value="download_all" />');
		  $("#delete_all_form").submit();
	   }
	 }
	 
	 function setrowsPerPage(value)
	 {
		window.location.href = 'index.php?cmd=show_perpage&rowsPerPage='+value; 
	 }
</script>       
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","Upload CSV"))?></b>
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
                         <form name="frm_users" method="post"  enctype="multipart/form-data">	
                                  <table cellspacing="3" cellpadding="3" border="0" align="left" class="bodyform-control-static"> 
                                            <tr>    
                                                <td></td>
                                                <td>
                                                    <input type="file" name="csv_file" value="" required />
                                                    <input type="hidden" name="cmd" value="import_csv_data" /> 
                                                    <br />
                                                    <code><font color="#993300">[N.B. CSV file is comma(,) separated.So csv data  will not be with comma.
                                                    Before upload please serach & remove all comma]</font></code>
                                                </td>
                                            </tr>
                                            <tr>    
                                                <td></td> 
                                                <td><input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn blue"></td>
                                           </tr>
                              </table>
                         </form>
                      </td>
                   </tr>
                </table>
             </div>
           </div> 
</div> 
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","Download CSV"))?></b>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>             
            <div class="portlet-body">
	         <div class="table-responsive">
               <form name="frm_users" method="post"  enctype="multipart/form-data">	
                <table class="table">
                     <tr>
							 <td width="100px">Company</td>
							 <td><?php
								$info['table']    = "leads";
								$info['fields']   = array("distinct(company) as company");   	   
								$info['where']    =  "1=1 ORDER BY company ASC";
								$rescompany  =  $db->select($info);
							?>
							<select  name="company" id="company"   class="form-control-static">
								<option value="">--All--</option>
								<?php
								   foreach($rescompany as $key=>$each)
								   { 
								?>
								  <option value="<?=$rescompany[$key]['company']?>" <?php if($rescompany[$key]['company']==$company){ echo "selected"; }?>><?=$rescompany[$key]['company']?></option>
								<?php
								 }
								?> 
							</select>
                            </td>
					  </tr>
                     <tr>
                      <td></td> 
                      <td>                      	
                        <input type="hidden" name="cmd" value="export_csv_data" /> 
                        <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn blue">                       
                      </td>
                   </tr>
                </table>
                </form>
             </div>
           </div> 
</div>              

    <a href="index.php?cmd=edit" class="btn green">Add a lead</a> 
    <button name="duplicatechecker"  class="btn blue" onClick="popUp('index.php?cmd=find_duplicate')">Check Duplicate</button>

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
                <table class="table">
                 <tr>
						<td align="center" valign="top">
						  <form name="search_frm" id="search_frm" method="post">
							<div class="portlet-body">
					         <div class="table-responsive">	
				                <table class="table">
									  <TR>
                                        <td width="70%">
                                             Show<select name="rowsPerPage" id="rowsPerPage"  class="form-control-static" onChange="setrowsPerPage(this.value);">
                                                  <option value="10" <?php if($_SESSION["rowsPerPage2"]==10){ echo "selected";}?>>10</option>
                                                  <option value="20" <?php if($_SESSION["rowsPerPage2"]==20){ echo "selected";}?>>20</option>
                                                  <option value="50" <?php if($_SESSION["rowsPerPage2"]==50){ echo "selected";}?>>50</option>
                                                  <option value="100" <?php if($_SESSION["rowsPerPage2"]==100){ echo "selected";}?>>100</option>
                                                  <option value="500" <?php if($_SESSION["rowsPerPage2"]==500){ echo "selected";}?>>500</option>
                                               </select>Entries
                                        </td>
										<TD  nowrap="nowrap">
										  <?php
											  $hash    =  getTableFieldsName("leads");
											  $hash    = array_diff($hash,array("id"));
										  ?>
										  Search Key:
										  <select   name="field_name" id="field_name"  class="form-control-static">
											<option value="">--Select--</option>
											<?php
											foreach($hash as $key=>$value)
											{
										    ?>
											<option value="<?=$key?>" <?php if($_SESSION['field_name']==$key) echo "selected"; ?>><?=str_replace("_"," ",$value)?></option>
											<?php
										    }
										  ?>
										  </select>
										</TD>
										<TD  nowrap="nowrap" align="right"><label for="searchbar"><img src="../../images/icon_searchbox.png" alt="Search"></label>
										   <input type="form-control-static"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="form-control-static"></TD>
										<td nowrap="nowrap" align="right">
										  <input type="hidden" name="cmd" id="cmd" value="search_leads" >
										  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="button" />
										</td>
									  </TR>
									</table>
							</div>
							</div>
						  </form>
						</td>
				   </tr>
				   <tr>
				   <td> 
				
						<div class="portlet-body">
				      <div class="table-responsive">
                         <form name="delete_all_form" id="delete_all_form" action="" method="post">	
				          <table class="table">
							<tr bgcolor="#ABCAE0">
                                <td  align="center">
                                      <input type="checkbox" name="chk_all"  id="checkall" onChange="CheckAll();">
                                </td>
                                <td>Owner Users Id</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Contact</td>
                                <td>Title</td>
                                <td>Company</td>
                                <td>Business Email</td>
                                <td>Company Web</td>
                                <td>City</td>
                                <td>State</td>
                                <td>Created At</td>
                                <td>Updated At</td>
                                <td>Status</td>
                                <td>Action</td>
							</tr>
						 <?php
								
								if($_SESSION["search"]=="yes")
								  {
									$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
								  }
								  else
								  {
									$whrstr = "";
								  }
						 
								$rowsPerPage = isset($_SESSION["rowsPerPage2"])?$_SESSION["rowsPerPage2"]:10;
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
							  <td align="center">								
                                 <input type="checkbox" name="chk[]" id="chk_<?=$i?>" value="<?=$arr[$i]['id']?>" checked="checked">
                                  
                              </td>
                              <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = "users";	
										$info2['fields']   = array("*");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['owner_users_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['first_name'].' '.$res2[0]['last_name'];	
					                ?>
							   </td>
                              <td><?=$arr[$i]['first_name']?></td>
                              <td><?=$arr[$i]['last_name']?></td>
                              <td><?=$arr[$i]['contact']?></td>
                              <td><?=$arr[$i]['title']?></td>
                              <td><?=$arr[$i]['company']?></td>
                              <td><?=$arr[$i]['business_email']?></td>
                              <td><?=$arr[$i]['company_web']?></td>
                              <td><?=$arr[$i]['city']?></td>
                              <td><?=$arr[$i]['state']?></td>
                              <td><?=$arr[$i]['created_at']?></td>
                              <td><?=$arr[$i]['updated_at']?></td>
                              <td><?=$arr[$i]['status']?></td>			  
							  <td nowrap >
								  <a href="index.php?cmd=edit&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
								  <a href="index.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> 
							 </td>
						
							</tr>
						<?php
								  }
						?>
						 <tr>
                            <td  align="center">
                                <select name="select_action"  id="select_action"  class="form-control-static"  onChange="set_action(this.value);">
                                   <option value="">Seelct</option>
                                   <option value="delete_all">Delete All</option>
                                   <option value="download_all">Download All</option>
                                </select>
                            </td>
                            <td colspan="19"></td>
                        </tr>
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
                        </form>
						</div>
					 </div>				
				</td>
				</tr>
				</table>
				</div>
			</div>
		</div>
        
        <div id="numrows"><?=$numrows?></div>
<?php
include("../template/footer.php");
?>