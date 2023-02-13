<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Haddr;
use common\models\Hbrgy;
use common\models\Hcity;
use common\models\Hprov;
use common\models\Htelep;
use common\models\Hadmlog;

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
    $address = $modeladdr->patstr.', '.$modelcitymun->ctyname.', '.$modelprov->provname;
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
     <td ><h3>Surgical Memorandum</h3></td>
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
    	<?php echo $model->patcstat; ?>
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
    <td>Birth Date</td>
    <td>:</td>
    <td>
    	<?php echo substr($model->patbdate,0,10); ?>
    </td> 
  </tr>
  

  
  


</table>




<br>


<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">

	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;" >Weight</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:80px" ></td>
     
     <td style="border: 1px solid black; border-collapse: collapse;" >Temperature</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:80px" ></td>
     
     <td style="border: 1px solid black; border-collapse: collapse;" >RR</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:80px" ></td>
     
     <td style="border: 1px solid black; border-collapse: collapse;" >PR</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:80px" ></td>
     
     <td style="border: 1px solid black; border-collapse: collapse;" >BP</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:100px" ></td>
      <td style="border: 1px solid black; border-collapse: collapse;" >Date Performed</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:150px;" ></td>
  	</tr>
</table>

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:150px" >Surgeon</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:150px" >Assistant Surgeon</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:150px" >Anesthesiologist</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
          <td style="border: 1px solid black; border-collapse: collapse;width:130px" >Type of Anesthesia</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>


<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:150px" >Time of Induction</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
          <td style="border: 1px solid black; border-collapse: collapse;width:130px" >Time Ended</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>
  

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:150px" >Scrub Nurse</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>  


<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:150px" >Circulating Nurse</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>

<table style="width:100% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >Pre-Operative Medication</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >Fluids</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >Blood Replacements</td>
  	</tr>
    
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" ></td>
  	</tr>
  	
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" ></td>
  	</tr>
  	
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" ></td>
  	</tr>
  	
</table>


<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:200px" >Pre-Operative Diagnosis</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>  

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>

</table>  

  
  
  <table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:200px" >Operation Performed</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>  

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
</table>


<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:16%;" >Operation Started</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:16%;" >Operation Ended</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:10%;" >RVS Code</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>
  
   <table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:200px" >Post-Operative Diagnosis</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>  

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
</table> 

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:200px" >Operation Technique</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table>  

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
  	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:33%;" >&nbsp;</td>
  	</tr>
</table> 
  
  
  <table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;" >FOR DELIVERIES/CAESAREAN SECTION ONLY (For Neonate)</td>
  	</tr>
</table> 

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:20%;" >Time of Delivery</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:10%;" >Sex</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:10%;" >Weight</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:10%;" >Apgar</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table> 

<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
	<tr>
     <td style="border: 1px solid black; border-collapse: collapse;width:7%;" >HC</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:7%;" >CC</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:7%;" >AC</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
     <td style="border: 1px solid black; border-collapse: collapse;width:7%;" >L</td>
     <td style="border: 1px solid black; border-collapse: collapse;" ></td>
  	</tr>
</table> 
  
    <br>  
  <br>
  <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">

	<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >_______________________________</td>
     <td style="border: 0px solid black; border-collapse: collapse;">_______________________________</td>
  	</tr>
  	<tr>
     <td style="border: 0px solid black; border-collapse: collapse;width:50%" >Signature of Anesthesiologist</td>
     <td style="border:  0px solid black; border-collapse: collapse;" >Signature of Surgeon</td>
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
