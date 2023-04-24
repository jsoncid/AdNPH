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
use backend\assets\HeaderAsset;

HeaderAsset:: register($this);
$this->registerCssFile("/backend/web/css/header.css");

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

<!-- FACE SHEET -->

<table style="width:100% ;text-align: center; ">
<tr>
     <td ><h3>Newborn Personal Information Sheet</h3></td>
  </tr>
  
</table>

<table style="width:100% ;text-align: left">
  <tr>
    <td style="width:120px ;">Baby's Name</td>
    <td style="width:20px ;">:</td>
    
    <td>
    	<?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?>
    </td> 
  </tr>
  <tr>
    <td style="width:120px ;">Mother's Name</td>
    <td style="width:20px ;">:</td>
    
    <td>
    	
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
    <td>Age</td>
    <td>:</td>
    <td>
    <?php echo $age ?>
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

                <td style="width:50px ;">Date and time of Delivery</td>
                <td style="width:20px ;">:</td>
                <td style="width:150px ;">
                </td> 


  </tr>
  
  <tr>
    <td>Manner of Delivery</td>
    <td>:</td>
    <td>
    	(&nbsp;&nbsp;&nbsp;) NSVD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    	(&nbsp;&nbsp;&nbsp;) Breench Extraction &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	(&nbsp;&nbsp;&nbsp;) Forceps &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	(&nbsp;&nbsp;&nbsp;) C/S_______
    </td> 
  </tr>
  
</table>

<br>


<table style="width:100% ;text-align: left">
	<tr>
        <td style="width:150px ;">Obstetrician</td>
        <td style="width:20px ;">:</td>
        <td>_________________________</td> 
        <td>Pediatrician</td>
        <td>:</td>
        <td>_________________________</td> 
  	</tr>
  	
  	<tr>
        <td style="text-align: right">APGAR Score</td>
        <td>:</td>
        <td>___________</td> 
        <td>Temperature</td>
        <td>:</td>
        <td>___________</td> 
  	</tr>
  	<tr>
        <td><b>Anthrepormetric Data</b></td>
        <td></td>
        <td></td> 
        <td></td>
        <td></td>
        <td></td> 
  	</tr>
  	<tr>
        <td style="text-align: right">Weight</td>
        <td>:</td>
        <td>___________</td> 
        <td>Head Circumference</td>
        <td>:</td>
        <td>_________________________</td> 
  	</tr>
  	
  	<tr>
        <td style="text-align: right">Length</td>
        <td>:</td>
        <td>___________</td> 
        <td>Chest Circumference</td>
        <td>:</td>
        <td>_________________________</td> 
  	</tr>
  	
  	<tr>
        <td></td>
        <td></td>
        <td></td> 
        <td>Abdominal Circumference</td>
        <td>:</td>
        <td>_________________________</td> 
  	</tr>
  	
  	
</table>
<table style="width:100% ;text-align: left">
  <tr>
    <td><br><b>Essential Intraperform Newborn Care:</b></td>
  </tr>
  <tr>
  	<td>
    	(&nbsp;&nbsp;&nbsp;) Immediate and thorough dying <br>
    	(&nbsp;&nbsp;&nbsp;) Early skin to skin contact with mother <br>
    	(&nbsp;&nbsp;&nbsp;) Properly timed cord clamping <br>
    	(&nbsp;&nbsp;&nbsp;) Non-speration of the newborn from the mother for early initiation of Breastfeeding
    </td>
  </tr>
  
  <tr>
    <td><br><b>Routine Newborn Care:</b></td>
  </tr>
  <tr>
  	<td>
    	(&nbsp;&nbsp;&nbsp;) Creds prophylaxis / eye prophylaxis <br>
    	(&nbsp;&nbsp;&nbsp;) Vitamin K, 1mg. / 0.5 mg, right thigh <br>
    	(&nbsp;&nbsp;&nbsp;) Hepa B vaccine 0.5 ml, left thight  <br>
    	(&nbsp;&nbsp;&nbsp;) BCG 0.0510 <br>
    	(&nbsp;&nbsp;&nbsp;) Newborn screening done ________________
    </td>
  </tr>
  
  <tr>
    <td><br><b>Home Instruction</b></td>
  </tr>
  <tr>
  	<td>
    	1. Exclusive breastfeeding until baby is 6 months old <br>
    	2. Bath baby daily <br>
    	3. Do not apply alcohol / betadine and binder on umbilical stump  <br>
    	4. Do not use prolocteal, pacifier and feeding bottles  <br>
    	5. Immunization c/o local health center  <br>
    	6. Addtional instructions: _________________________________________________________________  <br>
    </td>
  </tr>
  
  
</table>
<br><br><br><br><br><br>



<table style="width:100% ;text-align: center">
  <tr>
    <td>_______________________</td>
    <td>_______________________</td>
  </tr>
  <tr>
  	<td>
    	Signature over Printed Name <br>
    	Nurse/Midwife on Duty
    </td>
    
    <td>
    	Date and time of Discharge
    </td>
    
  </tr>
  
</table>
<br>
<table style="width:100% ;text-align: center; ">
<tr>
     <td ><h3>APGAR Scoring</h3></td>
  </tr>
  
</table>

<table style="width:100% ;text-align: left">
  <tr>
    <td style="width:120px ;">Baby's Name</td>
    <td style="width:20px ;">:</td>
    
    <td>
    	<?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?>
    </td> 
  </tr>
  <tr>
    <td style="width:120px ;">Mother's Name</td>
    <td style="width:20px ;">:</td>
    
    <td>
    	
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
    <td>Age</td>
    <td>:</td>
    <td>
    <?php echo substr($age,0,2); ?>
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

                <td style="width:50px ;">Type of Delivery</td>
                <td style="width:20px ;">:</td>
                <td>
                	
                </td> 


  </tr>
</table>
<br>
<div style="text-align: center;">
<?php echo Html::img('@web/img/apgar.jpg', ['alt' => 'apgar', 'style' => 'width:100%']); ?>
</div>
<br>
<br>
<br>
<br>
<table style="width:100% ;text-align: center; ">
	<tr>
	<td> &nbsp; </td>
     <td >_______________________________</td>
  	</tr>
  	<tr>
	<td> &nbsp; </td>
     <td >Pediatrician</td>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br>
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
<tr>
     <td ><h3>Newborn Physical Examination</h3></td>
  </tr>
  
</table>

<table style="width:100% ;text-align: left">
  <tr>
    <td style="width:120px ;">Baby's Name</td>
    <td style="width:20px ;">:</td>
    
    <td>
    	<?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?>
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

                <td style="width:50px ;">Date and time of Birth</td>
                <td style="width:20px ;">:</td>
                <td style="width:150px ;">
                
                </td> 


  </tr>

  <tr>
    <td>Manner of Delivery</td>
    <td>:</td>
    <td>
    	(&nbsp;&nbsp;&nbsp;) NSVD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    	(&nbsp;&nbsp;&nbsp;) Breench Extraction &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	(&nbsp;&nbsp;&nbsp;) Forceps &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	(&nbsp;&nbsp;&nbsp;) C/S_______
    </td> 
  </tr>
  <table style="width:100% ;text-align: left">
	<tr>
        <td style="width:150px ;">Birth Weight</td>
        <td style="width:20px ;">:</td>
        <td>___________</td> 
        <td>Birth Leght</td>
        <td>:</td>
        <td>___________</td> 
  	</tr>
</table>

<table style="width:100% ;text-align: left">
	<tr>
        <td style="width:50px ;">Head Circumference</td>
        <td style="width:20px ;">:</td>
        <td>___________</td> 
        <td style="width:50px ;">Chest Circumference</td>
        <td style="width:20px ;">:</td>
        <td>___________</td> 
        <td style="width:50px ;">Abdominal Circumference</td>
        <td style="width:20px ;">:</td>
        <td>___________</td> 
  	</tr>
</table>


<table style="width:100% ;text-align: left">
	<tr>
        <td style="width:150px ;">Admitting Diagnosis</td>
        <td style="width:20px ;">:</td>
        <td>___________________________________________________________________</td> 
  	</tr>
  	<tr>
        <td style="width:150px ;"></td>
        <td style="width:20px ;"></td>
        <td>___________________________________________________________________</td> 
  	</tr>
</table>
</table>
<br>
<table style="width:100% ;text-align: center">
		<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse; font-size: 11pt;" ><b>General Survey</b></td>
             <td style="border: 1px solid black; border-collapse: collapse;font-size: 11pt;" ><b>PE at Birth</b></td>
             <td style="border: 1px solid black; border-collapse: collapse;font-size: 11pt;" valign="top" ><b>PE at Discharge</b></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Head</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
  		<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Eyes</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Ears</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Nose</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Mouth</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Chest</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Lungs</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> CVS</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Abdomen</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Genitalia</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Anus</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Extremities</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Skin</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>
      	<tr>
             <td style="width:150px ;border: 1px solid black; border-collapse: collapse;font-size: 11pt;"> Spine/CNS</td>
             <td style="border: 1px solid black; border-collapse: collapse;" ></td>
             <td style="border: 1px solid black; border-collapse: collapse;" valign="top" ></td>
      	</tr>

</table>
<br>
<table style="width:100% ;text-align: left">
	<tr>
        <td style="width:150px ;">Final Diagnosis</td>
        <td style="width:20px ;">:</td>
        <td>___________________________________________________________________</td> 
  	</tr>
  	<tr>
        <td style="width:150px ;"></td>
        <td style="width:20px ;"></td>
        <td>___________________________________________________________________</td> 
  	</tr>

</table>
<br>

<br>
<br>
<table style="width:100% ;text-align: center; ">
	<tr>
	<td> &nbsp; </td>
     <td >_______________________________</td>
  	</tr>
  	<tr>
	<td> &nbsp; </td>
     <td >Pediatrician</td>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

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
<tr>
     <td ><h3>TPR SHEET</h3></td>
  </tr>
</table>
<br>

<div style="text-align: center;">
<?php echo Html::img('@web/img/tpr.jpg', ['alt' => 'tpr', 'style' => 'width:100%']); ?>
</div>
<br><br>
<table style="width:100% ;text-align: left">
  <tr>
    <td style="width:150px ;">Patient's Name</td>
    <td style="width:20px ;">:</td>
    <td>
    	<?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?>
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
    <td>Age</td>
    <td>:</td>
    <td>
    <?php echo substr($age,0,2); ?>
    </td> 
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