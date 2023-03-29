<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pho_labresult".
 *
 * @property int $rf_id
 * @property resource $file
 * @property string $date
 * @property string $added_by
 * @property int $rt_id
 * @property string $enccode
 * @property string $remarks
 *
 * @property OptionValue[] $optionValues
 * @property PhoLabresultLogs[] $phoLabresultLogs
 */
class PhoLabresult1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_labresult';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file', 'remarks'], 'string'],
            [['date','file'], 'safe'],
            [['rt_id'], 'required'],
            [['rt_id'], 'integer'],
            [['added_by'], 'string', 'max' => 1024],
            [['enccode'], 'string', 'max' => 48],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rf_id' => 'Rf ID',
            'file' => 'File',
            'date' => 'Date',
            'added_by' => 'Added By',
            'rt_id' => 'Rt ID',
            'enccode' => 'Enccode',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * Gets query for [[OptionValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOptionValues()
    {
        return $this->hasMany(OptionValue::class, ['rf_id' => 'rf_id']);
    }
    
    /*public function upload()
    {
        if ($this->validate()) {
            foreach ($this->file as $file) {
                $fileName = $file->baseName . '.' . $file->extension;
                $file->saveAs('upfiles/result' . $fileName);
                $this->file = $fileName;
            }
            return true;
        } else {
            return false;
        }
    } */
    
   
    /* Do not delete
     * public function upload()
     {
     if ($this->validate()) {
     $fileNames = [];
     foreach ($this->file as $file) {
     $file_name = $this->enccode . '.' . $file->extension;
     //$file_name = implode('_', $this->enccode) . '.' . $file->extension;
     $file->saveAs('upfiles/result/' . $file_name);
     $fileNames[] = $file_name;
     // $file->saveAs('upfiles/result' . $file->baseName . '.' . $file->extension);
     }
     $this->file = implode(',', $fileNames);
     return true;
     } else {
     return false;
     }
     }
     Do no delete */
    /**
     * Gets query for [[PhoLabresultLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoLabresultLogs()
    {
        return $this->hasMany(PhoLabresultLogs::class, ['rf_id' => 'rf_id']);
    }
}
