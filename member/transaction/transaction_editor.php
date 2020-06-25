<?php
 include("../template/header.php");
?>
<script language="javascript" src="transaction.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","transaction"))?></b>
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
        
                                         <form name="frm_transaction" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
                                          <div class="portlet-body">
                                         <div class="table-responsive">	
                                            <table class="table">
                                                 <tr>
                                                     <td>Users</td>
                                                     <td><?php
                                                        $info['table']    = "users";
                                                        $info['fields']   = array("*");   	   
                                                        $info['where']    =  "1=1 ORDER BY id DESC";
                                                        $resusers  =  $db->select($info);
                                                    ?>
                                                    <select  name="users_id" id="users_id"   class="form-control">
                                                        <option value="">--Select--</option>
                                                        <?php
                                                           foreach($resusers as $key=>$each)
                                                           { 
                                                        ?>
                                                          <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$users_id){ echo "selected"; }?>><?=$resusers[$key]['first_name']?> <?=$resusers[$key]['last_name']?></option>
                                                        <?php
                                                         }
                                                        ?> 
                                                    </select>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                     <td>Debit</td>
                                                     <td>
                                                        <input type="text" name="debit" id="debit"  value="<?=$debit?>" class="form-control">
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td>Credit</td>
                                                     <td>
                                                        <input type="text" name="credit" id="credit"  value="<?=$credit?>" class="form-control">
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td valign="top">Description</td>
                                                     <td>
                                                        <textarea name="description" id="description"  class="form-control" style="width:200px;height:100px;"><?=$description?></textarea>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td>Trans Date</td>
                                                     <td>
                                                        <input type="text" name="trans_date" id="trans_date"  value="<?=$trans_date?>" class="form-control">
                                                        <a href="javascript:void(0);" onclick="displayDatePicker('trans_date');"><img src="../../images/calendar.gif" width="16" height="16" border="0" /></a>
                                                     </td>
                                                 </tr>
                                                 <tr> 
                                                     <td align="right"></td>
                                                     <td>
                                                        <input type="hidden" name="cmd" value="add">
                                                        <input type="hidden" name="id" value="<?=$Id?>">			
                                                        <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
                                                     </td>     
                                                 </tr>
                                </table>
                                </div>
                                </div>
                        </form>
                      </td>
                     </tr>
                    </table>
			      </div>
			</div>
  </div>			
<?php
 include("../template/footer.php");
?>

