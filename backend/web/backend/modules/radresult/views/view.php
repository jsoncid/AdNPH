<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\PhoRadResult $model
 */

$this->title = $model->rf_id;
$this->params['breadcrumbs'][] = ['label' => 'Pho Rad Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-rad-result-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 'rf_id' => $model->rf_id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'rf_id' => $model->rf_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'rf_id',
                    'date',
                    'added_by',
                    'rt_id',
                    'enccode',
                    'remarks:ntext',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
