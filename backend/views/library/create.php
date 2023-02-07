<?php

/**
 * @var yii\web\View $this
 * @var backend\models\Library $model
 */

$this->title = 'Create Library';
$this->params['breadcrumbs'][] = ['label' => 'Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
