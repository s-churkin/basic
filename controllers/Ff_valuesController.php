<?php

namespace app\controllers;

use Yii;
use app\models\Ff_values;
use app\models\Ff_valuesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Ff_values1; /**/

/**
 * Ff_valuesController implements the CRUD actions for Ff_values model.
 */
class Ff_valuesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ff_values models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new Ff_valuesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider, 'id' => $id,
        ]);
    }

    /**
     * Displays a single Ff_values model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id), 'id' => $id,
        ]);
    }

    /**
     * Creates a new Ff_values model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Ff_values();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ff_values model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', ['model' => $model,]);
        }
    }
    /*
     * Форма с произвольным количеством полей
     */
    public function actionUpdate1($id) { // $id - indtsnce_id
        
        $model = new Ff_values1();
        $model->fill($model, $id); // Ff_values1::fill($model, $id); Чтение модели (массивов)
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Сохранение введенных реквизитов
            $model->save($model, $_POST, $id);
            return $this->redirect(['ff_instance/index', 'id' => $model->content_id]); 
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('update1', ['model' => $model,]);
        }
    }

    /**
     * Deletes an existing Ff_values model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $id = $model->instance_id;
        $model->delete();
        return $this->redirect(['index', 'id' => $id]);
    }

    /**
     * Finds the Ff_values model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ff_values the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ff_values::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
