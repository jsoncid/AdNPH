<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use backend\modules\rbac\models\RbacAuthItem;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use common\models\Hadmlog;

/* @var $this yii\web\View */
/* @var $model common\models\PhoTransmittal */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="pho-transmittal-form">

    <?php $form = ActiveForm::begin(); ?>
    
    
    <?php 
        $model->received_date = date("Y-m-d H:i:s");
        $model->is_received = 1;
    ?>
	
	<?php 
	    $model->received_by = Yii::$app->user->id;
    ?>
	<?= $form->field($model, 'received_by')->hiddenInput()->label(false) ?>
	<?= $form->field($model, 'is_received')->hiddenInput()->label(false) ?>
	<?= $form->field($model, 'received_date')->hiddenInput()->label(false) ?>
    
    <?php echo $form->field($model, 'received_remarks')->textInput()->label('Remarks') ?>



    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    
    
    
    
    
    

    <?php ActiveForm::end(); ?>
    

</div>
