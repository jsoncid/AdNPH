<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hprovider".
 *
 * @property string $licno
 * @property string|null $employeeid
 * @property string|null $accno
 * @property string|null $accdte
 * @property string|null $upiprov
 * @property string|null $empdegree
 * @property string|null $empalias
 * @property string|null $docpma
 * @property string $clscode
 * @property string|null $docptr
 * @property string|null $catcode
 * @property string|null $docpe
 * @property string|null $provpassw
 * @property string|null $puserid
 * @property string|null $hint
 * @property string|null $hanswer
 * @property string|null $empstat
 * @property string|null $emplock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string|null $clscon
 * @property string|null $postitle
 * @property string|null $entryby
 *
 * @property Hpersonal $employee
 * @property Hadmlog[] $hadmlogs
 * @property Hadmlog[] $hadmlogs0
 * @property Hadmlog[] $hadmlogs1
 * @property Hadmlog[] $hadmlogs2
 * @property Hadmlog[] $hadmlogs3
 * @property Hadmlog[] $hadmlogs4
 * @property Hadmlog[] $hadmlogs5
 * @property Hdocord[] $hdocords
 * @property Hrxo[] $hrxos
 */
class Hprovider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hprovider';
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
            [['licno'], 'required'],
            [['accdte', 'datemod'], 'safe'],
            [['licno'], 'string', 'max' => 15],
            [['employeeid', 'provpassw', 'puserid', 'entryby'], 'string', 'max' => 10],
            [['accno', 'empdegree', 'docpma', 'docptr', 'postitle'], 'string', 'max' => 20],
            [['upiprov'], 'string', 'max' => 12],
            [['empalias'], 'string', 'max' => 60],
            [['clscode', 'catcode', 'clscon'], 'string', 'max' => 5],
            [['docpe', 'empstat', 'emplock', 'updsw'], 'string', 'max' => 1],
            [['hint', 'hanswer'], 'string', 'max' => 70],
            [['licno'], 'unique'],
            [['employeeid'], 'exist', 'skipOnError' => true, 'targetClass' => Hpersonal::className(), 'targetAttribute' => ['employeeid' => 'employeeid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'licno' => 'Licno',
            'employeeid' => 'Employeeid',
            'accno' => 'Accno',
            'accdte' => 'Accdte',
            'upiprov' => 'Upiprov',
            'empdegree' => 'Empdegree',
            'empalias' => 'Empalias',
            'docpma' => 'Docpma',
            'clscode' => 'Clscode',
            'docptr' => 'Docptr',
            'catcode' => 'Catcode',
            'docpe' => 'Docpe',
            'provpassw' => 'Provpassw',
            'puserid' => 'Puserid',
            'hint' => 'Hint',
            'hanswer' => 'Hanswer',
            'empstat' => 'Empstat',
            'emplock' => 'Emplock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'clscon' => 'Clscon',
            'postitle' => 'Postitle',
            'entryby' => 'Entryby',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Hpersonal::className(), ['employeeid' => 'employeeid']);
    }

    /**
     * Gets query for [[Hadmlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs()
    {
        return $this->hasMany(Hadmlog::className(), ['licncons' => 'licno']);
    }

    /**
     * Gets query for [[Hadmlogs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs0()
    {
        return $this->hasMany(Hadmlog::className(), ['licno2' => 'licno']);
    }

    /**
     * Gets query for [[Hadmlogs1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs1()
    {
        return $this->hasMany(Hadmlog::className(), ['licno3' => 'licno']);
    }

    /**
     * Gets query for [[Hadmlogs2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs2()
    {
        return $this->hasMany(Hadmlog::className(), ['licno4' => 'licno']);
    }

    /**
     * Gets query for [[Hadmlogs3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs3()
    {
        return $this->hasMany(Hadmlog::className(), ['licno5' => 'licno']);
    }

    /**
     * Gets query for [[Hadmlogs4]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs4()
    {
        return $this->hasMany(Hadmlog::className(), ['licnof' => 'licno']);
    }

    /**
     * Gets query for [[Hadmlogs5]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs5()
    {
        return $this->hasMany(Hadmlog::className(), ['licno' => 'licno']);
    }

    /**
     * Gets query for [[Hdocords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords()
    {
        return $this->hasMany(Hdocord::className(), ['licno' => 'licno']);
    }

    /**
     * Gets query for [[Hrxos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxos()
    {
        return $this->hasMany(Hrxo::className(), ['licno' => 'licno']);
    }
}
