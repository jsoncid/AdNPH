<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var backend\modules\records\models\PhoRecordsEncodingSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Pho Records Encodings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-records-encoding-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Create Pho Records Encoding', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
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

                    're_id',
                    'enccode:ntext',
                    'hospital_num:ntext',
                    'final_diagnosis:ntext',
                    'additional_final_diagnosis:ntext',
                    // 'disdate',
                    // 'remarks:ntext',
                    // 'created_date',
                    // 'created_by',
                    // 'is_active',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
