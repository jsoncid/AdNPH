<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\UserProfile;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forward Chart Transmittal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-transmittal-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Pho Transmittal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label'=>'Transmittal ID',
                'format'=>'text',
                'value' => function($model)
                {
                    return  $model->tid;
                    
            },
            ],
            //'created_by',
            [
                'label'=>'Transmitted By',
                'format'=>'text',
                'value' => function($model)
                {
                    $modeluserprofile = UserProfile::find()
                    ->where(['user_id' =>  $model->created_by])
                    //->andWhere(['primediag' =>  'Y'])
                    ->one();
                    
                    return  $modeluserprofile->firstname." ".$modeluserprofile->middlename." ".$modeluserprofile->lastname; 
                    
                },
            ],
            'created_date',
            'transmit_to',
            [
                'label'=>'Received By',
                'format'=>'text',
                'value' => function($model)
                {
                    $modeluserprofile = UserProfile::find()
                    ->where(['user_id' =>  $model->received_by])
                    //->andWhere(['primediag' =>  'Y'])
                    ->one();
                    
                    if($model->is_received == 1)
                    {
                       
                        return  $modeluserprofile->firstname." ".$modeluserprofile->middlename." ".$modeluserprofile->lastname;
                        
                    }
                    else
                    {
                        return "-";
                    }
                },
            ],
            'received_date',

            ['class' => 'yii\grid\ActionColumn','template' => '{update} {delete} {printtransmittal}',
                        'buttons'=>[
                            
                                    'printtransmittal' => function ($url, $model) {
                                            return Html::a('<span class="fa fa-print"></span>', $url, [
                                                'title' => Yii::t('yii', 'Print'),
                                            ]);
                                    },
                            
                            
                                    'update' => function ($url, $model) {
                                        if($model->is_received == 0)
                                        {
                                            return Html::a('<span class="fa fa-edit"></span>', $url, [
                                                'title' => Yii::t('yii', 'Update'),
                                            ]);
                                        }
                                        else {return null;}   
                                    },
                                
                                    'delete' => function ($url, $model) {
                                    if($model->is_received == 0)
                                    {
                                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                                            'title' => Yii::t('yii', 'Delete'),
                                        ]);
                                    }
                                    else {return null;}
                                    },
                            ]
            ],
        ],
    ]); ?>

</div>
