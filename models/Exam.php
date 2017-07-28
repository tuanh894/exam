<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exam_id".
 *
 * @property integer $exam_id
 * @property string $exam_title
 */
class Exam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exam_id';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exam_title'], 'string', 'max' => 50],
        ];
    }
    /**
     * @Show data exam
     */
    public function show(){
        $result = (new \yii\db\Query())->select('*')->from('exam_id')->where(['deleted' => 0])->all();
        return $result;
    }

    /*
      @Show question
     */
     public function getExam($id){
        $query = (new \yii\db\Query())->select('*')->from('exam_question')
                                    
                                    ->where(['exam_id' => $id])
                                    ->all();
        // $query->innerJoin('exam_answer','exam_question.question_id = exam_answer.question_id');
        // $result = Yii::$app->db->createCommand('SELECT eq.*, ea.answer_id, ea.answer_a, ea.answer_b, 
        //                                                      ea.answer_c, ea.answer_d
        //                                         FROM exam_question eq
        //                                         JOIN exam_answer ea ON eq.question_id = ea.question_id
        //                                         WHERE exam_id = 1')->execute();
        return $query;
     }

     public function create($data){
        $sql = 'INSERT INTO exam_id (exam_title, deleted) VALUES ("'.$data['exam_title'].'", "0")';
        $query = Yii::$app->db->createCommand($sql)->execute();

        $id = Yii::$app->db->getLastInsertID(); 
        return $id ;
     }

     public function checkResult($id){
        $query = (new \yii\db\Query())->select('answer')->from('exam_question')
                                    
                                    ->where(['question_id' => $id])
                                    ->one();
        return $query['answer'];
     }

     public function saveResult($data){
        //$sql = 'INSERT INTO result (user_id, result, exam_id, created_on) VALUES '
     }
     // public function examdetail(){
     //    $query = (new \yii\db\Query())->select('*')->from('exam_question')
     //                                ->all();
     // }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'exam_id' => 'Exam ID',
            'exam_title' => 'Exam Title',
        ];
    }
}
