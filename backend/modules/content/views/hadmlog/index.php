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
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    /*
                    [
                        'label'=>'Department',
                        'format'=>'text',
                        'value' => function($model)
                        {          
                            $modeldepartment = Hpatroom::find()
                            ->where(['enccode' =>  $model->enccode])
                            ->one();                
                            if($modeldepartment->wardcode == 'OPD')
                            {
                                return 'OPD';
                            }
                            
                            else 
                            {
                                if($model->tscode0->tsdesc == 'PEDIATRICS')
                                {
                                    $modeldepartment = Hpatroom::find()
                                    ->where(['enccode' =>  $model->enccode])
                                    //->andWhere(['primediag' =>  'Y'])
                                    ->one();
                                    
                                    if($modeldepartment->wardcode == 'NWBRN')
                                    {
                                        return 'NEW BORN';
                                    }
                                    
                                    else
                                    {
                                        return $model->tscode0->tsdesc;
                                    }
                                    
                                }
                                else
                                {
                                    return $model->tscode0->tsdesc;
                                }
                            }
                            
                    },
                    ],
                    */
                    [
                        'label'=>'Patient Name',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  PatiendetailsController::Fullname($model->hpercode);
                        },
                    ],
                    
                    
                    [
                        'label'=>'Sex',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  $model->hpercode0->patsex;
                        },
                    ],
                    /*
                    [
                        'label'=>'Address',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                              return PatiendetailsController::Address($model->hpercode);
                        },
                    ],
                    */
                    [
                        'label'=>'Birth Date',
                        'contentOptions' => [
                            'style' => ['width' => '100px;']
                        ],
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  substr($model->hpercode0->patbdate,0,10);
                        },
                    ],
                    
                    [
                        'label'=>'Age',
                        'contentOptions' => [
                            'style' => ['width' => '65px;']
                        ],
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return PatiendetailsController::Age($model->enccode);
                        },
                    ],
                    

                    
                    [
                        'label'=>'Contact #',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return PatiendetailsController::Contact($model->hpercode);
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
                            return date('m/d/Y h:i:s a', strtotime($model->admdate));
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
                    
                    [
                        'label'=>'Status',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            if($model->tscode == 'S0000')
                            {
                                return "Not yet admitted";
                            }
                            else 
                            {
                                return "Admitted";
                            }
                        },
                    ],
                    
                  
                    
                ['class' => 'yii\grid\ActionColumn', 'template'=>'{print} <br> {clinical} <br> {laboratory} <br> {otherlaboratory} <br> {radiologyrequest} <br> {tag} <br> {surgical} <br> {cf4} <br> {newborninformation}',
                  //      ['class' => 'yii\grid\ActionColumn', 'template' => '{print} <br> {tag} <br> {surgical} <br> {cf4} <br> {newborninformation}',
                'buttons'=>[
        
                            'print' => function($url, $model){
                                    return Html::a(Yii::t('app', 'Chart'),
                                    ['print',
                                    'hpercode' =>$model->hpercode,
                                    'enccode' =>$model->enccode,
                                    'clerk' => $model->admclerk0->firstname.' '.$model->admclerk0->lastname,
                                        'adddatetime' => date('m/d/Y h:i:s a', strtotime($model->admdate)),
                                        'patage' => intval($model->patage).' yr/s',
                                    ]
                                );
                            },
                            
                                'clinical' => function($url, $model){
                                    return Html::a(Yii::t('app','Clinical Chem Request'),
                                    ['clinical',
                                    'hpercode' =>$model->hpercode,
                                        'enccode' =>$model->enccode,
                                    'clerk' => $model->admclerk0->firstname.' '.$model->admclerk0->lastname,
                                    'adddatetime' => date('m/d/Y h:i:s a', strtotime($model->admdate)),
                                    'patage' => intval($model->patage).' yr/s',
                                    ]
                                );
                            },

                            'laboratory' => function($url, $model){
                                return Html::a(Yii::t('app', 'Laboratory'),
                                ['laboratory',
                                'hpercode' =>$model->hpercode,
                                    'enccode' =>$model->enccode,
                                'clerk' => $model->admclerk0->firstname.' '.$model->admclerk0->lastname,
                                'adddatetime' => date('m/d/Y h:i:s a', strtotime($model->admdate)),
                                'patage' => intval($model->patage).' yr/s',
                                ]
                            );
                            },
                            'otherlaboratory' => function($url, $model){
                                return Html::a(Yii::t('app', 'Other Laboratory'),
                                ['otherlaboratory',
                                'hpercode' =>$model->hpercode,
                                    'enccode' =>$model->enccode,
                                'clerk' => $model->admclerk0->firstname.' '.$model->admclerk0->lastname,
                                'adddatetime' => date('m/d/Y h:i:s a', strtotime($model->admdate)),
                                'patage' => intval($model->patage).' yr/s',
                                ]
                            );
                            },
                            'radiologyrequest' => function($url, $model){
                                return Html::a(Yii::t('app', 'Radiology Request'),
                                ['radiologyrequest',
                                'hpercode' =>$model->hpercode,
                                    'enccode' =>$model->enccode,
                                'clerk' => $model->admclerk0->firstname.' '.$model->admclerk0->lastname,
                                'adddatetime' => date('m/d/Y h:i:s a', strtotime($model->admdate)),
                                'patage' => intval($model->patage).' yr/s',
                                ]
                            );
                            },
                            
                            'tag' => function($url, $model){
                                return Html::a(Yii::t('app', 'Tag'),
                                ['tag',
                                'hpercode' =>$model->hpercode,
                                    'enccode' =>$model->enccode,
                                'clerk' => $model->admclerk0->firstname.' '.$model->admclerk0->lastname,
                                'adddatetime' => date('m/d/Y h:i:s a', strtotime($model->admdate)),
                                'patage' => intval($model->patage).' yr/s',
                                ]
                            );
                            },




                            'surgical' => function($url, $model){
                                return Html::a(Yii::t('app', 'Surgical'),
                                ['surgical',
                                'hpercode' =>$model->hpercode,
                                    'enccode' =>$model->enccode,
                                'clerk' => $model->admclerk0->firstname.' '.$model->admclerk0->lastname,
                                'adddatetime' => date('m/d/Y h:i:s a', strtotime($model->admdate)),
                                'patage' => intval($model->patage).' yr/s',
                                ]
                            );
                            },




                            'cf4' => function($url, $model){
                            return Html::a(Yii::t('app', 'Cf4'),
                                ['cf4',
                                'hpercode' =>$model->hpercode,
                                    'enccode' =>$model->enccode,
                                'clerk' => $model->admclerk0->firstname.' '.$model->admclerk0->lastname,
                                'adddatetime' => date('m/d/Y h:i:s a', strtotime($model->admdate)),
                                'patage' => intval($model->patage).' yr/s',
                                ]
                            );
                            },




                            'newborninformation' => function($url, $model){
                            return Html::a(Yii::t('app', 'New born Papers'),
                                ['newborninformation',
                                'hpercode' =>$model->hpercode,
                                    'enccode' =>$model->enccode,
                                'clerk' => $model->admclerk0->firstname.' '.$model->admclerk0->lastname,
                                'adddatetime' => date('m/d/Y h:i:s a', strtotime($model->admdate)),
                                'patage' => intval($model->patage).' yr/s',
                                ]
                                );
                            },


                     ] 
                ]
                

                
                    


                    

                ],

            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
