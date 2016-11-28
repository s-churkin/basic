<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\EntryForm; /**/

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
/*
Действие say-hello. В контроллере SiteController.php метод actionSayHello вызывает 
return $this->render('say-hello', ['message' => $message]);
Представление
C:\xampp\htdocs\basic\views\site\say-hello.php
http://localhost/basic/web/index.php?r=site/say-hello&message=Привет+мир
*/    
    public function actionSayHello($message = 'Привет!')
    {
        return $this->render('say-hello', ['message' => $message, 'var' => 'Hi!']);
    }                                   /* compact('message', 'var') */
/*
Создали модель для хранения данных формы C:\xampp\htdocs\basic\models\EntryForm.php 
Действие entry. В контроллере SiteController.php метод actionEntry создает форму $model = new EntryForm(); и вызывает представление entry или entry-confirm
http://localhost/basic/web/index.php?r=site/entry
*/    
    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...
 
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }
    /* URLs v*/
    function actionRedirect_mysql($message = 'http://localhost/phpmyadmin/') {
        return '<head><meta http-equiv="refresh" content="0;' . $message . '" /></head> ';
    }
    function actionDoc($message = 'http://guide.yii2.org-info.by/guide-ru-README.html') {
        return '<head><meta http-equiv="refresh" content="0;' . $message . '" /></head> ';
    }

}


/* compact('message', 'var') */
