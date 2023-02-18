<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\rbac\models\RbacAuthItem;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use common\models\Hadmlog;

/* @var $this yii\web\View */
/* @var $model common\models\PhoTransmittal */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="pho-transmittal-form">

    <?php $form = ActiveForm::begin(); ?>
    
    
    <?php echo Html::button('Add Chart', ['value' => Url::to('../pho-transmittal-details-temp/create'),'class'=>'btn btn-success','id'=>'modalButtonAddChart']) ?>
    <?php 
        
        Modal::begin([
                        'title'=>'Add Chart',
                        'id' => 'modalAddChart',
                        'size'=>'modal-lg'
                    ]);
        
        echo "<div id = 'modalContentAddChart'></div>";
        
        Modal::end()
        
    ?>
    
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'datetime',
            //'user',
            [
                'label'=>'Patient Name',
                //'attribute'=>'enccode',
                'format'=>'text',
                'value' => function($model)
                {
                    $modelpatient = Hadmlog::find()
                    ->where(['enccode' =>  $model->enccode])
                    //->andWhere(['primediag' =>  'Y'])
                    ->one();
                    
                    return  $modelpatient->hpercode0->patlast.' '.$modelpatient->hpercode0->patsuffix.', '.$modelpatient->hpercode0->patfirst.' '.$modelpatient->hpercode0->patmiddle;
                    
            },
            ],
            
            [
                'label'=>'Lenght of Stay',
                'format'=>'text',
                'value' => function($model)
                {
                    $modelpatient = Hadmlog::find()
                    ->where(['enccode' =>  $model->enccode])
                    //->andWhere(['primediag' =>  'Y'])
                    ->one();
                    
                    $from = date('m/d/Y h:i:s a', strtotime($modelpatient->admdate));
                    $to = date('m/d/Y h:i:s a', strtotime($modelpatient->disdate));
                    
                    $datetime1 = date_create($modelpatient->admdate);
                    $datetime2 = date_create($modelpatient->disdate);
                    
                    $interval = date_diff($datetime1, $datetime2);
                    
                    $duration = $from." to " .$to." (".$interval->format("%a day/s").")";
                    return  $duration;
                },
            ],
            
            

            ['class' => 'yii\grid\ActionColumn','template'=>'{deletetemp}',
                
                'buttons'=>[
                    'deletetemp' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => Yii::t('yii', 'Delete'),
                    ]);
                    
                    },
                 ]
                
            ],
        ],
    ]); ?>
    
    
    
    

    <?php echo $form->errorSummary($model); ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>
    
     <?php 
        $model->created_by = Yii::$app->user->id;
    ?>
	<?= $form->field($model, 'created_by')->hiddenInput()->label(false) ?>

    <?php //echo $form->field($model, 'created_date')->textInput() ?>
    
    <?php 
        $listData=ArrayHelper::map(RbacAuthItem::find()->where(['type'=>'1'])->all(),'name','name');
        
        echo $form->field($model, 'transmit_to')->dropDownList($listData, ['id' => 'sy','prompt'=>'Select...']);
    ?>
    
    <?php echo $form->field($model, 'transmit_remarks')->textInput()->label('Remarks') ?>

    <?php //echo $form->field($model, 'transmit_to')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'is_received')->textInput() ?>

    <?php //echo $form->field($model, 'received_date')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    
    
    
    
    
    

    <?php ActiveForm::end(); ?>
    

</div>
