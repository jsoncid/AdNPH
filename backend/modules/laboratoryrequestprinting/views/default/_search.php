<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Hdocord $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="hdocord-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'docointkey') ?>
    <?php echo $form->field($model, 'enccode') ?>
    <?php echo $form->field($model, 'dodate') ?>
    <?php echo $form->field($model, 'dotime') ?>
    <?php echo $form->field($model, 'licno') ?>
    <?php // echo $form->field($model, 'ordcon') ?>
    <?php // echo $form->field($model, 'orcode') ?>
    <?php // echo $form->field($model, 'hpercode') ?>
    <?php // echo $form->field($model, 'upicode') ?>
    <?php // echo $form->field($model, 'dopriority') ?>
    <?php // echo $form->field($model, 'dodtepost') ?>
    <?php // echo $form->field($model, 'dotmepost') ?>
    <?php // echo $form->field($model, 'dostat') ?>
    <?php // echo $form->field($model, 'dolock') ?>
    <?php // echo $form->field($model, 'datemod') ?>
    <?php // echo $form->field($model, 'updsw') ?>
    <?php // echo $form->field($model, 'confdl') ?>
    <?php // echo $form->field($model, 'donotes') ?>
    <?php // echo $form->field($model, 'entby') ?>
    <?php // echo $form->field($model, 'verby') ?>
    <?php // echo $form->field($model, 'ordreas') ?>
    <?php // echo $form->field($model, 'doctype') ?>
    <?php // echo $form->field($model, 'orderupd') ?>
    <?php // echo $form->field($model, 'intkeyref') ?>
    <?php // echo $form->field($model, 'proccode') ?>
    <?php // echo $form->field($model, 'orstat') ?>
    <?php // echo $form->field($model, 'statdate') ?>
    <?php // echo $form->field($model, 'stattime') ?>
    <?php // echo $form->field($model, 'pchrgup') ?>
    <?php // echo $form->field($model, 'currency') ?>
    <?php // echo $form->field($model, 'uomcode') ?>
    <?php // echo $form->field($model, 'pcchrgcod') ?>
    <?php // echo $form->field($model, 'pchrgqty') ?>
    <?php // echo $form->field($model, 'pcchrgamt') ?>
    <?php // echo $form->field($model, 'pcdisch') ?>
    <?php // echo $form->field($model, 'acctno') ?>
    <?php // echo $form->field($model, 'estatus') ?>
    <?php // echo $form->field($model, 'ordsrc') ?>
    <?php // echo $form->field($model, 'prikey') ?>
    <?php // echo $form->field($model, 'entryby') ?>
    <?php // echo $form->field($model, 'opergrp') ?>
    <?php // echo $form->field($model, 'incision_mode') ?>
    <?php // echo $form->field($model, 'dietcode') ?>
    <?php // echo $form->field($model, 'compense') ?>
    <?php // echo $form->field($model, 'rfee1') ?>
    <?php // echo $form->field($model, 'rfee2') ?>
    <?php // echo $form->field($model, 'rfee3') ?>
    <?php // echo $form->field($model, 'rem1') ?>
    <?php // echo $form->field($model, 'discount') ?>
    <?php // echo $form->field($model, 'disamt') ?>
    <?php // echo $form->field($model, 'discbal') ?>
    <?php // echo $form->field($model, 'phicamt') ?>
    <?php // echo $form->field($model, 'chrgtype') ?>
    <?php // echo $form->field($model, 'coldte') ?>
    <?php // echo $form->field($model, 'lbno') ?>
    <?php // echo $form->field($model, 'recdte') ?>
    <?php // echo $form->field($model, 'resdte') ?>
    <?php // echo $form->field($model, 'reldte') ?>
    <?php // echo $form->field($model, 'paystat') ?>
    <?php // echo $form->field($model, 'csamt') ?>
    <?php // echo $form->field($model, 'ncamt') ?>
    <?php // echo $form->field($model, 'paidamt') ?>
    <?php // echo $form->field($model, 'bdate') ?>
    <?php // echo $form->field($model, 'gender') ?>
    <?php // echo $form->field($model, 'apprv') ?>
    <?php // echo $form->field($model, 'apprvby') ?>
    <?php // echo $form->field($model, 'apprvdte') ?>
    <?php // echo $form->field($model, 'apprvrmrks') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
