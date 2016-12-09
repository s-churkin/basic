<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ff_values".
 *
 * @property integer $id
 * @property integer $fields_id
 * @property string $value
 * @property string $dfrom
 * @property integer $instance_id
 *
 * @property FfFields $fields
 * @property FfInstance $instance
 */
class Ff_Values extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ff_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fields_id', 'instance_id'], 'required'],
            [['fields_id', 'instance_id'], 'integer'],
            [['dfrom'], 'safe'],
            [['dto'], 'safe'],
            [['value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fields_id' => 'Fields ID',
            'value' => 'Значение',
            'dfrom' => 'Дата с',
            'instance_id' => 'Дата по',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFields()
    {
        return $this->hasOne(FfFields::className(), ['id' => 'fields_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstance()
    {
        return $this->hasOne(FfInstance::className(), ['id' => 'instance_id']);
    }

    /**
     * @inheritdoc
     * @return FfValuesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FfValuesQuery(get_called_class());
    }
}
