<div class="records-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>

<?php

use kartik\sortable\Sortable;

// Two connected Sortable lists with custom styles.
echo Sortable::widget([
    'connected'=>true,
    'items'=>[
        ['content'=>'From Item 1'],
        ['content'=>'From Item 2'],
        ['content'=>'From Item 3'],
        ['content'=>'From Item 4'],
    ]
]);
echo Sortable::widget([
    'connected'=>true,
    'itemOptions'=>['class'=>'alert alert-warning'],
    'items'=>[
        ['content'=>'To Item 1'],
        ['content'=>'To Item 2'],
        ['content'=>'To Item 3'],
        ['content'=>'To Item 4'],
    ]
]);

?>

