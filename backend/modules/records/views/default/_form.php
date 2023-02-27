<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsFilling $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="pho-records-filling-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'enccode')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'is_received')->textInput() ?>
                <?php echo $form->field($model, 'is_scanned')->textInput() ?>
                <?php echo $form->field($model, 'is_forward_to_claims')->textInput() ?>
                <?php echo $form->field($model, 'received_by')->textInput() ?>
                <?php echo $form->field($model, 'scanned_by')->textInput() ?>
                <?php echo $form->field($model, 'forward_to_claims_by')->textInput() ?>
                <?php echo $form->field($model, 'update_received_by')->textInput() ?>
                <?php echo $form->field($model, 'update_scanned_by')->textInput() ?>
                <?php echo $form->field($model, 'update_forward_to_claims_by')->textInput() ?>
                <?php echo $form->field($model, 'date_received_by')->textInput() ?>
                <?php echo $form->field($model, 'date_scanned_by')->textInput() ?>
                <?php echo $form->field($model, 'date_forward_to_claims')->textInput() ?>
                <?php echo $form->field($model, 'date_update_received')->textInput() ?>
                <?php echo $form->field($model, 'date_update_scanned')->textInput() ?>
                <?php echo $form->field($model, 'date_update_forward_to')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
