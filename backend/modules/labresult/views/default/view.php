<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii2assets\pdfjs\PdfJs;
use yii\bootstrap4\Modal;

/**
 * @var yii\web\View $this
 * @var common\models\PhoLabresult $model
 *@var common\models\OptionValue $optionValues
 */

//$optionValues = []; // initialize the variable with an empty array
$this->title = $model->enccode;
$this->params['breadcrumbs'][] = ['label' => 'Pho Labresults', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-labresult-view">
    <div class="card">
        <div class="card-header">

			            <?php echo Html::a('Home',['..'], ['class'=> 'btn btn-primary']) ?>
          
            
          
         <?php echo Html::a('Update', ['update', 'id' =>$model->rf_id], ['class' => 'btn btn-primary'])?>
            <?php echo Html::a('Delete', ['delete', 'id' => $model->rf_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) 
                ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'rf_id',
                    //'file',
                    'date',
                    'added_by',
                    'rt_id',
                    'enccode',
                    'remarks',
                    
                ],
                
               
            ]) ?>
            
        </div>
    </div>
    <?= $this->render('_view_option_value', [
        //'form' => $form,
        'model' => $model,
         'optionValues' => $optionValues,
                     
                 ]) ?>
</div>
