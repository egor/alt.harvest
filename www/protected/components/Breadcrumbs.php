<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Breadcrumbs
 *
 * @author egorik
 */
class Breadcrumbs
{
    public function getBreadcrumbsToPageById($id)
    {
        $data = '';
        $pages=Pages::model()->findByPk($id);
        $descendants=$pages->ancestors()->findAll();
        //var_dump($descendants); die;
        foreach ($descendants as $value) {
            if ($value->level!=1) {
                //$data[]['name']= $value->menu_name;
                //$data[]['url'] = GetUrlToPage::getUrlToPageById($id);
                $data[$value->menu_name] = GetUrlToPage::getUrlToPageById($value->pages_id);
            }
        }
        return $data;
    }
}

?>
