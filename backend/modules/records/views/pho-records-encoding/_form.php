<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsEncoding $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="pho-records-encoding-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'enccode')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'hospital_num')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'final_diagnosis')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'additional_final_diagnosis')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'disdate')->textInput() ?>
                <?php echo $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'created_date')->textInput() ?>
                <?php echo $form->field($model, 'created_by')->textInput() ?>
                <?php echo $form->field($model, 'is_active')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
