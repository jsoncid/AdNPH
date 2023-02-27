<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsFilling $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="pho-records-filling-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'rf') ?>
    <?php echo $form->field($model, 'enccode') ?>
    <?php echo $form->field($model, 'is_received') ?>
    <?php echo $form->field($model, 'is_scanned') ?>
    <?php echo $form->field($model, 'is_forward_to_claims') ?>
    <?php // echo $form->field($model, 'received_by') ?>
    <?php // echo $form->field($model, 'scanned_by') ?>
    <?php // echo $form->field($model, 'forward_to_claims_by') ?>
    <?php // echo $form->field($model, 'update_received_by') ?>
    <?php // echo $form->field($model, 'update_scanned_by') ?>
    <?php // echo $form->field($model, 'update_forward_to_claims_by') ?>
    <?php // echo $form->field($model, 'date_received_by') ?>
    <?php // echo $form->field($model, 'date_scanned_by') ?>
    <?php // echo $form->field($model, 'date_forward_to_claims') ?>
    <?php // echo $form->field($model, 'date_update_received') ?>
    <?php // echo $form->field($model, 'date_update_scanned') ?>
    <?php // echo $form->field($model, 'date_update_forward_to') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
