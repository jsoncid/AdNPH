<?php

/**
 * @var yii\web\View $this
 * @var common\models\Hdocord $model
 */

$this->title = 'Create Hdocord';
$this->params['breadcrumbs'][] = ['label' => 'Hdocords', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hdocord-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
