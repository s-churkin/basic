<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tree".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $tree_id
 *
 * @property Tree $tree
 * @property Tree[] $trees
 */
class Tree extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tree';
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
            'name' => 'имя',
            'url' => 'путь',
        ];
    }

    public function myname($id)
    {
        $model = Tree::find()
                        ->where(['id' => $id])
                        ->one()->name;
        return $model;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTree()
    {
        return $this->hasOne(Tree::className(), ['id' => 'tree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrees()
    {
        return $this->hasMany(Tree::className(), ['tree_id' => 'id']);
    }

}