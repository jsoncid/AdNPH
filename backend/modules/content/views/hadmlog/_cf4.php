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

$adddatetime="";
$modeladddate= Hadmlog::find()
->where(['hpercode' => $model->hpercode])
->one();

$modeladdtime= Hadmlog::find()
->where(['hpercode' => $model->hpercode])
->one();

if($modeladddate !== NULL)
{
    $adddatetime = date('m/d/Y h:i:s a', strtotime($modeladddate->admdate)); 
}
else 
{
    $adddatetime= "None";
}
?>



<div style="text-align: center;">
<?php echo Html::img('@web/img/headercf3.jpg', ['alt' => 'headercf3', 'style' => 'width:85%']); ?>
	 <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
	 		       <tr>
                   		<td>
                   				<table style="width:80% ;text-align: left; border: 0px solid black; border-collapse: collapse;">
                                	<tr>
                                     	<td colspan="2" style="width:100%;border: 0px solid black; border-collapse: collapse;" ><p style="font-size:9px">1. PhilHealth Accreditation No.(PAN) - Institutional Health Care Provider <b>H 1 4 0 1 4 5 0 6</b></p></td>
                                     </tr>
                                </table>
                   		</td>          
                   </tr>
                   <tr>
                   		<td>
                   				<table style="width:80% ;text-align: left; border: 0px solid black; border-collapse: collapse;">
                                	<tr>
                                     	<td colspan="1" valign="top" style="width:70%;border: 0px solid black; border-collapse: collapse;" ><p style="font-size:9px">2. Name of Patient</p></td>
                                     	<td colspan="1" rowspan= "5"  valign="top" style="border: 1px solid black; border-collapse: collapse;" ><p style="font-size:9px">3. Chief Complaint/Reason for Admission<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</p></td>
                                     </tr>
                                     <tr>
                                     	<td colspan="1"  valign="top" style="width:70%;border: 0px solid black; border-collapse: collapse;" >
											<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                                     			<tr>
                                     				<td style="width:30% ;text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><b><?php echo $model->patlast.' '.$model->patsuffix; ?></b></p></td>
                                     				<td style="width:30% ;text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><b><?php echo $model->patfirst; ?></b></p></td>
                                     				<td style="text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><b><?php echo $model->patmiddle; ?></b></p></td>
                                     			</tr>
                                     		</table>
										</td>
                                     </tr>
                                     <tr>
                                     	<td colspan="1"  valign="top" style="width:70%;border: 0px solid black; border-collapse: collapse;" >
											<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                                     			<tr>
                                     				<td style="width:30% ;text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">Last Name</p></td>
                                     				<td style="width:30% ;text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">First Name</p></td>
                                     				<td style="text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">Middle Name</p></td>
                                     			</tr>
                                     		</table>
										</td>
                                     </tr>
                                     <tr>
                                     	<td colspan="1"  valign="top" style="width:70%;border: 0px solid black; border-collapse: collapse;" >
											<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                                     			<tr>
                                     				<td style="width:90px ;text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">4. Date Admitted:</p></td>
                                     					<td style="text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:11px"><B><?php echo substr($adddatetime,0,10); ?></B></p></td>
                                     				<td style="width:90px ;text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">Time Admitted:</p></td>
                                     					<td style="text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:11px"><B><?php echo substr($adddatetime,11,18); ?></B></B></p></td>
                                     				
                                     			</tr>
                                     		</table>
										</td>
                                     </tr>
                                     
                                     <tr>
                                     	<td colspan="1"  valign="top" style="width:70%;border: 0px solid black; border-collapse: collapse;" >
											<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                                     			<tr>
                                     				<td style="width:50px ;text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><br>5. Date Discharged:</p></td>
                                     					<td style="text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">__ __ - __ __ - __ __ __ __ <br> (mm-dd-yyyy)</td>
                                     				<td style="width:50px ;text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">Time Discharged:</p></td>
                                     					<td style="text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">&nbsp;&nbsp;__ __ : __ __ [&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;AM &nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;PM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p></td>
                                     				
                                     			
                                     			</tr>
                                     		</table>
										</td>
                                     </tr>
                                </table>
                   		</td>  
                   </tr>
	 </table>

     <?php echo Html::img('@web/img/bottomcf3.jpg', ['alt' => 'bottomcf3', 'style' => 'width:85%']); ?>


     <?php echo Html::img('@web/img/header.jpg', ['alt' => 'header', 'style' => 'width:85%']); ?>

     <table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
        	<tr>
        		<td>
        		 	<table style="width:78% ;text-align: center; border: 1px solid black; border-collapse: collapse;">
                    	<tr>
                         <td colspan="3" style="width:100%;border: 1px solid black; border-collapse: collapse;background-color:#D3D3D3" ><p style="font-size:9px"><B>II. PATIENT'S DATA</B></p></td>
                         </tr>
                         <tr>
                             <td colspan="2" valign="top" style=" width:100%; border: 1px solid black; border-collapse: collapse; text-align: left;" ><p style="font-size:9px"><B>1. Name of Patient</B></p>
                             	
                             		<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                             			<tr>
                             				<td style="width:35% ;text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><b><?php echo $model->patlast.' '.$model->patsuffix; ?></b></p></td>
                             				<td style="width:35% ;text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><b><?php echo $model->patfirst; ?></b></p></td>
                             				<td style="text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><b><?php echo $model->patmiddle; ?></b></p></td>
                             			</tr>
                             		</table>
                             </td>
                         <td colspan="1" valign="top" style="border: 1px solid black; border-collapse: collapse; text-align: left;" ><p style="font-size:9px"><B>2. PIN</B></p></td>
                         </tr>
                         
                         <tr>
                             <td colspan="2" valign="top" style=" width:100%; border: 1px solid black; border-collapse: collapse; text-align: left;" >
                             	
                             		<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                             			<tr>
                             				<td style="width:35% ;text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">Last Name</p></td>
                             				<td style="width:35% ;text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">First Name</p></td>
                             				<td style="text-align: center; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">Middle Name</p></td>
                             			</tr>
                             		</table>
                             </td>
                         	<td colspan="1" valign="top" style="border: 1px solid black; border-collapse: collapse; text-align: left;" ><p style="font-size:9px"><B>3. Age: <?php echo substr($age,0,2); ?></B></p></td>
                         </tr>
                         
                         <tr>
                             <td colspan="2" valign="top" style=" width:70%; border: 1px solid black; border-collapse: collapse; text-align: left;" ><p style="font-size:9px"><B>5. Chief Complaint</B></p>
                             	
                             		<br><br><br>
                             		
                             </td>
                         	<td colspan="1" valign="top" style="border: 1px solid black; border-collapse: collapse; text-align: left;" >
                         		<?php 
                             		if($model->patsex== 'M')
                             		{
                                ?>
                                		<p style="font-size:9px"><B>4. Sex</B> <br>[&nbsp;/&nbsp;]&nbsp;&nbsp;Male <br> [&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;Female </p>
                                <?php 
                             		}
                             		else
                             		{
                             	?>
                             			<p style="font-size:9px"><B>4. Sex</B> <br>[&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;Male <br> [&nbsp;/&nbsp;]&nbsp;&nbsp;Female </p>
                             	<?php
                             		}
                         		?>
                         		
                         		
                         		
                         	</td>
                         </tr>
                         
                         <tr>
                             <td colspan="1" valign="top" style=" width:35%; border: 1px solid black; border-collapse: collapse; text-align: left;" ><p style="font-size:9px"><B>6. Admitting Diagnosis</B></p>
                             	
                             		<br><br><br>
                             		
                             		<?php ?>
                             		
                             </td>
                             <td colspan="1" valign="top" style=" width:35%; border: 1px solid black; border-collapse: collapse; text-align: left;" ><p style="font-size:9px"><B>7. Discharge Diagnosis</B></p>
                             	
                             		<br><br><br>
                             		
                             </td>
                         	<td colspan="1" valign="top" style="border: 1px solid black; border-collapse: collapse; text-align: left;" ><p style="font-size:9px"><B>8.a. 1st Case Rate Code</B> <br><br><B>8.b. 2nd Case Rate Code</B><br></p>
                         		
                         	</td>
                         </tr>
                         
                         <tr>
                             <td colspan="3" valign="top" style=" width:70%; border: 1px solid black; border-collapse: collapse; text-align: left;" >
                             	
                             		<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                             			<tr>
                             				<td style="width:120px ;text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><B>9. a. Date Admitted:</B></p></td>
                             					<td style="text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:11px"><B><?php echo substr($adddatetime,0,10); ?></B></p></td>
                             				<td style="width:120px ;text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><B>9. b. Time Admitted:</B></p></td>
                             					<td style="text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:11px"><B><?php echo substr($adddatetime,11,21); ?></B></B></p></td>
                             				
                             			</tr>
                             		</table>
                             </td>
                         	
                         </tr>
                         <tr>
                             <td colspan="3" valign="top" style=" width:70%; border: 1px solid black; border-collapse: collapse; text-align: left;" >
                             	
                             		<table style="width:100% ;text-align: center; border: 0px solid black; border-collapse: collapse;">
                             			<tr>
                             				<td style="width:120px ;text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><B>10. a. Date Discharged:</B></p></td>
                             					<td style="text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">__ __ - __ __ - __ __ __ __ (mm-dd-yyyy)</td>
                             				<td style="width:120px ;text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px"><B>10. b. Time Discharged:</B></p></td>
                             					<td style="text-align: left; border: 0px solid black; border-collapse: collapse;"><p style="font-size:9px">__ __ : __ __ [&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;AM &nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;PM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p></td>
                             				
                             			
                             			</tr>
                             		</table>
                             </td>
                         	
                         </tr>
                         
                         
                         
                         
                    </table>
                </td>
        	</tr>
        	
        </table>     

        <?php echo Html::img('@web/img/bottom.jpg', ['alt' => 'bottom', 'style' => 'width:85%']); ?>
        <div style="text-align: center;">
        <?php echo Html::img('@web/img/PhilHealth_ClaimForm4-page-002.jpg', ['alt' => 'bottom', 'style' => 'width:85%']); ?>
                                </div>