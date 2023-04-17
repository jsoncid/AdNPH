<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\PhoRadResult $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="pho-rad-result-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'date')->textInput() ?>
                <?php echo $form->field($model, 'added_by')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'rt_id')->textInput() ?>
                <?php echo $form->field($model, 'enccode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
