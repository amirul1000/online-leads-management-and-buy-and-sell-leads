<div class="portlet-body">
    <div class="table-responsive">	
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
            <td>Created At</td>
            <td>Updated At</td>
            <td>Status</td>
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
     
            $rowsPerPage = 100;
            $pageNum = 1;
            if(isset($_REQUEST['page']))
            {
                $pageNum = $_REQUEST['page'];
            }
            $offset = ($pageNum - 1) * $rowsPerPage;  
     
     
                          
            $info["table"] = "leads";
            $info["fields"] = array("leads.*,count(leads.business_email) as business_email"); 
            $info["where"]   = "1 GROUP BY business_email HAVING count(business_email)>1";
            
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
            <td><?=$arr[$i]['business_email']?></td>
            <td><?=$arr[$i]['company_web']?></td>
            <td><?=$arr[$i]['city']?></td>
            <td><?=$arr[$i]['state']?></td>
            <td><?=$arr[$i]['created_at']?></td>
            <td><?=$arr[$i]['updated_at']?></td>
            <td><?=$arr[$i]['status']?></td>			  
        </tr>
    <?php
              }
    ?>
    </table>
    </div>
</div>