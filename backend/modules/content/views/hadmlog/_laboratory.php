<?php 


use yii\helpers\Html;
use yii\grid\GridView;
use common\controllers\PatiendetailsController;
use common\models\Haddr;
use common\models\Hbrgy;
use common\models\Hcity;
use common\models\Hprov;
use common\models\Htelep;
use common\models\Hadmlog;

$address = PatiendetailsController::Address($model->hpercode);
$contact = PatiendetailsController::Contact($model->hpercode);
$age = PatiendetailsController::Age($model2->enccode);
?>

<header class="container">
    <div class= "image1">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image2">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>

<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<table style="width:100% ;text-align: center; ">
<tr  >
     <td ><h3>LABORATORY REQUEST</h3></td>
  </tr>
</table>

<table style="width:100% ;text-align: left">
<tr>
    <td style="width:80% ;text-align: right;">Case No.:</td>
    <td style="text-align: right;">_______________</td>
  </tr>
</table>
<table style="width:100% ;text-align: left">
  <tr>
    <td style="width:150px ;">Name</td>
    <td style="width:20px ;">:</td>
    
    <td>
    	<?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?>
    </td> 
    
    
  </tr>
  
  <tr>
    <td>Address</td>
    <td>:</td>
    <td>
    	<?php echo $address; ?>
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
    	<?php echo $model->patsex; ?>
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
    	<?php echo substr($model->patbdate,0,10); ?>
    </td> 
  </tr>
  
  <tr>
    <td>Date Ordered</td>
    <td>:</td>
    <td>
    	
    </td> 
  </tr>
  
  <tr>
    <td>Room</td>
    <td>:</td>
    <td>
    	
    </td> 
  </tr>
  
  <tr>
    <td>Chief Complain/s</td>
    <td>:</td>
    <td>
    	
    </td> 
  </tr>
  
  


</table>



<br>


<table style="width:100% ;text-align: left; border: 0px solid black; border-collapse: collapse;">

	<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >(&nbsp;&nbsp;&nbsp;) CBC</td>
     <td style="border: 0px solid black; border-collapse: collapse;" >(&nbsp;&nbsp;&nbsp;) Clotting Time</td>
  	</tr>
  		<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >(&nbsp;&nbsp;&nbsp;) Hemoglobin</td>
     <td style="border: 0px solid black; border-collapse: collapse;" >(&nbsp;&nbsp;&nbsp;) Bleeding Time</td>
  	</tr>
  		<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >(&nbsp;&nbsp;&nbsp;) Hematocrit</td>
     <td style="border: 0px solid black; border-collapse: collapse;" >(&nbsp;&nbsp;&nbsp;) BSMP</td>
  	</tr>
  		<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >(&nbsp;&nbsp;&nbsp;) Blood Typing</td>
     <td style="border: 0px solid black; border-collapse: collapse;" >(&nbsp;&nbsp;&nbsp;) ESR</td>
  	</tr>
  		<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >(&nbsp;&nbsp;&nbsp;) Platelet Coount</td>
     <td style="border: 0px solid black; border-collapse: collapse;" >(&nbsp;&nbsp;&nbsp;) Peripheral Smear</td>
  	</tr>
  		<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >(&nbsp;&nbsp;&nbsp;) ASO Titer</td>
     <td style="border: 0px solid black; border-collapse: collapse;" >(&nbsp;&nbsp;&nbsp;) HBSag</td>
  	</tr>
  		<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >(&nbsp;&nbsp;&nbsp;) Widal / Tubex Test</td>
     <td style="border: 0px solid black; border-collapse: collapse;" >(&nbsp;&nbsp;&nbsp;) RBS</td>
  	</tr>
  		<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >(&nbsp;&nbsp;&nbsp;) Others:(Specify)___________________</td>
     <td style="border: 0px solid black; border-collapse: collapse;" ></td>
  	</tr>

</table>
  
  <br>
  <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">

	<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" ></td>
     <td style="border: 0px solid black; border-collapse: collapse;" >_______________________________M.D.</td>
  	</tr>
  	<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" ></td>
     <td style="border:  0px solid black; border-collapse: collapse;" >Requesting Physician</td>
  	</tr>
  	

</table>
<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<footer class = "footer">
<div class="timesdate">
    Generated on:
    <?php echo date ("Y-m-d");?>
    <?php date_default_timezone_set("Hongkong");
        echo date ("h:i a"); ?>
       || Clerk: <?php echo $model->entryby0->lastname.','.$model->entryby0->firstname; ?>
</div>
</footer>
