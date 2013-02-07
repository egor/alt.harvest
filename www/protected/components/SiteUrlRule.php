<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteUrlRule
 *
 * @author egorik
 */
class SiteUrlRule extends CBaseUrlRule {

    public $connectionID = 'db';

    public function createUrl($manager, $route, $params, $ampersand) {

        if ($route === 'car/index') {
            if (isset($params['manufacturer'], $params['model']))
                return $params['manufacturer'] . '/' . $params['model'];
            else if (isset($params['manufacturer']))
                return $params['manufacturer'];
        }
        return false;  // не применяем данное правило
    }

    /**
     * @todo
     * @param type $manager
     * @param type $request
     * @param type $pathInfo
     * @param type $rawPathInfo
     * @return string|boolean
     */
    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo) {
        if (empty($pathInfo)) {
            return 'pages/main';
        }
        $url = explode('/', $pathInfo);
        $model = Pages::model()->find('url="' . $url[0] . '"');
        if (isset($model)) {
            if (!empty($model->module)) {
                if ($url[0] === end($url)) {
                    return $model->module.'/index';
                } else {
                    
                    //новости
                    if ($model->module == 'news') {
                        if (!isset($url[1])) {
                            return 'news/';
                        } else if ($url[1]==='page'){                            
                            return 'news/index/page/'.$url[2];
                        } else if ($url[1] === end($url)) {
                            $modelN = News::model()->find('url="' . $url[1] . '"');
                            return 'news/detail/id/'.$modelN->news_id;
                        } else {
                            return false;
                        }
                    }
                    //отзывы
                    if ($model->module == 'reviews') {
                        if (!isset($url[1])) {
                            return 'reviews/';
                        } else if ($url[1]==='page'){                            
                            return 'reviews/index/page/'.$url[2];
                        } else {
                            return false;
                        }
                    }
                    //наши работы
                    if ($model->module == 'works') {
                        if (!isset($url[1])) {
                            return 'works/';
                        } else if ($url[1]==='page'){                            
                            return 'works/index/page/'.$url[2];
                        } else {
                            return false;
                        }
                    }
                    //видео советы
                    if ($model->module == 'videoTips') {
                        if (!isset($url[1])) {
                            return 'videoTips/';
                        } else if ($url[1]==='page'){                            
                            return 'videoTips/index/page/'.$url[2];
                        } else {
                            return false;
                        }
                    }
                }
            } else {
                $model = Pages::model()->find('url="' . end($url) . '"');
                if (isset($model)) {
                    return 'pages/detail/id/'.$model->pages_id;
                }
            }
        }
        return false;
        if (preg_match('%^(\w+)(/(\w+))?$%', $pathInfo, $matches)) {
            // Проверяем $matches[1] и $matches[3] на предмет
            // соответствия производителю и модели в БД.
            // Если соответствуют, выставляем $_GET['manufacturer'] и/или $_GET['model']
            // и возвращаем строку с маршрутом 'car/index'.
        }
        return false;  // не применяем данное правило
    }

}

?>
