<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var backend\models\LibrarySearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Libraries';
$this->params['breadcrumbs'][] = $this->title;
$this->params['df'][] = $this->title;
?>
<div class="library-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Create Library', ['create'], ['class' => 'btn btn-success']) ?>
            <?php echo Html::a('Export PDF', ['pdf'], ['class' => 'btn btn-danger']) ?>
            <?php echo Html::a('PDF Clinical', ['pdf'], ['class' => 'btn btn-danger']) ?>
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

                    'Book_ID',
                    'Book_name',
                    'Book_Descrip',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
