<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

use common\models\OptionValue;
use common\models\PhoRadOptionValue;
/**
 * @var yii\web\View $this
 * @var common\models\PhoRadResult $model
 * @var common\models\PhoRadOptionValue $modelsoption
 * @var yii\bootstrap4\ActiveForm $form
 */

?>

 <div class="pho-labresult-form">
   <?php   $form = ActiveForm::begin([
       'enableClientValidation' => false,
       'enableAjaxValidation' => true,
       'validateOnChange' => true,
       'validateOnBlur' => false,
       'options' => [
           'enctype' => 'multipart/form-data',
           'id' => 'dynamic-form',
            'action' => 'Defaultcontroller/actionCreate',]
        ]); ?>
        <div class="card">
            <div class="card-body">
              <?php echo $form->errorSummary($model); ?>
                 <?= $form->field($model, 'enccode')->textInput(['maxlength' => true]) ?>
                   <?php echo $form->field($model, 'added_by')->textInput() ?>
                 <?php echo $form->field($model, 'remarks')->textInput() ?>
                   <?php echo $form->field($model, 'rt_id')->textInput() ?>
                <div class="padding-v-md">
        <div class="line line-dashed"></div>
    			</div>
                 <?= $this->render('_form_option_values', [
        'form' => $form,
        'model' => $model,
         'modelsoption' => $modelsoption,
                     
                 ]) ?>
            </div> 
             </div>
             <div class="form-group">
              
          <!-- $form->field($model, 'timestamp')->hiddenInput(['value' => (new DateTime('now', new DateTimeZone('Asia/Hong_Kong')))->format('Y-m-d H:i:s T')])->label(false) ?> -->
            <?php  echo    Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?php echo Html::a('Cancel',['..'], ['class'=> 'btn btn-primary']) ?>
            
            </div>
        </div>
     <?php ActiveForm::end(); ?>



