<?php


use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Haddr;
use common\models\Hbrgy;
use common\models\Hcity;
use common\models\Hprov;
use common\models\Htelep;
use common\models\Hadmlog;
use backend\assets\HeaderAsset;

HeaderAsset:: register($this);
$this->registerCssFile("/backend/web/css/header.css");

$address = "";
$modeladdr = Haddr::find()
->where(['hpercode' =>  $model->hpercode])
->one();

$modelbrg = Hbrgy::find()
->where(['bgycode' =>  $modeladdr->brg])
->one();

$modelcitymun = Hcity::find()
->where(['ctycode' =>  $modeladdr->ctycode])
->one();

$modelprov = Hprov::find()
->where(['provcode' =>  $modeladdr->provcode])
->one();
if($modelbrg != NULL)
{
    $address = $modeladdr->patstr.', '.$modelbrg->bgyname.', '.$modelcitymun->ctyname.', '.$modelprov->provname;
}
else
{
    $address = None;
}

$contact = "";
$modelcontact = Htelep::find()
->where(['hpercode' => $model->hpercode])
->one();

if($modelcontact != NULL)
{
    $contact= $modelcontact->pattel;
}

else
{
    $contact = "None";
}

$age="";
$modelage= Hadmlog::find()
->where(['hpercode' => $model->hpercode])
->one();

if($modelage !== NULL)
{
  $age=$modelage->patage;
}
else
{
  $age= "None";
}
?>


<!-- MONITORING SHEET -->
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
     <td ><h3>MONITORING SHEET</h3></td>
  </tr>
</table>



<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
	<tr >
	
     <th align=center style="border: 1px solid black; border-collapse: collapse; "> DATE</th> 
     <th align=center style="border: 1px solid black; border-collapse: collapse; "> TIME</th> 
     <th align=center style="border: 1px solid black; border-collapse: collapse; "> TEMP</th> 
     <th align=center style="border: 1px solid black; border-collapse: collapse; "> BP</th> 
      <th align=center style="border: 1px solid black; border-collapse: collapse; "> PR/CR</th> 
       <th align=center style="border: 1px solid black; border-collapse: collapse; "> RR</th> 
        <th align=center style="border: 1px solid black; border-collapse: collapse; "> O2 SAT</th> 
		<th align=center style="border: 1px solid black; border-collapse: collapse; "> FHT</th>
         <th align=center style="border: 1px solid black; border-collapse: collapse; "> SIGNATURE</th> 
		 
  	</tr>
  	
   <?php 
  	     for($i=0;$i<24;$i++)
  	     {
  	?>
      	<tr>
         <td style="border: 1px solid black; border-collapse: collapse;height:30;width:80px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;width:60px ;"></td> 
         <td style="border: 1px solid black; border-collapse: collapse;width:50px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;width:50px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;width:30px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;width:50px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;width:50px "></td> 
		 <td style="border: 1px solid black; border-collapse: collapse;width:50px "></td>
         <td style="border: 1px solid black; border-collapse: collapse;width:50px "></td> 
      	</tr>
  	<?php }
  	?>
</table>


<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">


<!-- Footer Monitoring Sheet -->

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
<br><br> <br>
<!-- End of Monitoring Sheet -->


<header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>

<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">


<table style="width:100% ;text-align: center; ">
<tr  >
     <td ><h3>CLINICAL COVER SHEET</h3></td>
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
    <td style="width:100px ;">Name</td>
    <td style="width:20px ;">:</td>
    <td> <?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?></td>
    </tr>
  <tr>
    <td>Address</td>
    <td>:</td>
    <td> <?php echo $address; ?> </td> 
  </tr>
  <tr>
  <td>Contact</td>
    <td>:</td>
    <td> <?php echo $contact; ?> </td>
    <td>Birth Date</td>
    <td>:</td>
    <td>
    <?php echo substr($model->patbdate,0,10); ?>
    </td>
    </tr>
    <tr>
    <td>Sex</td>
    <td>:</td>
    <td> <?php echo $model->patsex; ?>
    </td>
    </td> 
    <td>Birth Place</td>
    <td>:</td>
    <td>
    <?php echo $model->patbplace; ?>
    </td> 
  </tr>
  <tr>
    <td>Civil Status</td>
    <td>:</td>
    <td>
    <?php echo $model->patcstat; ?></td>
    </td> 
    <td>Nationality</td>
    <td>:</td>
    <td>
    <?php echo $model->natcode; ?>
    </td>
  </tr>
  <tr>
    <td>Age</td>
    <td>:</td>
    <td>
    <?php echo substr($age,0,2); ?>
    </td> 
    <td>Religion</td>
    <td>:</td>
    <td>
    <?php echo $model->relcode; ?>
    </td> 
  </tr>

</table>
<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:50%;" valign="top" >Type of Admission<br>[&nbsp;&nbsp;]New&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;]Old&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;]Former OPD<br> 
     <td style="border: 1px solid black; border-collapse: collapse;" colspan="2" valign="top" >Referred By (Physician/Agency):<br><br>.</td>
  	</tr>

	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:50%" >Admission Date and Time</td>
     <td style="border: 1px solid black; border-collapse: collapse;" >Discharge Date and Time</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:100px ;" rowspan="2" valign="top" >Total # of days</td>
  	</tr>
  	
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;height:30" ><?php echo $model->datemod; ?></td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
  	</table>

    <table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
  	
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:50% ;height:80;" valign="bottom">Chief Complaint</td>
     <td style="border: 1px solid black; border-collapse: collapse;text-align:center" valign="bottom" >

     <table style="width:100% ;text-align: center; border: 1px solid black;height:100; border-collapse: collapse;">
         	 		<tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top" colspan="3"><h5>DISPOSITION</h5></td>
                         
                      </tr>
                      	<tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Discharged</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Transferred</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Absconded</td>
                      </tr>
                      <tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top" colspan="2">[&nbsp;&nbsp;]Home Against Advice</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Expired</td>
                      </tr>
         	 	</table>
         	 	
         	 	<table style="width:100% ;text-align: center; border: 1px solid black;height:100; border-collapse: collapse;">
         	 		<tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top" colspan="3"><h5>CONDITION DISCHARGE</h5></td>
                         
                      </tr>
                      	<tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Recovered</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Improved</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Unapproved</td>
                      </tr>
                      <tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top" colspan="2">[&nbsp;&nbsp;]Died</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Died less than 24 hrs</td>
                      </tr>
         	 	
         	 	</table>
 </table>

 <table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
  	
  	<tr>
     <td style="border: 1px solid black; width:50%; border-collapse: collapse;text-align:center"  >LMP ___________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; G_ P _ ( _ , _ , _ , _)</td>
     <td style="border: 1px solid black; border-collapse: collapse;" valign="bottom" >Philhealth [&nbsp;&nbsp;] &nbsp;&nbsp;&nbsp;&nbsp; Non-Philhealth [&nbsp;&nbsp;] </td>
  	</tr>
</table> 

<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
  	
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:50% ;height:90;" valign="bottom">Admitting Impression</td>
     <td style="border: 1px solid black; border-collapse: collapse;text-align:center" valign="bottom" >Final Diagnosis & ICD Code:</td>
  	</tr>
  	
  	
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:50% ;height:80;" valign="bottom">Signature over Printed Name<br>Admitting Physician</td>
     <td style="border: 1px solid black; border-collapse: collapse;" valign="bottom" >Signature over Printed Name<br>Attending Physician</td>
  	</tr>
</table>
<table style="width:100% ; border: 0px solid black; border-collapse: collapse;">
	

	<tr>
	
	
     	 <td style="border: 0px solid black; border-collapse: collapse;width:50%" valign="top">
     	 	<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
     	 		<tr>
                      <td style="border: 1px solid black; border-collapse: collapse;width:150px;height:15;" valign="top" >Blood Pressure</td>
                       <td style="border: 1px solid black; border-collapse: collapse;" valign="top"><?php //echo $model->bp;?></td>
                  </tr>
                  <tr>
                      <td style="border: 1px solid black; border-collapse: collapse;width:150px;height:15;" valign="top" >Pulse Rate</td>
                       <td style="border: 1px solid black; border-collapse: collapse;" valign="top"><?php //echo $model->pr;?></td>
                  </tr>
                  
                  <tr>
                      <td style="border: 1px solid black; border-collapse: collapse;width:150px;height:15;" valign="top" >Temperature</td>
                       <td style="border: 1px solid black; border-collapse: collapse;" valign="top"><?php //echo $model->temp;?></td>
                  </tr>
                  <tr>
                      <td style="border: 1px solid black; border-collapse: collapse;width:150px;height:15;" valign="top" >Respiratory Rate</td>
                       <td style="border: 1px solid black; border-collapse: collapse;" valign="top"><?php //echo $model->rr;?></td>
                  </tr>
				  <tr>
                      <td style="border: 1px solid black; border-collapse: collapse;width:150px;height:15;" valign="top" >Height</td>
                       <td style="border: 1px solid black; border-collapse: collapse;" valign="top"><?php //echo $model->weight;?></td>
                  </tr>
                  <tr>
                      <td style="border: 1px solid black; border-collapse: collapse;width:150px;height:15;" valign="top" >Weight</td>
                       <td style="border: 1px solid black; border-collapse: collapse;" valign="top"><?php //echo $model->weight;?></td>
                  </tr>
                  <tr>
                      <td style="border: 1px solid black; border-collapse: collapse;width:150px;height:15;" valign="top" >Oxygen Saturation</td>
                       <td style="border: 1px solid black; border-collapse: collapse;" valign="top"><?php //echo $model->o2sat;?></td>
                  </tr>
                  <tr>
                      <td style="border: 1px solid black; border-collapse: collapse;width:150px;height:15;" valign="top" >Fetal Heart Beat</td>
                       <td style="border: 1px solid black; border-collapse: collapse;" valign="top"><?php //echo $model->fhb;?></td>
                  </tr>      
     	 	</table>

              <td style="border: 1px solid black; border-collapse: collapse;width:50%;text-align: center;" valign="bottom">
     	 	Other Note/s or Remark/s
     	 </td>
          </table> 
          <table  style="width:100% ; border: 0px solid black; border-collapse: collapse;">
            <tr>
            <td style="border: 0px solid black; border-collapse: collapse;width:50%" valign="top">
        	<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
         	 				<tr>
                          		<td style="border: 1px solid black; border-collapse: collapse;height:70;text-align: center;" valign="bottom" >Signature of Attending Nurse/Nurse Attendant (ER)</td>
                            </tr>
               </table>
        </td>
        <td style="border: 0px solid black; border-collapse: collapse;width:50%" valign="top">
			<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
         	 				<tr>
                          		<td style="border: 1px solid black; border-collapse: collapse;height:70;text-align: center;" valign="bottom" >Signature of Attending Nurse/Nurse Attendant (WARD)</td>
                            </tr>
               </table>
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
<br>
<br>
<br>
<br>
<br>

<!-- Doctor's Order -->
<header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>

<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>DOCTOR'S ORDER</h3></td>
  </tr>
</table>
<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse; ">DATE/TIME</td> 
     <td style="border: 1px solid black; border-collapse: collapse; ">PROGRESS NOTES</td> 
     <td style="border: 1px solid black; border-collapse: collapse; ">DOCTOR'S ORDER</td> 
  	</tr>
  	
  	<?php 
  	     for($i=0;$i<25;$i++)
  	     {
  	?>
      	<tr>
         <td style="border: 1px solid black; border-collapse: collapse;height:30; width:50px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse; width:150px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse; "></td> 
      	</tr>
  	<?php 
  	     }
  	?>
</table>
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
<!-- Footer Doctor's Order -->
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
<!-- End of Doctor's Order -->

<!-- Waiver -->
<header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>
<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>PAGTUGOT</h3></td>
  </tr>
    <tr>
     <td ><h3>(WAIVER)</h3></td>
  </tr>
</table>
<table style="width:100% ;text-align:justify ; ">
  <tr>
     <td>
     	Human sa maayo nga pagpasabot kanako, ako si ________________________________ nga ana sa ensaktong pangidaron
     	nagatugot nga ako/akong pasyente masulod/ma-admit dir sa Agusan del Norte Provincial Hospital bisan pa sa mga sumusunod na nga sitwasyon:
     
     </td>
  </tr>
  <tr>
     <td>
     	<br>
     	(&nbsp;&nbsp;) Wala nay kwarto nga masudlan busa sa hallway na lang iplastar ang pasyente gamit ang hospital folding bed.
     </td>
  </tr>
  <tr>
     <td>
     	(&nbsp;&nbsp;) Kung wala nay bakante nga folding bed, ang wheel chair/linkuranan o stretcher una sa ward ang gamiton samtang 
     	maghulat nga adunay mabakante nga katre/folding bed.
     </td>
  </tr>
  
    <tr>
     <td>
     	(&nbsp;&nbsp;) Kung walay bakante nga infant incubator, ang bata iplastar una sa bassinet o lamesa.
     </td>
  </tr>
  
  <tr>
     <td>
     	(&nbsp;&nbsp;) Walay bakante/Supply nga medical oxygen.
     </td>
  </tr>
   
   <tr>
     <td>
     	(&nbsp;&nbsp;) Walay ICU ang Hospital
     </td>
  </tr>
   
   <tr>
     <td>
     	(&nbsp;&nbsp;) Walay neuro-surgeon
     </td>
  </tr>
   
   <tr>
     <td>
     	(&nbsp;&nbsp;) Uban pa ___________________________________.
     </td>
  </tr>
   
   <tr>
     <td>
     	<br>
     	Akong gikuhaan ang mga hospital staff/personnel sa ADNPH sa unsa mang responsibilidad kung unsa man ugaling ang 
     	dangatan kanako/akong pasyente sa akong desisyon nga gihimo.
     </td>
  </tr>
</table>
<table style="width:100% ;text-align:center;">
  <tr>
     <td style="width:50%;height:80 "  valign="bottom">
     <?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?>
     
     </td>
       <td style="width:50% ;">
     	
     
     </td>
  </tr>

  <tr>
     <td style="width:50% ;">
     	Ngalan ug pirma ibabaw sa pangalan sa nitugot
     
     </td>
       <td style="width:50% ;">
     	Ngalan ug pirma ibabaw sa pangalan sa testigo
     
     </td>
  </tr>
  <tr>
     <td style="width:100% ;" colspan="2">
     	<?php 
     	  echo date('m-d-Y');
     	?>
     
     </td>
  </tr>
        </table>
        <!-- Footer Waiver-->
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
<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
        </footer>
  	<?php 
  	     for($i=0;$i<25;$i++)
  	     {
  	?>
      	<tr>
         <td style="border: 0px solid black; border-collapse: collapse;height:20 "></td> 
      	</tr>
  	<?php 
  	     }
  	?>
</table>


<!-- Consent to Care -->
<header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>
<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>CONSENT TO CARE</h3></td>
  </tr>
</table>

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

<table style="width:100% ;text-align:justify ; ">
<tr>
     <td>
     <br>
     	1.	I HEREBY  AUTHORIZED Dr.______________________and the staff of this  hospital to perform treatment and procedures deemed necessary for my care. 
     </td>
  </tr>
  <tr>
     <td>
     	<br>
     	2.	I ALSO GIVE AUTHORIZATION for the hospital to supply information for my medical  records, my insurance and for my attorney.
     </td>
  </tr>
</table>

<table style="width:100% ;text-align:center;">
<tr>
     <td style="width:50%;height:40"  valign="bottom">
     	
     
     </td>
       <td style="width:50% ;">
     	
     
     </td>
  </tr>
  <tr>
     <td>
     	____________________________<br>
     	Signature of Witness
     
     </td>
       <td style="width:50% ;">
     	<?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?><br>
     	Signature of Patient
     </td>
  </tr>
</table>

<table style="width:100% ;text-align:justify ; ">
<tr>
     <td>
     <br>
     	3.	I, _________________________ being the next of kin of _______________________ hereby authorized Dr. _____________________ and the staff of this  hospital to perform necessary treatment.
     </td>
  </tr>
  <tr>
     <td>
     	<br>
     	The authorization must be signed by the patient  or the next kin in case of minor or if the patient is physically and mentally incompetent. Patient is a minor of _________________________ . Patient is unable to sign because of _________________________ 
     </td>
  </tr>
</table>

<table style="width:100% ;text-align:center;"><tr>
     <td style="width:50%;height:80 "  valign="bottom">
     	
     
     </td>
       <td style="width:50% ;">
     	
     
     </td>
  </tr>
  <tr>
     <td>
     	____________________________<br>
     	Signature of Witness
     
     </td>
       <td style="width:50% ;">
     	____________________________<br>
     	Signature of Next Kin
     </td>
  </tr>
  <tr>
    <td>
     	<?php 
     	  echo date('m-d-Y');
     	?>
     
     </td>
      <td>
     	____________________________<br>
     	Relation to Patient
     </td>
  </tr>
        </table>


<!--Footer Consent to Care -->
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


       <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
        </footer>
  	<?php 
  	     for($i=0;$i<19;$i++)
  	     {
  	?>
      	<tr>
         <td style="border: 0px solid black; border-collapse: collapse;height:20 "></td> 
      	</tr>
  	<?php 
  	     }
  	?>
</table>
<!-- End of Consent to Care -->

<!-- MEDICAL ABSTRACT -->
<header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>
<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>MEDICAL ABSTRACT</h3></td>
  </tr>
</table>
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
  <tr>
    <td>Date</td>
    <td>:</td>
    <td>
    <?php echo date('m-d-Y'); ?>
    </td> 
  </tr>
</table>

<table style="width:100% ;text-align:center;">
  <tr>
     <td style="width:50%;height:80 "  valign="bottom">
     	ORDER OF RECORDING:
     
     </td>
  </tr>
</table>

<table style="width:100% ;text-align: left">
  <tr>
    <td style="width:200px;height:70;" valign="top">1. Brief History</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">2. Pertinent Physical Findings</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">3. Impression</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">4. Medication</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
        </tr>
    <tr>
    <td style="width:200px;height:70;" valign="top">5. Procedures</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">6. Final Diagnosis</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">7. Recommendation</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
        </table>
        <table style="width:100% ;text-align: right">
  <tr>
    <td style="width:200px;height:70;" valign="bottom">
    	__________________________________________<br>
    	Physician's Signature Over Printed Name<br>
    	Lic. No. __________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
       || Clerk:<?php echo $model->entryby0->lastname.','.$model->entryby0->firstname; ?>
        </footer>
        <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">

  	<?php 
  	     for($i=0;$i<6;$i++)
  	     {
  	?>
      	<tr>
         <td style="border: 0px solid black; border-collapse: collapse;height:20 "></td> 
      	</tr>
  	<?php 
  	     }
  	?>
</table>
<!-- End of Medical Abstrat -->

<!-- Discharge Summary -->
<header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>

<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>DISCHARGE SUMMARY</h3></td>
  </tr>
</table>


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
  
  <tr>
    <td>Date</td>
    <td>:</td>
    <td>
    	<?php echo date('m-d-Y'); ?>
    </td> 
  </tr>
</table>

<table style="width:100% ;text-align:center;">
  <tr>
     <td style="width:50%;height:80 "  valign="bottom">
     	ORDER OF RECORDING:
     
     </td>
  </tr>
</table>

<table style="width:100% ;text-align: left">
  <tr>
    <td style="width:200px;height:70;" valign="top">1. Brief History</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">2. Pertinent Physical Findings</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">3. Impression</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">4. Medication</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">5. Procedures</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">6. Final Diagnosis</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
  <tr>
    <td style="width:200px;height:70;" valign="top">7. Recommendation</td>
    <td style="width:20px ;" valign="top">:</td>
    <td>
    	
    </td> 
  </tr>
</table>


<table style="width:100% ;text-align: right">
  <tr>
    <td style="width:200px;height:70;" valign="bottom">
    	_________________________________<br>
    	Physician's Signature Over Printed Name<br>
    	Lic. No. __________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
        </footer>

        <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">

<?php 
     for($i=0;$i<7;$i++)
     {
?>
    <tr>
   <td style="border: 0px solid black; border-collapse: collapse;height:20 "></td> 
    </tr>
<?php 
     }
?>
</table>
    <!-- End of Discharge Summary -->

    <!-- IVF SHEET -->

    <header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>
<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">
        
           <table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>IVF SHEET</h3></td>
  </tr>
</table>
<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <th align=center style="border: 1px solid black; border-collapse: collapse; ">DATE</th> 
     <th align=center style="border: 1px solid black; border-collapse: collapse; ">BOT NO.</th> 
     <th align=center style="border: 1px solid black; border-collapse: collapse; ">NAME OF IVF</th> 
     <th align=center style="border: 1px solid black; border-collapse: collapse; ">INCORPORATION</th> 
      <th align=center style="border: 1px solid black; border-collapse: collapse; ">FLOW RATE</th> 
       <th align=center style="border: 1px solid black; border-collapse: collapse; ">TIME</th> 
        <th align=center style="border: 1px solid black; border-collapse: collapse; ">REMARKS</th> 
         <th align=center style="border: 1px solid black; border-collapse: collapse; ">SIGNATURE</th> 
  	</tr>
      <?php 
  	     for($i=0;$i<23;$i++)
  	     {
  	?>
    <tr>
         <td style="border: 1px solid black; border-collapse: collapse;height:30;width:60px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;width:60px ;"></td> 
         <td style="border: 1px solid black; border-collapse: collapse; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;width:60px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse; "></td> 
      	</tr>
  	<?php 
  	     }
  	?>
    </table>
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
       || Clerk:<?php echo $model->entryby0->lastname.','.$model->entryby0->firstname; ?>
        </footer>

        <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
        </footer>
  	<?php 
  	     for($i=0;$i<3;$i++)
  	     {
  	?>
      	<tr>
         <td style="border: 0px solid black; border-collapse: collapse;height:20 "></td> 
      	</tr>
  	<?php 
  	     }
  	?>
</table>
        <!--End of IVF SHEET -->


<!-- Medication Sheet -->

<header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>
<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>MEDICATION SHEET</h3></td>
  </tr>
</table>

<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
<tr>
     <td style="border: 1px solid black; border-collapse: collapse; " colspan="2"></td> 
     <td style="border: 1px solid black; border-collapse: collapse;height:30px;width:100px" colspan="6">DATE</td> 
  	</tr>
      <tr>
     <th align=center style="border: 1px solid black; border-collapse: collapse; height: 50px; width:180px; ">MEDICATION ORDER</th> 
     <th align=center style="border: 1px solid black; border-collapse: collapse;width:80px ">TIME</th> 
     <th style="border: 1px solid black; border-collapse: collapse;width:100px "></th> 
     <th style="border: 1px solid black; border-collapse: collapse;width:100px "></th> 
      <th style="border: 1px solid black; border-collapse: collapse;width:100px "></th> 
       <th style="border: 1px solid black; border-collapse: collapse;width:100px "></th> 
        <th style="border: 1px solid black; border-collapse: collapse;width:100px "></th> 
         <th style="border: 1px solid black; border-collapse: collapse;width:100px "></th> 
  	</tr>
      <?php 
  	     for($i=0;$i<15;$i++)
  	     {
  	?>
    <tr>
         <td style="border: 1px solid black; border-collapse: collapse;height:30;width:60px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;width:20px ;"></td> 
         <td style="border: 1px solid black; border-collapse: collapse;height:50px; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;height:50px; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;height:50px; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;height:50px; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;height:50px; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;height:50px; "></td> 
          
      	</tr>
  	<?php 
  	     }
  	?>
</table>
<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
<tr>
     <td style="border: 1px solid black; border-collapse: collapse; " colspan="1">SHIFT</td> 
     <td style="border: 1px solid black; border-collapse: collapse;height:30px;width:150px" colspan="8">SPECIMEN SIGNATURES</td> 
  	</tr>
      <tr>
	<th align=center style="border: 1px solid black; border-collapse: collapse; height:25px;width:208px;">AM</th> 
		<th align=left style="border: 1px solid black; border-collapse: collapse; width:80px"></th> 
			<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
				<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
					<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
						<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
							<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
  	</tr>
      <tr>
     <th align=center style="border: 1px solid black; border-collapse: collapse;height:25px;width:200px ">PM</th> 
	 	<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
			<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
				<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
					<th align=left style="border: 1px solid black; border-collapse: collapse; width:80px"></th> 
						<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
							<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
 
	</tr>
    <tr>
     <th align=center style="border: 1px solid black; border-collapse: collapse;height:25px;width:200px ">NIGHT</th> 
	 	<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
			<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
				<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
					<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
						<th align=left style="border: 1px solid black; border-collapse: collapse; width:80px"></th> 
							<th align=left style="border: 1px solid black; border-collapse: collapse;width:80px "></th> 
 
	</tr>
</table>
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
       || Clerk:<?php echo $model->entryby0->lastname.','.$model->entryby0->firstname; ?>
        </footer>
        <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
        </footer>
  	<?php 
  	     for($i=0;$i<1;$i++)
  	     {
  	?>
      	<tr>
         <td style="border: 0px solid black; border-collapse: collapse;height:20 "></td> 
      	</tr>
  	<?php 
  	     }
  	?>
</table>

<!-- End of Medication Sheet -->

<!-- Nurses Notes -->

<header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>
<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>NURSES NOTES</h3></td>
  </tr>
</table>
<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
<tr>
     <th style="border: 1px solid black; border-collapse: collapse;width:100px ">DATE/SHIFT</th> 
     <th style="border: 1px solid black; border-collapse: collapse;width:80px ">TIME</th> 
     <th style="border: 1px solid black; border-collapse: collapse;width:80px ">DIET</th> 
     <th style="border: 1px solid black; border-collapse: collapse;">NURSES NOTES</th> 
  	</tr>

      <?php 
  	     for($i=0;$i<25;$i++)
  	     {
  	?>
      	<tr>
         <td style="border: 1px solid black; border-collapse: collapse;height:30;width:100px "></td> 
         <td style="border: 1px solid black; border-collapse: collapse;"></td> 
         <td style="border: 1px solid black; border-collapse: collapse; "></td> 
         <td style="border: 1px solid black; border-collapse: collapse; "></td> 
      	</tr>
  	<?php 
  	     }
  	?>
        </table>

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
       || Clerk:<?php echo $model->entryby0->lastname.','.$model->entryby0->firstname; ?>
        </footer>

<!-- End of Nurser notes -->

<!-- Laboratory Results -->
<header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>

<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">


<table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>LABORATORY RESULTS</h3></td>
  </tr>
</table>
<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">

<?php 
  	     for($i=0;$i<25;$i++)
  	     {
  	?>
      	<tr>
         <td style="border: 1px solid black; border-collapse: collapse;height:30;"></td>
      	</tr>
  	<?php 
  	     }
  	?>
</table>
<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
		<tr>
         <td style="border: 0px solid black; border-collapse: collapse;height:30;">
         (ATTACH LABORATORY RESULTS CHRONOLOGICALLY)
         </td>
      	</tr>
</table>
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
  <tr>
    <td></td>
    <td></td> 
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
       || Clerk:<?php echo $model->entryby0->lastname.','.$model->entryby0->firstname; ?>
        </footer>
        <!-- End of Laboraty Results -->


        <!-- Discharge Clearance -->

        <header class="container1">
    <div class= "image3">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:65px;height: 65px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image4">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:65px;height: 65px']); ?>
            </div>
</header>
<hr style="height: 2px;
           background: teal;
           margin-bottom: 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<table style="width:100% ;text-align: center; ">
  <tr>
     <td ><h3>DISCHARGE CLEARANCE</h3></td>
  </tr>
</table>
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
  <tr>
    <td>Room</td>
    <td>:</td>

    <td style="border: 1px solid black; border-collapse: collapse;width:50% ;height:30;"></td>
  </tr>
</table>
<table style="width:100% ;text-align: center; ">
<tr>
     <td ><h4>Final Diagnosis</h4><p style="color:red">(PALIHUG KOPYAHA ANG GIKAN SA COVER SHEET)</p></td>
  </tr>
</table>
<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
      	<tr>
          	<td>
             	<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                  <tr>
                         <td style="border: 1px solid black; border-collapse: collapse;">Final Diagnosis</td> 
                         <td style="border: 1px solid black; border-collapse: collapse;width:80px">ICD Code</td> 
                  </tr>
                  	<tr>
                        <td style="border: 1px solid black; border-collapse: collapse;height:180 ;" valign="bottom"></td>
                        <td style="border: 1px solid black; border-collapse: collapse;" valign="bottom">
                        </td>
                  	</tr>
                </table>
    		</td>
      	</tr>
          <table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
      	<tr>
          	<td>
             	<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">

                  	<tr>
                        <td style="border: 1px solid black; border-collapse: collapse;" valign="bottom"><br><br>Attending Physician</td>
                  	</tr>
                 
                </table>
    		</td>
      	</tr>
        </table>

        <table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
      	<tr>
          	<td>
             	<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                  <tr>
                    
                         <td style="border: 1px solid black; border-collapse: collapse;width:50px;height:30;">Admitted Date and Time</td> 
                         <td style="border: 1px solid black; border-collapse: collapse;width:120px"><!-- php echo $adddatetime;  --></td> 
                         
                         <td style="border: 1px solid black; border-collapse: collapse;width:50px">Discharge Date and Time</td> 
                         <td style="border: 1px solid black; border-collapse: collapse;width:120px;"></td> 
                      	
                  </tr>
                  </table>
             </td>
        </tr>
</table>
<table style="width:100% ;text-align: left; border: 0px solid black; border-collapse: collapse;">
		<tr>
         <td style="border: 0px solid black; border-collapse: collapse;height:30;">
         	Instruction: Palihog ug paperma sa Laboratory, Radiology (Xray), Pharmacy sa dli mo adto sa Information Desk (Entrance) sa 1st floor. Paghuman ug paperma adto sa Information Desk (Entrance) mangayo og number.
         </td>
      	</tr>
</table>
<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
		   <td style="border: 0px solid black; border-collapse: collapse;width:50%;height:40 ;">
		   		
                    <!-- 		   		---- -->
                    <table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
                          	<tr>
                              	<td style="border: 0px solid black; border-collapse: collapse;width:50%">
                                 	<table style="width:100% ;text-align: left; border: 0px solid black; border-collapse: collapse;">
									<tr>
                                        
                                             <td style="border: 1px solid black; border-collapse: collapse;width:120px;height:25 ; font-size:10px ;">Family Planning / Adolescent Youth</td> 
                                             <td style="border: 1px solid black; border-collapse: collapse;width:"></td> 
                                          	
                                      </tr>
                                      <tr>
                                        
                                             <td style="border: 1px solid black; border-collapse: collapse;width:120px;height:25 ;">Nurse Station</td> 
                                             <td style="border: 1px solid black; border-collapse: collapse;width:"></td> 
                                          	
                                      </tr>
                                       <tr>
                                        
                                             <td style="border: 1px solid black; border-collapse: collapse;width:120px;height:25 ;">Laboratory</td> 
                                             <td style="border: 1px solid black; border-collapse: collapse;width:"></td> 
                                          	
                                      </tr>
                                       <tr>
                                        
                                             <td style="border: 1px solid black; border-collapse: collapse;width:120px;height:25 ;">Radiology (Xray)</td> 
                                             <td style="border: 1px solid black; border-collapse: collapse;width:"></td> 
                                          	
                                      </tr>
                                       <tr>
                                        
                                             <td style="border: 1px solid black; border-collapse: collapse;width:120px;height:25 ;">Pharmacy</td> 
                                             <td style="border: 1px solid black; border-collapse: collapse;width:"></td> 
                                          	
                                      </tr>
                                       <tr>
                                        
                                             <td style="border: 1px solid black; border-collapse: collapse;width:120px;height:25 ;">Billing Section</td> 
                                             <td style="border: 1px solid black; border-collapse: collapse;width:"></td> 
                                          	
                                      </tr>
                                       <tr>
                                        
                                             <td style="border: 1px solid black; border-collapse: collapse;width:120px;height:25; font-size:12px;">Central Supply Room</td> 
                                             <td style="border: 1px solid black; border-collapse: collapse;width:"></td> 
                                          	
                                      </tr>
                                      
                                      </table>
                                 </td>
                            </tr>
                    </table>
                    		   		
                    <!-- ----		   		 -->
		   </td> 
			<td style="border: 0px solid black; border-collapse: collapse;width:50%;height:40 ;" valign="top">
			
						<table style="width:100% ;text-align: left; border: 0px solid black; border-collapse: collapse;">
                                      <tr>
                                        
                                             <td style="border: 1px solid black; border-collapse: collapse;width:120px;height:28 ;">LMP</td> 
                                             <td style="border: 1px solid black; border-collapse: collapse;" ></td> 
                                          	
                                      </tr>
                                      
                                      
                                      </table>
                                      
                                      <table style="width:100% ;text-align: left; border: 0px solid black; border-collapse: collapse;">
                                      <tr>
                                        
                                             
                                             <td style="border: 1px solid black; border-collapse: collapse;text-align: center;height:150px;" valign="bottom" >Nurse note/s</td> 
                                          	
                                      </tr>
                                      
                                      
                                      </table>
		   
		   </td>
	</tr>

</table>
<table style="width:100% ;text-align: left; border: 0px solid black; border-collapse: collapse;">
		<tr>
         <td style="border: 0px solid black; border-collapse: collapse;height:30;">
         Note: Palihog ibalik sa nurse station ang "Billing Clearance" kung aduna nay "OK BILLING" gikan sa Billing Section.
         </td>
      	</tr>
</table>
<table style="width:100% ;text-align: left; border: 0px solid black; border-collapse: collapse;">
<tr>
         <td style="width:50% ;border: 0px solid black; border-collapse: collapse;height:30;">
         <br>
		 Signature Over Printed Name <br> 
         (Supervisor/Senior Nurse/OIC)<br> <br> <br>
		 Signature Over Printed Name <br>
         (Medical Evaluator)
         </td>
         <td>
         		<table style="width:100% ;text-align: center; border: 1px solid black;height:100; border-collapse: collapse;">
         	 		<tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top" colspan="3"><h5>DISPOSITION</h5></td>
                         
                      </tr>
                      	<tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Discharged</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Transferred</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Absconded</td>
                      </tr>
                      <tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top" colspan="2">[&nbsp;&nbsp;]HAMA/DAMA</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Expired</td>
                      </tr>
         	 	</table>
         	 	
         	 	<table style="width:100% ;text-align: center; border: 1px solid black;height:100; border-collapse: collapse;">
         	 		<tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top" colspan="3"><h5>CONDITION DISCHARGE</h5></td>
                         
                      </tr>
                      	<tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Recovered</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Improved</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;]Unapproved</td>
                      </tr>
                      <tr>
                        <td style="border: 0px solid black; border-collapse: collapse;" valign="top" colspan="2">[&nbsp;&nbsp;]Died</td>
                         <td style="border: 0px solid black; border-collapse: collapse;" valign="top">[&nbsp;&nbsp;Died less than 24 hrs</td>
                      </tr>
         	 	
         	 	</table>
         
         </td>
      	</tr>
        </table>
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
       || Clerk:<?php echo $model->entryby0->lastname.','.$model->entryby0->firstname; ?>
        </footer>