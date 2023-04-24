<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hencdiag".
 *
 * @property string $enccode
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $licno
 * @property string $encdate
 * @property string $enctime
 * @property string|null $diagcode
 * @property string|null $tdcode
 * @property string|null $edrem
 * @property string|null $edstat
 * @property string|null $edlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string|null $diagtext
 * @property string|null $doctype
 * @property string|null $entryby
 * @property string|null $primediag
 * @property string|null $diagsubcat
 * @property string|null $diagcode_ext
 *
 * @property Henctr $enccode0
 * @property Hperson $hpercode0
 */
class Hencdiag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hencdiag';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enccode', 'encdate', 'enctime'], 'required'],
            [['encdate', 'enctime', 'datemod'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['hpercode'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['licno'], 'string', 'max' => 15],
            [['diagcode', 'diagcode_ext'], 'string', 'max' => 40],
            [['tdcode', 'doctype'], 'string', 'max' => 5],
            [['edrem', 'diagtext'], 'string', 'max' => 255],
            [['edstat', 'edlock', 'updsw', 'confdl', 'primediag'], 'string', 'max' => 1],
            [['entryby', 'diagsubcat'], 'string', 'max' => 10],
            [['enccode', 'encdate', 'enctime'], 'unique', 'targetAttribute' => ['enccode', 'encdate', 'enctime']],
            [['enccode'], 'exist', 'skipOnError' => true, 'targetClass' => Henctr::class, 'targetAttribute' => ['enccode' => 'enccode']],
            [['hpercode'], 'exist', 'skipOnError' => true, 'targetClass' => Hperson::class, 'targetAttribute' => ['hpercode' => 'hpercode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enccode' => 'Enccode',
            'hpercode' => 'Hpercode',
            'upicode' => 'Upicode',
            'licno' => 'Licno',
            'encdate' => 'Encdate',
            'enctime' => 'Enctime',
            'diagcode' => 'Diagcode',
            'tdcode' => 'Tdcode',
            'edrem' => 'Edrem',
            'edstat' => 'Edstat',
            'edlock' => 'Edlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'diagtext' => 'Diagtext',
            'doctype' => 'Doctype',
            'entryby' => 'Entryby',
            'primediag' => 'Primediag',
            'diagsubcat' => 'Diagsubcat',
            'diagcode_ext' => 'Diagcode Ext',
        ];
    }

    /**
     * Gets query for [[Enccode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccode0()
    {
        return $this->hasOne(Henctr::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpercode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpercode0()
    {
        return $this->hasOne(Hperson::class, ['hpercode' => 'hpercode']);
    }
}
