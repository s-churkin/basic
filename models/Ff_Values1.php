<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Ff_Values1 extends Model
{
    public $labels = [];
    public $values = [];
    public $fields_id = [];
    public $content_id = null;

    public function fill(Ff_Values1 $model, $id) // $id - indtsnce_id
    {
        $model->content_id = \app\models\Ff_instance::findOne($id)->content_id;
        $tree_content_id = $model->content_id;
        $ids[] = $model->content_id;
        $lflag = 1;
        while ($lflag === 1) {
            $row = (new \yii\db\Query())
                    ->select(['tree_id'])
                    ->from('ff_content')
                    ->where(['id' => $tree_content_id])
                    ->limit(1)
                    ->one();
            if ($row['tree_id'] === null) {
                $lflag = 0;
            } else {
                Yii::info('test message !!! : '. $model->content_id . ' ' . $row['tree_id'],'my_category');
                $ids[] = $row['tree_id'];
                $tree_content_id = $row['tree_id'];
            }
        }
        $query = Ff_fields::find();
        $Ff_fields = $query->where(['content_id' => $ids])->orderBy('id')->all();
        foreach ($Ff_fields as $key=>$Ff_field) {
            $model->labels[] = $Ff_field['name'];
            $row = (new \yii\db\Query())
                    ->select(['value'])
                    ->from('ff_values')
                    ->where(['fields_id' => $Ff_field['id']])
                    ->andwhere(['instance_id' => $id])
                    ->limit(1)
                    ->one();
            if ($row !== null) {
               $model->values[] = $row['value'];
            } else {
               $model->values[] = null;
            }
            $model->fields_id[] = $Ff_field['id'];
            Yii::info('test message !!! 2 : '. $key . ' ' . $Ff_field['name'] . ' ' . $Ff_field['id'],'my_category');
        }
        
    }
    public function save(Ff_Values1 $model, $post, $id) // Сохранение введенных реквизитов
    {
    
        // http://php.net/manual/en/reserved.variables.php
        foreach ($model->values as $key=>$value) {
            if ($value !== $post['Ff_Values1'][$key]['values'][$key] && (($value !== null) or ($post['Ff_Values1'][$key]['values'][$key] !== ''))) {
                Yii::info('test message key - value : ' . $key . ' - ' . $value . ' - ' . $post['Ff_Values1'][$key]['values'][$key],'my_category');
                $Ff_Values = Ff_Values::find()
                           ->where(['fields_id' => $model->fields_id[$key]])
                           ->andwhere(['instance_id' => $id])
                           ->one();
                if ($Ff_Values === null) {
                    $Ff_Values = new Ff_Values();
                    $Ff_Values->fields_id   = $model->fields_id[$key];
                    $Ff_Values->instance_id = $id;
                    $Ff_Values->dfrom       = Date("m.d.y H:i:s");
                }
                $Ff_Values->value = $post['Ff_Values1'][$key]['values'][$key];
                $Ff_Values->save();
            }
    }

}
/*
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
*/
}
