<?php

namespace app\controllers;
use Yii;
use app\models\User1;
use  yii\web\Session;


class DangnhapController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
    	$model = new User1();
        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('User1');
            // $user['user_id'] = $request['id_user'];
            $user['username'] = $request['username'];
    		$user['password'] = $request['password'];
    		if ($model->login($user['username'], $user['password'])) {
                $session->set('userID', $user);
    			return $this->redirect('admin');
    		} else {
    			echo "Wrong";
    			die();
    		}
    	} 
    	
        return $this->render('index',[
            'model' => $model
        ]);
    }
}
