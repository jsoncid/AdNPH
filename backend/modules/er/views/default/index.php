<?php

use yii\helpers\Html;
use yii\grid\GridView;


use common\models\Haddr;
use common\models\Hbrgy;
use common\models\Hcity;
use common\models\Hpatroom;
use common\models\Hprov;
use common\models\Htelep;
use common\controllers\PatiendetailsController;
use common\controllers\ValidateController;

/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\HadmlogSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Admission Logs';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4>Error</h4>
         <?= Yii::$app->session->getFlash('error') ?>
         <?php Yii::$app->session->remove('error');?>
    </div>
<?php endif; ?>


<div class="hadmlog-index">
    <div class="card">


        <div class="card-body p-0">
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    
                    
                    [
                        'label'=>'Health Record No.',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  $model->hpercode;
                    },
                    ],
                    [
                        'label'=>'Patient Name',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  PatiendetailsController::Fullname($model->hpercode);
                        },
                    ],
                    
                    
                    [
                        'label'=>'Admission Date & Time',
                        
                        'contentOptions' => [
                            'style' => ['width' => '100px;']
                        ],
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            //return date('m/d/Y h:i:s a', strtotime($model->admdate));
                            return $model->admdate;
                        },
                    ],
                    
                    [
                        'label'=>'Admitting Clerk',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  $model->admclerk0->firstname.' '.$model->admclerk0->lastname;
                        },
                    ],
                    
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',
                        'buttons'=>[
                            
                            'view' => function($url, $model){
                            return Html::a(Yii::t('app', 'Validate'),
                                ['view',
                                    //'hpercode' =>$model->hpercode,
                                    'enccode' =>$model->enccode,
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
