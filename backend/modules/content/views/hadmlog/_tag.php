<?php

use yii\helpers\Html;
use yii\grid\GridView;




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
<table style="width:100% ;text-align: left; border: 1px solid black; border-collapse: collapse;">
<tr>
<td style="border: 1px solid black; border-collapse: collapse;width:50%">
            <table style="width:100% ;text-align: center; ">
              <tr>
                 <td ><h3>IV TAG</h3></td>
              </tr>
            </table>
            
            <table style="width:100% ;text-align: left">
            	<tr>
                <td>Bottle No.</td>
                <td>:</td>
                <td>
                	_______________________
                </td> 
              </tr>
            
              <tr>
                <td style="width:70px ;">Name</td>
                <td style="width:20px ;">:</td>
                <td>
                	<?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?>
                </td> 
              </tr>
              <tr>
                <td style="width:70px ;">IVF Order</td>
                <td style="width:20px ;">:</td>
                <td>
                	_______________________________
                </td> 
              </tr>
              
              <tr>
                <td style="width:70px ;"></td>
                <td style="width:20px ;"></td>
                <td>
                	<h6>IVF Name &nbsp;&nbsp; Prep&nbsp;&nbsp; Incorporation&nbsp;&nbsp; Flow Rate</h6>
                </td> 
              </tr>
              
               <tr>
                <td style="width:70px ;">Date Started</td>
                <td style="width:20px ;">:</td>
                <td>
                	________________________
                </td> 
              </tr>
              <tr>
                <td style="width:70px ;">Timje Started</td>
                <td style="width:20px ;">:</td>
                <td>
                	________________________
                </td> 
              </tr>
              
              
              
            </table>
            
</td>
<td style="border: 1px solid black; border-collapse: collapse;width:50%">
 			<table style="width:100% ;text-align: center; ">
              <tr>
                 <td ><h3>WATCHER ID</h3></td>
              </tr>
            </table>
            
            <table style="width:100% ;text-align: justify; ">
              <tr>
                 <td><h4>Please allow issuance of 1 watcher ID to <?php echo $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle; ?> admitted at __________________ Ward. </h4></td>
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
       || Clerk:<?php echo $model->entryby0->lastname.','.$model->entryby0->firstname; ?>
        </footer>
        <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
        </footer>