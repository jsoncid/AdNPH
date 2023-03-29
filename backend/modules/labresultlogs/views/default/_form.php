<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Pholabresultlogs $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="pholabresultlogs-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'rf_id')->textInput() ?>
                <?php echo $form->field($model, 'update_by')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'update_on')->textInput() ?>
                <?php echo $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'enccode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'action')->textInput(['maxlength' => true]) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
