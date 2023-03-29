<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pho_rad_option_value".
 *
 * @property int $id
 * @property int $rf_id
 * @property string $name
 * @property int $sort_order
 * @property string $path
 * @property int $pdf_id
 *
 * @property PhoRadResult $rf
 */
class PhoRadOptionValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_rad_option_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rf_id', 'sort_order', 'pdf_id'], 'required'],
            [['rf_id', 'sort_order', 'pdf_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['path'], 'string', 'max' => 1024],
            [['rf_id'], 'exist', 'skipOnError' => true, 'targetClass' => PhoRadResult::class, 'targetAttribute' => ['rf_id' => 'rf_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rf_id' => 'Rf ID',
            'name' => 'Name',
            'sort_order' => 'Sort Order',
            'path' => 'Path',
            'pdf_id' => 'Pdf ID',
        ];
    }

    /**
     * Gets query for [[Rf]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoRadResult()
    {
        return $this->hasOne(PhoRadResult::class, ['rf_id' => 'rf_id']);
    }
    
    
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass();
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        
        $models   = [];
        
        if ($post && is_array($post)) {
            foreach ($post as $i => $modelsoption) {
                if (isset($modelsoption['id']) && isset($multipleModels[$modelsoption['id']]) && !empty($multipleModels[$modelsoption['id']])) {
                    $models[] = $multipleModels[$modelsoption['id']];
                } else {
                    $models[] = new $modelClass();
                }
            }
        }
        
        // set attributes for all models
        if ($models) {
            foreach ($models as $i => $modelOptionValue) {
                $modelOptionValue->attributes = $post[$i];
                $index = ($modelOptionValue->isNewRecord) ? $i : $modelOptionValue->id;
                $modelOptionValue->path = \yii\web\UploadedFile::getInstances($modelOptionValue, "[{$index}]path");
            }
        }
        
        
        unset($model, $formName, $post);
        return $models;
    }
    
    /**
     * Loads multiple models from POST data.
     *
     * @param string $modelClass The model class name.
     * @param array $multipleModels The array of multiple model objects.
     * @return array The loaded models.
     */
 
    
}

