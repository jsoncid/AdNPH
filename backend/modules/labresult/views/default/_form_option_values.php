<?php
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\FileInput;
use yii\web\JsExpression;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use common\models\OptionValue;
use common\models\PhoLabresult1;


/**
 * @var yii\web\View $this
 * @var common\models\PhoLabresult1 $model
 * @var common\models\OptionValue $modelsoption
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div id="panel-option-values" class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-check-square-o"></i> Laboratory Result</h3>
    </div>
  
     <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.form-options-body',
        'widgetItem' => '.form-options-item',
        'min' => 1,
        'insertButton' => '.add-item',
        'deleteButton' => '.delete-item',
         'model' => $modelsoption[0],
        'formId' => 'dynamic-form',
         
        'formFields' => [
            'name',
            'pdf'
        ],
    ]); ?>
    
    
    <table class="table table-bordered table-striped margin-b-none">
        <thead>
        <tr>
                <th style="width: 90px; text-align: center"></th>
                <th class="required">Type of Laboratory Result</th>
                <th style="width: 188px;">Pdf</th>
                <th style="width: 90px; text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody class="form-options-body">
            <?php foreach ($modelsoption as $index => $modelOptionValue): ?>
                <tr class="form-options-item">
                    <td class="sortable-handle text-center vcenter" style="cursor: move;">
                        <i class="fa fa-arrows"></i>
                    </td>
        			<td class="vcenter">
                        <?= $form->field($modelOptionValue, "[{$index}]name")->label(false)->textInput(['maxlength' => 128]); ?>
                    </td>
    				<td>
                        <?php if (!$modelOptionValue->isNewRecord): ?>
                           <?= Html::activeHiddenInput($modelOptionValue, "[{$index}]id"); ?>
    						<?= Html::activeHiddenInput($modelOptionValue, "[{$index}]pdf_id"); ?> 
                           <!--   Html::activeHiddenInput($modelOptionValue, "[{$index}]deletepdf"); ?>-->
    						    <?php endif; ?>
    					<?php
                           /* $modelPdf = Pholabresult1::findOne(['rf_id' => $modelOptionValue->rt_id]);
                            $initialPreview = [];
                            if ($modelPdf) {
                                $pathImg = Yii::$app->fileStorage->baseUrl . '/' .   $modelPdf->path;
                                $initialPreview[] = Html::a($pathImg, ['class' => 'file-preview-pdf']);
                            }*/
                        ?>
                                  
                       <?= $form->field($modelOptionValue, "[{$index}]path")->label(false)->widget(FileInput::classname(), [
                          
                            'options' => [
                                'multiple' => false,
                                'accept' => 'application/pdf',
                                'class' => 'optionvalue-pdf'
                                ],
                            'pluginOptions' => [
                                'allowedFileExtensions' => ['pdf'],
                                'previewFileType' => 'pdf',
                                'showCaption' => false,
                                'showUpload' => false,
                                'browseClass' => 'btn btn-default btn-sm',
                                'browseLabel' => ' Pick Pdf',
                                'browseIcon' => '<i class="glyphicon glyphicon-picture"></i>',
                                'removeClass' => 'btn btn-danger btn-sm',
                                'removeLabel' => ' Delete',
                                'removeIcon' => '<i class="fa fa-trash"></i>',
                                'uploadUrl' => Url::to(['@webroot/upfiles/result']),
                                'previewSettings' => [
                                    'pdf' => ['width' => '138px', 'height' => 'auto']
                                ],
                                //'initialPreview' => $initialPreview,
                                'layoutTemplates' => ['footer' => '']
                            ]
                        ]) ?>
                         </td>
                    <td class="text-center vcenter">
                        <button type="button" class="delete-item btn btn-danger btn-xs"><i class="fa fa-minus"> Remove</i></button>
                    </td>
                        </tr>          
  			<?php endforeach; ?>
  			 </tbody>
  			 <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><button type="button" class="add-item btn btn-success btn-sm"><span class="fa fa-plus"></span> New</button></td>
            </tr>
        </tfoot>
    </table>
    <?php DynamicFormWidget::end(); ?>
</div>
    <?php
$js = <<<'EOD'

$(".optionvalue-pdf").on("filecleared", function(event) {
    var regexID = /^(.+?)([-\d-]{1,})(.+)$/i;
    var id = event.target.id;
    var matches = id.match(regexID);
    if (matches && matches.length === 4) {
        var identifiers = matches[2].split("-");
        $("#optionvalue-" + identifiers[1] + "-deleteimg").val("1");
    }
});

var fixHelperSortable = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

$(".form-options-body").sortable({
    items: "tr",
    cursor: "move",
    opacity: 0.6,
    axis: "y",
    handle: ".sortable-handle",
    helper: fixHelperSortable,
    update: function(ev){
        $(".dynamicform_wrapper").yiiDynamicForm("updateContainer");
    }
}).disableSelection();


EOD;

JuiAsset::register($this);
$this->registerJs($js);
?>