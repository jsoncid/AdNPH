<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Hperson $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="hperson-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'hpatkey') ?>
    <?php echo $form->field($model, 'hfhudcode') ?>
    <?php echo $form->field($model, 'hpercode') ?>
    <?php echo $form->field($model, 'hpatcode') ?>
    <?php echo $form->field($model, 'upicode') ?>
    <?php // echo $form->field($model, 'hhcode') ?>
    <?php // echo $form->field($model, 'relhhhead') ?>
    <?php // echo $form->field($model, 'resarrange') ?>
    <?php // echo $form->field($model, 'hspocode') ?>
    <?php // echo $form->field($model, 'hspoupi') ?>
    <?php // echo $form->field($model, 'upistcode') ?>
    <?php // echo $form->field($model, 'patlast') ?>
    <?php // echo $form->field($model, 'patfirst') ?>
    <?php // echo $form->field($model, 'patmiddle') ?>
    <?php // echo $form->field($model, 'patsuffix') ?>
    <?php // echo $form->field($model, 'patprefix') ?>
    <?php // echo $form->field($model, 'patdegree') ?>
    <?php // echo $form->field($model, 'patalias') ?>
    <?php // echo $form->field($model, 'patmaidnm') ?>
    <?php // echo $form->field($model, 'patbdate') ?>
    <?php // echo $form->field($model, 'patbplace') ?>
    <?php // echo $form->field($model, 'patsex') ?>
    <?php // echo $form->field($model, 'patcstat') ?>
    <?php // echo $form->field($model, 'patempstat') ?>
    <?php // echo $form->field($model, 'citcode') ?>
    <?php // echo $form->field($model, 'natcode') ?>
    <?php // echo $form->field($model, 'relcode') ?>
    <?php // echo $form->field($model, 'hfatcode') ?>
    <?php // echo $form->field($model, 'hfatupi') ?>
    <?php // echo $form->field($model, 'hmotcode') ?>
    <?php // echo $form->field($model, 'hmotupi') ?>
    <?php // echo $form->field($model, 'patmmdn') ?>
    <?php // echo $form->field($model, 'phicnum') ?>
    <?php // echo $form->field($model, 'patmedno') ?>
    <?php // echo $form->field($model, 'patemernme') ?>
    <?php // echo $form->field($model, 'patemaddr') ?>
    <?php // echo $form->field($model, 'pattelno') ?>
    <?php // echo $form->field($model, 'relemacode') ?>
    <?php // echo $form->field($model, 'f_dec') ?>
    <?php // echo $form->field($model, 'patstat') ?>
    <?php // echo $form->field($model, 'patlock') ?>
    <?php // echo $form->field($model, 'datemod') ?>
    <?php // echo $form->field($model, 'updsw') ?>
    <?php // echo $form->field($model, 'confdl') ?>
    <?php // echo $form->field($model, 'fm_dec') ?>
    <?php // echo $form->field($model, 'bldcode') ?>
    <?php // echo $form->field($model, 'entryby') ?>
    <?php // echo $form->field($model, 'fatlast') ?>
    <?php // echo $form->field($model, 'fatfirst') ?>
    <?php // echo $form->field($model, 'fatmid') ?>
    <?php // echo $form->field($model, 'motlast') ?>
    <?php // echo $form->field($model, 'motfirst') ?>
    <?php // echo $form->field($model, 'motmid') ?>
    <?php // echo $form->field($model, 'splast') ?>
    <?php // echo $form->field($model, 'spfirst') ?>
    <?php // echo $form->field($model, 'spmid') ?>
    <?php // echo $form->field($model, 'fataddr') ?>
    <?php // echo $form->field($model, 'motaddr') ?>
    <?php // echo $form->field($model, 'spaddr') ?>
    <?php // echo $form->field($model, 'fatsuffix') ?>
    <?php // echo $form->field($model, 'motsuffix') ?>
    <?php // echo $form->field($model, 'spsuffix') ?>
    <?php // echo $form->field($model, 'fatempname') ?>
    <?php // echo $form->field($model, 'fatempaddr') ?>
    <?php // echo $form->field($model, 'fatempeml') ?>
    <?php // echo $form->field($model, 'fatemptel') ?>
    <?php // echo $form->field($model, 'motempname') ?>
    <?php // echo $form->field($model, 'motempaddr') ?>
    <?php // echo $form->field($model, 'motempeml') ?>
    <?php // echo $form->field($model, 'motemptel') ?>
    <?php // echo $form->field($model, 'spempname') ?>
    <?php // echo $form->field($model, 'spempaddr') ?>
    <?php // echo $form->field($model, 'spempeml') ?>
    <?php // echo $form->field($model, 'spemptel') ?>
    <?php // echo $form->field($model, 'fattel') ?>
    <?php // echo $form->field($model, 'mottel') ?>
    <?php // echo $form->field($model, 'mssno') ?>
    <?php // echo $form->field($model, 'srcitizen') ?>
    <?php // echo $form->field($model, 'picname') ?>
    <?php // echo $form->field($model, 's_dec') ?>
    <?php // echo $form->field($model, 'hospperson') ?>
    <?php // echo $form->field($model, 'hsmokingcs') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
