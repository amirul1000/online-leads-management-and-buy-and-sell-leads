<?php
 include("../template/header.php");
?>
<b><?=ucwords(str_replace("_"," ","Read CSV"))?></b>
<table>
     <tr>
      <td>
         <form name="frm_users" method="post"  enctype="multipart/form-data">			
          	<fieldset>
   				 <legend>Upload CSV</legend>
                  <table cellspacing="3" cellpadding="3" border="0" align="left" class="bodytext"> 
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
                                <td><input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue"></td>
                           </tr>
              </table>
            </fieldset>  
         </form>
      </td>
   </tr>
</table>
  <table cellspacing="3" cellpadding="3" border="0"  width="100%" class="bdr">
   <tr>
			<td align="center" valign="top">
			  <form name="search_frm" id="search_frm" method="post">
				<table width="60%" border="0"  cellpadding="0" cellspacing="0" class="bodytext">
				  <TR>
					<TD  nowrap="nowrap">
					  <?php
						  $hash    =  getTableFieldsName("sensor");
						  $hash    = array_diff($hash,array("id"));
					  ?>
					  Search Key:
					  <select   name="field_name" id="field_name"  class="form-control">
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
					<TD  nowrap="nowrap" align="right"><label for="searchbar"><img src="../images/icon_searchbox.png" alt="Search"></label>
					   <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="form-control"></TD>
					<td nowrap="nowrap" align="right">
					  <input type="hidden" name="cmd" id="cmd" value="search_sensor" >
					  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="button" />
					</td>
				  </TR>
				</table>
			  </form>
			</td>
   </tr>
   <tr>
   <td> 
		<table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
			<tr bgcolor="#ABCAE0">
			  <td>start_latitude</td>
			  <td>start_longitude</td>
			  <td>end_latitude</td>
			  <td>end_longitude</td>
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
		 
				$rowsPerPage = 500;
				$pageNum = 1;
				if(isset($_REQUEST['page']))
				{
					$pageNum = $_REQUEST['page'];
				}
				$offset = ($pageNum - 1) * $rowsPerPage;  
		 
		 
							  
				$info["table"] = "sensor";
				$info["fields"] = array("sensor.*"); 
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
			  <td><?=$arr[$i]['start_latitude']?></td>
			  <td><?=$arr[$i]['start_longitude']?></td>
			  <td><?=$arr[$i]['end_latitude']?></td>
			  <td><?=$arr[$i]['end_longitude']?></td>			  
			  <td nowrap >
				  <a href="readcsv.php?cmd=edit&id=<?=$arr[$i]['id']?>" class="nav">Edit</a> |
				  <a href="readcsv.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="nav" onClick=" return confirm('Are you sure to delete this item ?');">Delete</a> |
                  <a href="readcsv.php?cmd=read&start_latitude=<?=$arr[$i]['start_latitude']?>&end_longitude=<?=$arr[$i]['end_longitude']?>" class="nav">Read Location</a>
			 </td>
		
			</tr>
		<?php
				  }
		?>
		
		<tr>
		   <td colspan="10" align="center">
			  <?php              
					  unset($info);
	
					  $info["table"] = "sensor";
					  $info["fields"] = array("count(*) as total_rows"); 
					  $info["where"]   = "1  $whrstr ORDER BY id DESC";
					  
					  $res  = $db->select($info);  
	
	
						$numrows = $res[0]['total_rows'];
						$maxPage = ceil($numrows/$rowsPerPage);
						$self = 'readcsv.php?cmd=list';
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
								$nav .= " $page "; 
							}
							else
							{
								$nav .= " <a href=\"$self&&page=$page\" class=\"nav\">$page</a> ";
							} 
						}
						if ($pageNum > 1)
						{
							$page  = $pageNum - 1;
							$prev  = " <a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a> ";
					
						   $first = " <a href=\"$self&&page=1\" class=\"nav\">[First Page]</a> ";
						} 
						else
						{
							$prev  = '&nbsp;'; 
							$first = '&nbsp;'; 
						}
					
						if ($pageNum < $maxPage)
						{
							$page = $pageNum + 1;
							$next = " <a href=\"$self&&page=$page\" class=\"nav\">[Next]</a> ";
					
							$last = " <a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a> ";
						} 
						else
						{
							$next = '&nbsp;'; 
							$last = '&nbsp;'; 
						}
						
						if($numrows>1)
						{
						  echo $first . $prev . $nav . $next . $last;
						}
						
					?>     
		   </td>
		</tr>
		</table>

</td>
</tr>
</table>

<?php
include("../template/footer.php");
?>









