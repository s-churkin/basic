<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ff_content".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $tree_id
 *
 * @property Ff_content $Ff_content
 * @property Ff_content[] $Ff_contents
 */
class Ff_content extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ff_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['tree_id'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['url'], 'unique'],
            [['url'], 'default', 'value' => null],
        ];
    }

    /**
     * @inheritdoc
     */ 
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'url' => 'Путь',
        ];
    }
     
    public function myname($id)
    {
        $model = Ff_content::find()
                        ->where(['id' => $id])
                        ->one()->name;
        return $model;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFf_content()
    {
/*
        Yii::info('test message 3:'.$id,'my_category');
*/
        return $this->hasOne(Ff_content::className(), ['id' => 'tree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFf_contents()
    {
        return $this->hasMany(Ff_content::className(), ['tree_id' => 'id']);
    }
}
