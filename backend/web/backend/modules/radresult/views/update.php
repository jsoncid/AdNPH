<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhoRadResult $model
 */

$this->title = 'Update Pho Rad Result: ' . ' ' . $model->rf_id;
$this->params['breadcrumbs'][] = ['label' => 'Pho Rad Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rf_id, 'url' => ['view', 'rf_id' => $model->rf_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pho-rad-result-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
