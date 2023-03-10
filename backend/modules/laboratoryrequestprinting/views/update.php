<?php

/**
 * @var yii\web\View $this
 * @var common\models\Hdocord $model
 */

$this->title = 'Update Hdocord: ' . ' ' . $model->docointkey;
$this->params['breadcrumbs'][] = ['label' => 'Hdocords', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->docointkey, 'url' => ['view', 'docointkey' => $model->docointkey]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hdocord-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
