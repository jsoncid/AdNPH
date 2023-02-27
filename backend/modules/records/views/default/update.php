<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsFilling $model
 */

$this->title = 'Update Pho Records Filling: ' . ' ' . $model->rf;
$this->params['breadcrumbs'][] = ['label' => 'Pho Records Fillings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rf, 'url' => ['view', 'rf' => $model->rf]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pho-records-filling-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
