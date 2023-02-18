<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsEncoding $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="pho-records-encoding-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 're_id') ?>
    <?php //echo $form->field($model, 'enccode') ?>
    <?php //echo $form->field($model, 'hospital_num') ?>
    <?php //echo $form->field($model, 'final_diagnosis') ?>
    <?php //echo $form->field($model, 'additional_final_diagnosis') ?>
    <?php  echo $form->field($model, 'disdate') ?>
    <?php // echo $form->field($model, 'remarks') ?>
    <?php // echo $form->field($model, 'created_date') ?>
    <?php // echo $form->field($model, 'created_by') ?>
    <?php // echo $form->field($model, 'is_active') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
