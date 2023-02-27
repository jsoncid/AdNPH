<?php

use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use rmrevin\yii\fontawesome\FAS;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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


    <?php echo $form->errorSummary($model); ?>


	<?php 
    $model->user = Yii::$app->user->id;
    ?>
	<?= $form->field($model, 'user')->hiddenInput()->label(false) ?>
	
	<?php 
        echo $form->field($model, 'disdate')->widget(DatePicker::classname(), [
        'options'=>['id'=>'disdate'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                
            ]
        ])->label('Date Discharge');
    ?>
	
	<?php 
        echo $form->field($model, 'enccode')->widget(DepDrop::classname(), [
                    'options'=>['id'=>'enccode-id'],
                    'pluginOptions'=>[
                    'depends'=>['disdate'],
                    'placeholder'=>'Select...',
                    'url'=>Url::to(['/transmittal/default/hpersonget'])
                ]
        ])->label('Patient');
    ?>
	


    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    
    
    
    
    
    

    <?php ActiveForm::end(); ?>
    

</div>
