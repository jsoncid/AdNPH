<?php
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
    <td>Date Ordered</td>
    <td>:</td>
    <td>
    	<?php echo $modelhdocord->dodate;?>
    </td> 
  </tr>
  
  <tr>
    <td>Room</td>
    <td>:</td>
    <td>
    	<?php echo $room;?>
    </td> 
  </tr>
  
  <tr>
    <td>Chief Complain/s</td>
    <td>:</td>
    <td>
    	<?php echo $model->hadmlog->admnotes;?>
    </td> 
  </tr>
  
  


</table>