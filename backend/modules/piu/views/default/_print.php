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
use common\controllers\PatiendetailsController;

HeaderAsset:: register($this);
$this->registerCssFile("/backend/web/css/header.css");
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
  <tr>
     <td ><h3>Patient's Information Clearance</h3></td>
  </tr>
</table>



<table style="width:100% ;text-align: left">
<tr>
    <td style="width:100px ;">Health Record No.</td>
    <td style="width:20px ;">:</td>
    <td> <?php echo $model->hpercode; ?></td>
    </tr>
  <tr>
    <td>Full Name</td>
    <td>:</td>
    <td> <?php echo PatiendetailsController::Fullname($model->hpercode); ?> </td> 
  </tr>
  <tr>
    <td>Address</td>
    <td>:</td>
    <td> <?php echo PatiendetailsController::Address($model->hpercode); ?> </td> 
  </tr>
  </table>
  
  <table style="width:100%">
  <tr>
  	<td style="width:100px ;">Contact</td>
    <td style="width:20px ;">:</td>
    <td style="text-align: left;"> <?php echo PatiendetailsController::Contact($model->hpercode); ?> </td>
  	<td style="width:100px ;">Birth Date</td>
    <td style="width:20px ;">:</td>
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
    <td>Age</td>
    <td>:</td>
    <td>
    <?php echo PatiendetailsController::Agecurrent($model->hpercode); ?>
    </td> 
  </tr>
  <tr>
    <td>Civil Status</td>
    <td>:</td>
    <td>
    <?php echo PatiendetailsController::Civilstatus($model->hpercode); ?></td>
    </td> 
    <td>Nationality</td>
    <td>:</td>
    <td>
    <?php echo $model->natcode; ?>
    </td>
  </tr>
  

</table>
<br>

<table style="width:100% ;text-align: left">
<tr>
    <td style="width:150px ;">Contact Person Full Name</td>
    <td style="width:20px ;">:</td>
    <td> <?php echo $model->patemernme; ?></td>
    </tr>
  <tr>
    <td>Address</td>
    <td>:</td>
    <td> <?php echo $model->patemaddr; ?> </td> 
  </tr>
  <tr>
    <td>Contact Number</td>
    <td>:</td>
    <td> <?php echo $model->pattelno; ?> </td> 
  </tr>
  <tr>
    <td>Relation to Patient</td>
    <td>:</td>
    <td> <?php echo  $model->relemacode; ?>  </td> 
  </tr>
  </table>
  
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
<!-- End of Monitoring Sheet -->

 