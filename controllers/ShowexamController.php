<?php

namespace app\controllers;
use Yii;
use app\models\Exam;
use app\models\ExamQuestion;

class ShowexamController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new Exam();
    	$data = $model->show();
        return $this->render('index', ['data' => $data]);
    }
    public function actionExamdetail(){
        $exam = new Exam();
        $question =new ExamQuestion();
        $question_id = Yii::$app->request->get('question_id');
        $getQuestion = $question->getId($question_id);
        if ($exam->load(Yii::$app->request->post()) || $question->load(Yii::$app->request->post())){
            $request = Yii::$app->request->post('ExamQuestion');
            $data['content_question'] = $request['content_question'];
            $data['answer'] = $request['answer'];
            $data['answer_a'] = $request['answer_a'];
            $data['answer_b'] = $request['answer_b'];
            $data['answer_c'] = $request['answer_c'];
            $data['answer_d'] = $request['answer_d'];
            if ($question->updateExam($request,$question_id)) {
                return $this->redirect('../showexam');
            } else{
                echo "WRONG";
                die();
            }

        }
        return $this->render('examdetail',['getQuestion'=>$getQuestion , 'question'=> $question] );
    }

    public function actionAjax_create_exam(){
		$exam = new Exam();
        $data = Yii::$app->request->post('exam');
        $id = $exam->create($data);

        return $id;
    }
    public function actionAjax_create_question(){
        $model = new ExamQuestion();
        $question = Yii::$app->request->post('data');
        if ($model->createExam($question)) {
            return 1;
        } else{
            return 0;
        }
    }

    public function actionCreate(){
        $exam = new Exam();
        $question =new ExamQuestion();

        return $this->render('create', ['exam' => $exam, 'question'=> $question]);
    }

    public function actionUpdate(){
        $model = new Exam;
        $id = Yii::$app->request->get('id');
        $data = $model ->getExam($id);
        return $this->render('update', ['model' => $data ]);
    }

    public function actionDelete(){
        $model = new ExamQuestion();
        $id = Yii::$app->request->get('id');
        $model = ExamQuestion::findOne($id);
        // print_r($id);die();
        $model->deleteexam($id);
        return $this->redirect('../showexam');
    }
    // public function actionExamdetail(){
    // 	$model = new ExamQuestion();
    //     // $id = Yii::$app->request->get('id');
    //     // $data = $model->examdetail();
    // 	return $this->render('examdetail');
    // }

}
