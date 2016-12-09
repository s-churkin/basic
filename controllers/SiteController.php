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
            foreach($model->name as $key => $value){
               Yii::info('test message 1 : ' . $key . ' ' . $value,'my_category');
             }
 
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            $model->email = '@';
            return $this->render('entry', ['model' => $model]);
        }
    }
    /* URLs v*/
    function actionRedirect_mysql($message = 'http://localhost/phpmyadmin/') {
        return '<head><meta http-equiv="refresh" content="0;' . $message . '" /></head> ';
    }
    function actionDocyii2($message = 'https://nix-tips.ru/yii2-api-guides/guide-ru-helper-array.html') {
        return '<head><meta http-equiv="refresh" content="0;' . $message . '" /></head> ';
    }
    function actionDocphp($message = 'http://php.net/control-structures.foreach') {
        return '<head><meta http-equiv="refresh" content="0;' . $message . '" /></head> ';
    }
    function actionGit($message = 'https://github.com/s-churkin/basic') {
        return '<head><meta http-equiv="refresh" content="0;' . $message . '" /></head> ';
    }
    function actionDbdesigner($message = 'http://dbdesigner.net/designer') {
        return '<head><meta http-equiv="refresh" content="0;' . $message . '" /></head> ';
    }
    function actionBootstarap($message = 'http://bootstrap-3.ru/components.php') {
        return '<head><meta http-equiv="refresh" content="0;' . $message . '" /></head> ';
    }
    function actionWww($message = 'http://localhost/www/index.html   ') {
        return '<head><meta http-equiv="refresh" content="0;' . $message . '" /></head> ';
    }
    function actionIp() {
        return '<html><body><h1>IP адрес</h1><h3>$_SERVER["REMOTE_ADDR"] ' . $_SERVER['REMOTE_ADDR'] . '<p>Yii::$app->request->userIP ' . Yii::$app->request->userIP . '</h3></body></html> ';
    }

}


/* compact('message', 'var') */
