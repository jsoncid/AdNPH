<?php

/**
 * @var yii\web\View $this
 * @var backend\models\Library $model
 */

$this->title = 'Update Library: ' . ' ' . $model->Book_ID;
$this->params['breadcrumbs'][] = ['label' => 'Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Book_ID, 'url' => ['view', 'Book_ID' => $model->Book_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
