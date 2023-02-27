<?php

use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\grid\GridView;
use common\models\UserProfile;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pho Transmittals';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="pho-transmittal-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Pho Transmittal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


	<?php
    Modal::begin(['id' =>'modallist']);
    Modal::end();
    ?>
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
            
            [
                'label'=>'Transmitted By',
                'format'=>'text',
                'value' => function($model)
                {
                    $modeluserprofile = UserProfile::find()
                    ->where(['user_id' =>  $model->created_by])
                    ->one();
                    
                    return  $modeluserprofile->firstname." ".$modeluserprofile->middlename." ".$modeluserprofile->lastname; 
                    
                },
            ],
            'created_date',
            'transmit_to',
               

            ['class' => 'yii\grid\ActionColumn','template' => '{received} <br> {receivedlist} ',
                'buttons'=>[
                    
                    'received' => function ($url, $model) {
                        
                        if($model->is_received == 0)
                        {
                            return Html::a('<span class="fa fa-list-alt"> Received</span>', $url, [
                                'title' => Yii::t('yii', 'Received'),
                            ]);
                        }
                        else {return null;}   
                    },
                    
                    'receivedlist' => function ($url, $model) {
                    return Html::a('<span class="fa fa-list"> List</span>', $url, [
                        'title' => Yii::t('yii', 'Received List'),
                    ]);
                    
                    
                        
                    },

                  ]
                
            ],
        ],
    ]); ?>

</div>
