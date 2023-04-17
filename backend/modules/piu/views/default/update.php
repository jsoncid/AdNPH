<?php

/**
 * @var yii\web\View $this
 * @var common\models\Hperson $model
 */

$this->title = 'Update Hperson: ' . ' ' . $model->hpercode;
$this->params['breadcrumbs'][] = ['label' => 'Hpeople', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hpercode, 'url' => ['view', 'hpercode' => $model->hpercode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hperson-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
