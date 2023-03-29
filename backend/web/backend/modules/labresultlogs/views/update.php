<?php

/**
 * @var yii\web\View $this
 * @var common\models\Pholabresultlogs $model
 */

$this->title = 'Update Pholabresultlogs: ' . ' ' . $model->rf_id_logs;
$this->params['breadcrumbs'][] = ['label' => 'Pholabresultlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rf_id_logs, 'url' => ['view', 'rf_id_logs' => $model->rf_id_logs]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pholabresultlogs-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
