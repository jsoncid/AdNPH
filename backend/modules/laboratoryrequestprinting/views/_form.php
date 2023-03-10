<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Hdocord $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="hdocord-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'docointkey')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'enccode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'dodate')->textInput() ?>
                <?php echo $form->field($model, 'dotime')->textInput() ?>
                <?php echo $form->field($model, 'licno')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'ordcon')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'orcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hpercode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'upicode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'dopriority')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'dodtepost')->textInput() ?>
                <?php echo $form->field($model, 'dotmepost')->textInput() ?>
                <?php echo $form->field($model, 'dostat')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'dolock')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'datemod')->textInput() ?>
                <?php echo $form->field($model, 'updsw')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'confdl')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'donotes')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'entby')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'verby')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'ordreas')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'doctype')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'orderupd')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'intkeyref')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'proccode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'orstat')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'statdate')->textInput() ?>
                <?php echo $form->field($model, 'stattime')->textInput() ?>
                <?php echo $form->field($model, 'pchrgup')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'uomcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'pcchrgcod')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'pchrgqty')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'pcchrgamt')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'pcdisch')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'acctno')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'estatus')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'ordsrc')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'prikey')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'entryby')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'opergrp')->textInput() ?>
                <?php echo $form->field($model, 'incision_mode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'dietcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'compense')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'rfee1')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'rfee2')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'rfee3')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'rem1')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'disamt')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'discbal')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'phicamt')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'chrgtype')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'coldte')->textInput() ?>
                <?php echo $form->field($model, 'lbno')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'recdte')->textInput() ?>
                <?php echo $form->field($model, 'resdte')->textInput() ?>
                <?php echo $form->field($model, 'reldte')->textInput() ?>
                <?php echo $form->field($model, 'paystat')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'csamt')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'ncamt')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'paidamt')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'bdate')->textInput() ?>
                <?php echo $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'apprv')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'apprvby')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'apprvdte')->textInput() ?>
                <?php echo $form->field($model, 'apprvrmrks')->textInput(['maxlength' => true]) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
