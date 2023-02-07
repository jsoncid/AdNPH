<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Hadmlog $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="hadmlog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'enccode') ?>
    <?php echo $form->field($model, 'hpercode') ?>
    <?php echo $form->field($model, 'upicode') ?>
    <?php echo $form->field($model, 'casenum') ?>
    <?php echo $form->field($model, 'patage') ?>
    <?php // echo $form->field($model, 'newold') ?>
    <?php // echo $form->field($model, 'tacode') ?>
    <?php // echo $form->field($model, 'tscode') ?>
    <?php // echo $form->field($model, 'admdate') ?>
    <?php // echo $form->field($model, 'admtime') ?>
    <?php // echo $form->field($model, 'diagcode') ?>
    <?php // echo $form->field($model, 'admnotes') ?>
    <?php // echo $form->field($model, 'licno') ?>
    <?php // echo $form->field($model, 'diagfin') ?>
    <?php // echo $form->field($model, 'disnotes') ?>
    <?php // echo $form->field($model, 'admmode') ?>
    <?php // echo $form->field($model, 'admpreg') ?>
    <?php // echo $form->field($model, 'disdate') ?>
    <?php // echo $form->field($model, 'distime') ?>
    <?php // echo $form->field($model, 'dispcode') ?>
    <?php // echo $form->field($model, 'condcode') ?>
    <?php // echo $form->field($model, 'licnof') ?>
    <?php // echo $form->field($model, 'licncons') ?>
    <?php // echo $form->field($model, 'cbcode') ?>
    <?php // echo $form->field($model, 'dcspinst') ?>
    <?php // echo $form->field($model, 'admstat') ?>
    <?php // echo $form->field($model, 'admlock') ?>
    <?php // echo $form->field($model, 'datemod') ?>
    <?php // echo $form->field($model, 'updsw') ?>
    <?php // echo $form->field($model, 'confdl') ?>
    <?php // echo $form->field($model, 'admtxt') ?>
    <?php // echo $form->field($model, 'admclerk') ?>
    <?php // echo $form->field($model, 'licno2') ?>
    <?php // echo $form->field($model, 'licno3') ?>
    <?php // echo $form->field($model, 'licno4') ?>
    <?php // echo $form->field($model, 'licno5') ?>
    <?php // echo $form->field($model, 'patagemo') ?>
    <?php // echo $form->field($model, 'patagedy') ?>
    <?php // echo $form->field($model, 'patagehr') ?>
    <?php // echo $form->field($model, 'admphic') ?>
    <?php // echo $form->field($model, 'disnotice') ?>
    <?php // echo $form->field($model, 'treatment') ?>
    <?php // echo $form->field($model, 'hsepriv') ?>
    <?php // echo $form->field($model, 'licno6') ?>
    <?php // echo $form->field($model, 'licno7') ?>
    <?php // echo $form->field($model, 'licno8') ?>
    <?php // echo $form->field($model, 'licno9') ?>
    <?php // echo $form->field($model, 'licno10') ?>
    <?php // echo $form->field($model, 'itisind') ?>
    <?php // echo $form->field($model, 'entryby') ?>
    <?php // echo $form->field($model, 'pexpireddate') ?>
    <?php // echo $form->field($model, 'acis') ?>
    <?php // echo $form->field($model, 'watchid') ?>
    <?php // echo $form->field($model, 'lockby') ?>
    <?php // echo $form->field($model, 'lockdte') ?>
    <?php // echo $form->field($model, 'typadm') ?>
    <?php // echo $form->field($model, 'pho_hospital_number') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
