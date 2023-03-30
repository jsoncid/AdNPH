<?php

/**
 * @var yii\web\View $this
 * @var common\models\Pholabresultlogs $model
 */

$this->title = 'Create Pholabresultlogs';
$this->params['breadcrumbs'][] = ['label' => 'Pholabresultlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pholabresultlogs-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
