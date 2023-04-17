<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Hperson $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="hperson-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'hpatkey')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hfhudcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hpercode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hpatcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'upicode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hhcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'relhhhead')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'resarrange')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hspocode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hspoupi')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'upistcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patlast')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patfirst')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patmiddle')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patsuffix')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patprefix')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patdegree')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patalias')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patmaidnm')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patbdate')->textInput() ?>
                <?php echo $form->field($model, 'patbplace')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patsex')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patcstat')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patempstat')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'citcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'natcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'relcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hfatcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hfatupi')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hmotcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hmotupi')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patmmdn')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'phicnum')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patmedno')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patemernme')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patemaddr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'pattelno')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'relemacode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'f_dec')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patstat')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'patlock')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'datemod')->textInput() ?>
                <?php echo $form->field($model, 'updsw')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'confdl')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fm_dec')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'bldcode')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'entryby')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fatlast')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fatfirst')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fatmid')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'motlast')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'motfirst')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'motmid')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'splast')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'spfirst')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'spmid')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fataddr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'motaddr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'spaddr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fatsuffix')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'motsuffix')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'spsuffix')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fatempname')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fatempaddr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fatempeml')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fatemptel')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'motempname')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'motempaddr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'motempeml')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'motemptel')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'spempname')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'spempaddr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'spempeml')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'spemptel')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'fattel')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'mottel')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'mssno')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'srcitizen')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'picname')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 's_dec')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hospperson')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'hsmokingcs')->textInput(['maxlength' => true]) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
