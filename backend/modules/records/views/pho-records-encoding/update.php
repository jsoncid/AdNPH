<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsEncoding $model
 */

$this->title = 'Update Pho Records Encoding: ' . ' ' . $model->re_id;
$this->params['breadcrumbs'][] = ['label' => 'Pho Records Encodings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->re_id, 'url' => ['view', 're_id' => $model->re_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pho-records-encoding-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
