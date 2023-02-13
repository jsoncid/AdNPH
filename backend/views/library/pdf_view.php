<?php


use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    #customer{
        
        font-family:"Arial Narrow", Arial, sans=serif;
        border-collapse: collapse;
        width: 100%
    }

    #customer id, #customer th{

        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }
    #customer tr:hover{
        background-color: #ddd;
    }

    .timesdate{
         font-size: 18px;

    }
    .footer{
        position: relative;
        display: inline-block;

    }
    .container{
        position: relative;
        display: flex;

    }
    .header{
        font-family:"Arial Narrow", Arial, sans-serif;
        position: relative;
        text-align: center;
 }
   .image{
        margin-bottom: -7rem;
        margin-left: 7.8rem;
        position: relative;
        text-align: left;
        display: inline-block;
    }
    .image2{
        margin-top: -8rem;
        margin-right: 7.8rem;
        position: relative;
        text-align: right;
    }
    

</style>


<header class="container">
    <div class= "image">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:100px;height: 100px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image2">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:100px;height: 100px']); ?>
            </div>
</header>


<hr style="height: 5px;
           background: teal;
           margin: 20px 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

    <table id="customer">
    <tr>
<th> Book ID</th>
<th> Book Name</th>
<th> Book Descrip</th>
    </tr>


    

<?php foreach($dataProvider->getModels() as $model) {?>

    <tr> 

    <th><?= $model->Book_ID?></th>
    <th><?= $model->Book_name?></th>
    <th><?= $model->Book_Descrip?></th>


    <?php }?>
    </tr>
</table>

<hr style="height: 5px;
           background: teal;
           margin: 20px 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<footer class = "footer">
<div class="timesdate">
    Date:
    <?php echo date ("Y-m-d");?>
    Time:
    <?php date_default_timezone_set("Hongkong");
        echo date ("h:i a"); ?>
</div>
</footer>
