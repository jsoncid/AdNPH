<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Hpatroom;
use common\models\UserProfile;
use common\models\PhoTransmittalDetails;
use common\models\Hadmlog;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pho Transmittals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-transmittal-index">

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Pho Transmittal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            

            
            
            [
                'label'=>'Patient Name',
                
                'format'=>'text',
                'value' => function($model)
                {
                    //return $model->hadmlog->hpercode0->patlast;
                    
                    $modeladmlog = Hadmlog::find()
                    ->where(['enccode' =>  $model->enccode])
                    ->one();
                    
                    return  $modeladmlog->hpercode0->patlast.' '.$modeladmlog->hpercode0->patsuffix.', '.$modeladmlog->hpercode0->patfirst.' '.$modeladmlog->hpercode0->patmiddle;
                },
            ],
            
            [
                'label'=>'Admission Date',
                'format'=>'text',
                'value' => function($model)
                {
                    $modeladmlog = Hadmlog::find()
                    ->where(['enccode' =>  $model->enccode])
                    ->one();
                    return  substr($modeladmlog->admdate,0,10);
                },
            ],
            
            [
                'label'=>'Discharge Date',
                'format'=>'text',
                'value' => function($model)
                {
                    $modeladmlog = Hadmlog::find()
                    ->where(['enccode' =>  $model->enccode])
                    ->one();
                    return  substr($modeladmlog->disdate,0,10);
                },
            ],
            
            
            
            
        ],
    ]); ?>

   

</div>
