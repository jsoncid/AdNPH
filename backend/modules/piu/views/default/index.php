<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var backend\modules\piu\models\HpersonSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Patients Information';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hperson-index">
    <div class="card">
        <div class="card-header">
            <?php //echo Html::a('Create Hperson', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                   
                    'hpercode',
                   
                     'patlast',
                     'patfirst',
                     'patmiddle',
                     'patsuffix',
                     'patprefix',
                    
                    
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',
                        'buttons'=>[
                            
                            'view' => function($url, $model){
                            return Html::a(Yii::t('app', 'Validate'),
                                ['view',
                                    'hpercode' =>$model->hpercode,
                                ]
                                );
                            },
                            
                            
                            
                            
                            ],
                           ]
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
