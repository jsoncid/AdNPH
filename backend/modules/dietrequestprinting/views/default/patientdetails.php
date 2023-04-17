<?php
use common\controllers\HproviderController;
use common\controllers\PatiendetailsController;
?>
<table style="width:100% ;text-align: left">
  <tr>
    <td style="width:150px ;">Name</td>
    <td style="width:20px ;">:</td>
    
    <td>
    	<?php echo PatiendetailsController::Fullname($model->hpercode);?>
    </td> 
    
    
  </tr>
  
  <tr>
    <td>Address</td>
    <td>:</td>
    <td>
    	<?php echo PatiendetailsController::Address($model->hpercode);?>
    </td> 
  </tr>
  
  <tr>
    <td>Contact</td>
    <td>:</td>
    <td>
    	<?php echo $contact; ?>
    </td> 
  </tr>
  
  <tr>
    <td>Sex</td>
    <td>:</td>
    <td>
    	<?php echo $model->hpercode0->patsex; ?>
    </td> 
  </tr>
  
  <tr>
    <td>Civil Status</td>
    <td>:</td>
    <td>
    	<?php echo PatiendetailsController::Civilstatus($model->hpercode); ?>
    </td> 
  </tr>
  
  <tr>
    <td>Age</td>
    <td>:</td>
    <td>
    	<?php echo $age; ?>
    </td> 
  </tr>
  
  <tr>
    <td>Birth Date</td>
    <td>:</td>
    <td>
    	<?php echo substr($model->hpercode0->patbdate,0,10); ?>
    </td> 
  </tr>
  
  
  <tr>
    <td>Room</td>
    <td>:</td>
    <td>
    	<?php echo $room;?>
    </td> 
  </tr>

</table>


<hr>

<table style="width:100% ;text-align: center">
  <tr>
    <th style="width:30% ;">Date Ordered</th>
    <th style="width:30% ;">Diet Type</th>
    <th style="width:40% ;">Order By</th>
  </tr>
  
  <?php 

  foreach($dietlogs as $arr){
          echo "<tr>";
            echo "<td>";
                echo $arr['dodate'];
            echo "</td>";
            echo "<td>";
                echo $arr['dietdesc'];
            echo "</td>";
            echo "<td>";
                echo HproviderController::Fullname($arr['entby']);;
            echo "</td>";
          echo "</tr>";
      
  }
  ?>
 
</table>



<?php 
//print_r($dietlogs)
?>