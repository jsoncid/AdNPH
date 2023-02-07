<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "library".
 *
 * @property int $Book_ID
 * @property string $Book_name
 * @property string $Book_Descrip
 */
class Library extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'library';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Book_ID', 'Book_name', 'Book_Descrip'], 'required'],
            [['Book_ID'], 'integer'],
            [['Book_name', 'Book_Descrip'], 'string', 'max' => 150],
            [['Book_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Book_ID' => 'Book  ID',
            'Book_name' => 'Book Name',
            'Book_Descrip' => 'Book  Descrip',
        ];
    }
}
