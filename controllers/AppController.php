<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 01.01.2018
 * Time: 14:12
 */

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller
{

    /**
     * @param null $title
     * @param null $keywords
     * @param null $description
     */
    protected function setMeta($title = null, $keywords = null, $description = null)
    {

        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);

    }


}