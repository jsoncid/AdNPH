<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\PhoRadResult $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="pho-rad-result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'rf_id') ?>
    <?php echo $form->field($model, 'date') ?>
    <?php echo $form->field($model, 'added_by') ?>
    <?php echo $form->field($model, 'rt_id') ?>
    <?php echo $form->field($model, 'enccode') ?>
    <?php // echo $form->field($model, 'remarks') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
