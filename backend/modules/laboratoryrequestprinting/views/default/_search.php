<?php

use common\models\Hdocord;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\data\ActiveDataProvider;
use common\models\Hprocm;
use kartik\select2\Select2;

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
    
    <?php 
    $listData=ArrayHelper::map(Hprocm::find()->where(['costcenter'=>'LABOR','procstat' => 'A'])->orderBy(['procdesc' => SORT_ASC,])->all(),'proccode','procdesc');
        
        
        // With a model and without ActiveForm
    echo '<label class="control-label">Type/s of Laboratory Test</label>';
        echo Select2::widget([
        'model' => $model,
        'attribute' => 'laboratorytest',
        'data' => $listData,
        
        'options' => ['placeholder' => 'Select a test ...'],
        'pluginOptions' => [
                'allowClear' => true,
                'multiple' => true
            ],
            ])
        
        ;
        
    ?>
    


    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
