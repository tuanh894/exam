<?php

namespace app\controllers;
use Yii;

class AdminController extends \yii\web\Controller
{
	public function actionIndex(){

        return $this->render('admin');
		
	}
    

}
