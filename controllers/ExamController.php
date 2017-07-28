<?php

namespace app\controllers;
use Yii,app;
use app\models\Exam;
use app\models\User1;
use  yii\web\Session;


class ExamController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new Exam;
    	$data = $model->show();

        return $this->render('index', ['model' => $data ]);
    }

    public function actionDoexam()
    {
    	$model = new Exam;
    	$id = Yii::$app->request->get('id');
    	$data['model'] = $model ->getExam($id);
        $data['exam_id'] = $id;
    	return $this->render('doexam', ['data' => $data]);
    }

    public function actionAjax_exam_result(){
        $model = new Exam;
        // $user = new User1;

        $data = Yii::$app->request->post('data');
        
        //$id = Yii::$app->request->post('examId');
        // $session = Yii::$app->session;

        // $username = $session->get('username');
        // print_r($username);
        // die();
        
        $result = [];
        $result['point'] = 0;
        foreach ($data as $key => $value) {
            $check = $model->checkResult($key);
            if ($check === $value) {
                $result[$key]['right_answer'] = $check;
                $result[$key]['your_answer'] = $value;
                $result['point'] += 2;
            } else {
                $result[$key]['right_answer'] = $check;
                $result[$key]['your_answer'] = $value;
            }
        }

        // return Json    
        return \yii\helpers\Json::encode($result);
    }

}
