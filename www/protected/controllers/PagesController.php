<?php

class PagesController extends Controller
{

    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * Главная страница
     */
    public function actionMain()
    {
        $model = Pages::model()->findByPk(Yii::app()->params['modules']['mainPage']);
        $this->pageTitle = $model->meta_title;
        Yii::app()->clientScript->registerMetaTag($model->meta_keywords, 'keywords');
        Yii::app()->clientScript->registerMetaTag($model->meta_description, 'description');
        $this->render('main', array('model' => $model));
    }

    public function actionDetail($id = 0)
    {
        if ($id == Yii::app()->params['modules']['zayavka']) {
            SendForm::sendSmallForm();
        }

        //echo $id;
        //var_dump($_GET); die;
        $model = Pages::model()->findByPk($id);
        $this->pageTitle = $model->meta_title;
        Yii::app()->clientScript->registerMetaTag($model->meta_keywords, 'keywords');
        Yii::app()->clientScript->registerMetaTag($model->meta_description, 'description');
        
        //контакты
        //редирект с контактов на первый город
        if ($id == Yii::app()->params['modules']['contacts']) {
            $items = $model->children()->find('visibility=:visibility', array(':visibility' => 1));
            header("HTTP/1.1 301 Moved Permanently");
            header('Location: /'.$model->url.'/'.$items->url);
            echo $items->url; die;
        }
        //страницы контактов
        $p=Pages::model()->findByPk($id);
        $descendants=$p->ancestors()->findAll();
        $cc=0;
        foreach ($descendants as $value) {
            $cc++;            
            if ($cc==2 && $value->pages_id == Yii::app()->params['modules']['contacts']) {
                $this->contacts($model);
                return true;
            }
        }
        
        if ($id == Yii::app()->params['modules']['sitemap']) {
            $this->render('sitemap', array('model' => $model));
            return true;
        }
        $pagesCount = $model->children()->count('visibility=:visibility', array(':visibility' => 1));
        $paginator=new CPagination($pagesCount); 
        $setting = Settings::model()->findByPk(9);
        $paginator->pageSize = $setting->value;
        $url = GetUrlToPage::getUrlToPageById($model->pages_id);
        $paginator->route = $url.'/';//.$newsData->url;
        
        $countPage = ceil($pagesCount/$setting->value);
        if (isset($_GET['page'])) {
            $start = ((int)($_GET['page'])-1)*$paginator->pageSize;
        } else {
            $start = 0;
        }

        //$items = $model->children()->findAll('visibility=:visibility LIMIT '.$start.', '.$setting->value, 
        //        array(':visibility' => 1));
        //        
        //echo $start.', '.$setting->value; die;
        $items = $model->children()->findAll(array(  
            "condition" => "visibility=1",  
            //"order" => "lft",  
            'offset' => $start,
            'limit'=>$setting->value,
            ///"limit" => '0, 2',//$start.', '.$setting->value,  
            "together" => true  
        ));
         //       'visibility=:visibility LIMIT '.$start.', '.$setting->value);
        //$items = Pages::model()->findAll('visibility=:visibility AND root=:root ORDER BY lft', array(':visibility' => 1, ':root' => $id));
        $this->render('detail', array('model' => $model, 'items' => $items, 'paginator' => $paginator, 'countPage'=>$countPage, 'settingValue'=>$setting->value, 'mUrl'=>$url));
    }

    public function contacts($model)
    {
        $items = $model->children()->findAll('visibility=:visibility', array(':visibility' => 1));
        $this->render('contacts', array('model' => $model, 'items' => $items));
    }

    public function action404()
    {
        $model = Pages::model()->findByPk(Yii::app()->params['modules']['404']);
        $this->pageTitle = $model->meta_title;
        Yii::app()->clientScript->registerMetaTag($model->meta_keywords, 'keywords');
        Yii::app()->clientScript->registerMetaTag($model->meta_description, 'description');
        $this->render('404', array('model' => $model));
    }
}