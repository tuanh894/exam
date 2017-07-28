<?php

namespace app\controllers;
use Yii;
use app\models\User1;

class ShowuserController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new User1();
    	$data = $model->show();
        return $this->render('index', ['data' => $data]);
    }
    
    public function actionCreate(){
		$model = new User1();
		// if ($model->load(Yii::$app->request->post())) {
		// 	//create new user
		// 	if ($model->login(Yii::$app->request->post('User1'))) {
  //   			echo 'sdgsdgsdg';
  //   			die;
  //   		}
		// }
		if ($model->load(Yii::$app->request->post())) {
			$request = Yii::$app->request->post('User1');
			$user = $request['username'];
    		$pass = $request['password'];
    		$email = $request['email'];
    		if ($model->create($user, $pass, $email)) {
    			return $this->redirect('../showuser');
    		} else {
    			echo "Wrong";
    			die();
    		}
		}
        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate(){
    	$model = new User1();
    	
    	$id = Yii::$app->request->get('id');
    	$user = $model->getUser($id);
    		// var_dump($user);die;
    	if ($model->load(Yii::$app->request->post())) {
    		$request = Yii::$app->request->post('User1');
			$user = $request['username'];
    		$pass = $request['password'];
    		$email = $request['email'];
    		if ($model->edit($user, $pass, $email, $id)) {
    			return $this->redirect('../showuser');
    		} else {
    			echo "wrong";
    			die();
    		}
    	}

    	return $this->render('update', ['model' => $model, 'user' => $user]);

    	}

    public function actionDelete(){
    	$model = new User1();
    	$id = Yii::$app->request->get('id');
    	$model = User1::findOne($id);
        // var_dump($model);die();
    	$model->deleteUser($id);
    	return $this->redirect('../showuser');
    }

}
