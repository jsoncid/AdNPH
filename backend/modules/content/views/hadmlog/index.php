<?php

use yii\helpers\Html;
use yii\grid\GridView;


use common\models\Haddr;
use common\models\Hbrgy;
use common\models\Hcity;
use common\models\Hpatroom;
use common\models\Hprov;
use common\models\Htelep;

/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\HadmlogSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Admission Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
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

                    [
                        'label'=>'Patient Name',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  $model->hpercode0->patlast.' '.$model->hpercode0->patsuffix.', '.$model->hpercode0->patfirst.' '.$model->hpercode0->patmiddle;
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
                  
                    [
                        'label'=>'Address',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {

                            $modeladdr = Haddr::find()
                            ->where(['hpercode' =>  $model->hpercode])
                            ->one();
                            
                            
                            
                            $modelbrg = Hbrgy::find()
                            ->where(['bgycode' =>  $modeladdr->brg])
                            ->one();
                            
                            $modelcitymun = Hcity::find()
                            ->where(['ctycode' =>  $modeladdr->ctycode])
                            ->one();
                            
                            $modelprov = Hprov::find()
                            ->where(['provcode' =>  $modeladdr->provcode])
                            ->one();
                            
                            if($modelbrg != NULL)
                            {
                                return $modeladdr->patstr.', '.$modelbrg->bgyname.', '.$modelcitymun->ctyname.', '.$modelprov->provname;
                            }
                            
                            else 
                            {
                                return $modeladdr->patstr.', '.$modelcitymun->ctyname.', '.$modelprov->provname;
                            }
                            
                        },
                    ],
                    
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
                            if(intval($model->patage)>0)
                            {
                                return intval($model->patage).' yr/s';
                            }
                            
                            else if (intval($model->patagemo)>0)
                            {
                                return intval($model->patagemo).' mo/s';
                            }
                            
                            else if (intval($model->patagedy)>0)
                            {
                                return intval($model->patagedy).' day/s';
                            }
                            
                            else 
                            {
                                return intval($model->patagehr).' hr/s old';
                            }
                            
                            //return  intval($model->patage).' year/s, '.intval($model->patagemo).' month/s, '.intval($model->patagedy).' day/s, '.intval($model->patagehr).' hr/s';
                        },
                    ],
                    

                    /*
                    [
                        'label'=>'Contact #',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            $modelcontact = Htelep::find()
                            ->where(['hpercode' =>  $model->hpercode])
                            ->one();
                            
                            
                            
                            if($modelcontact != NULL)
                            {
                                return $modelcontact->pattel;
                            }
                            
                            else
                            {
                                return "None";
                            }
                        },
                    ],
                    */
                    
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
                'buttons'=>[
        
                            'print' => function($url, $model){
                                    return Html::a(Yii::t('app', 'Chart'),
                                    ['print',
                                    'hpercode' =>$model->hpercode,
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
