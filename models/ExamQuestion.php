<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exam_question".
 *
 * @property integer $question_id
 * @property integer $exam_id
 * @property string $content_question
 * @property string $answer
 * @property string $answer_a
 * @property string $answer_b
 * @property string $answer_c
 * @property string $answer_d
 * @property integer $deleted
 */
class ExamQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exam_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exam_id', 'deleted'], 'integer'],
            [['answer'], 'string'],
            [['content_question'], 'string', 'max' => 1000],
            [['answer_a', 'answer_b', 'answer_c', 'answer_d'], 'string', 'max' => 50],
        ];
    }
    
    public function getId($id){
        //$sql = 'SELECT * FROM exam_question WHERE question_id = "'.$id.'" ';
        $query = (new \yii\db\Query())->select('*')->from('exam_question')
                                    ->where(['question_id' => $id])
                                    ->one();
        //$query = Yii::$app->db->createCommand($sql)->execute();
        return $query;

    }

    public function updateExam($data, $id){
        $sql = 'UPDATE exam_question SET 
                                    content_question= "'.$data['content_question'].'",
                                    answer= "'.$data['content_question'].'",
                                    answer_a= "'.$data['answer_a'].'",
                                    answer_b= "'.$data['answer_b'].'",
                                    answer_c= "'.$data['answer_c'].'",
                                    answer_d= "'.$data['answer_d'].'"
                                    WHERE question_id = "'.$id.'" ';
        $query = Yii::$app->db->createCommand($sql)->execute();
        return $query;
    }

    public function deleteexam($id){
        $result = Yii::$app->db->createCommand('UPDATE exam_id SET 
                                                deleted = 1
                                                WHERE exam_id = "' .$id. '"
                                                ')->execute();
         return $result;
    }
    public function createExam($data){
        $sql = 'INSERT INTO exam_question (exam_id, content_question, answer, answer_a, answer_b, answer_c, answer_d, deleted ) VALUES ("'.$data['id'].'" ,"'.$data['content_question'].'", "'.$data['answer'].'", "'.$data['answer_a'].'", "'.$data['answer_b'].'", "'.$data['answer_c'].'", "'.$data['answer_d'].'", "0" ) ' ;
        $query = Yii::$app->db->createCommand($sql)->execute();
        return $query;

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question_id' => 'Question ID',
            'exam_id' => 'Exam ID',
            'content_question' => 'Content Question',
            'answer' => 'Answer',
            'answer_a' => 'Answer A',
            'answer_b' => 'Answer B',
            'answer_c' => 'Answer C',
            'answer_d' => 'Answer D',
            'deleted' => 'Deleted',
        ];
    }
}
