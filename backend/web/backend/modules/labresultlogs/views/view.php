<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Pholabresultlogs $model
 */

$this->title = $model->rf_id_logs;
$this->params['breadcrumbs'][] = ['label' => 'Pholabresultlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pholabresultlogs-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 'rf_id_logs' => $model->rf_id_logs], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'rf_id_logs' => $model->rf_id_logs], [
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
                    'rf_id_logs',
                    'rf_id',
                    'update_by',
                    'update_on',
                    'remarks',
                    'enccode',
                    'action',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
