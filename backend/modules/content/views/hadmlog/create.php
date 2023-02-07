<?php

/**
 * @var yii\web\View $this
 * @var common\models\Hadmlog $model
 */

$this->title = 'Create Hadmlog';
$this->params['breadcrumbs'][] = ['label' => 'Hadmlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hadmlog-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
