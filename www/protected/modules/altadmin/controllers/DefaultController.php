<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->pageTitle = 'CMS ALTADMIN';
        if (Yii::app()->user->isGuest || Yii::app()->user->role != 'admin') {
            $model = new LoginForm;

            // if it is ajax validation request
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if ($model->validate() && $model->login())
                //$this->redirect(Yii::app()->user->returnUrl);
                    $this->redirect('/altadmin/');
            }
            // display the login form
            $this->render('login', array('model' => $model));
        } else {

            $this->render('index');
        }
    }

    public function actionLogin()
    {
        $this->pageTitle = 'CMS ALTADMIN';
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionSettings()
    {
        $modelSettings['numPage'] = Settings::model()->findByPk(2);
        $this->pageTitle = 'Настройки | CMS ALTADMIN';
        if (isset($_POST['Settings'])) {
            $modelSettings['numPage']->attributes = $_POST['Settings'];
            $modelSettings['numPage']->attributes = (int) $modelSettings['numPage']->attributes;
            $modelSettings['numPage']->save();
            Yii::app()->user->setFlash('success', "Настройки сохранены");
            if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                Yii::app()->request->redirect('/altadmin/');
            } elseif (isset($_POST['yt1'])) {
                Yii::app()->request->redirect('/altadmin/default/settings/');
            }
        }
        $this->render('settings', array('paginator' => $modelSettings['numPage']));
    }
}