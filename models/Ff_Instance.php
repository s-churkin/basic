<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ff_instance".
 *
 * @property integer $id
 * @property integer $content_id
 * @property string $name
 *
 * @property FfContent $content
 * @property FfValues[] $ffValues
 */
class Ff_Instance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ff_instance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id'], 'required'],
            [['content_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content_id' => 'Content ID',
            'name' => 'Наименование',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContent()
    {
        return $this->hasOne(FfContent::className(), ['id' => 'content_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFfValues()
    {
        return $this->hasMany(FfValues::className(), ['instance_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return Ff_InstanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new Ff_InstanceQuery(get_called_class());
    }
}
