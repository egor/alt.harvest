<?php
/**
 * SendForm
 *
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package frontEnd
 */
class SendForm {    
    public function sendSmallForm(){
        $email = Yii::app()->email;
        $email->to = SendForm::selectSendEmails();
        $email->subject = 'Заявка с '.Yii::app()->request->hostInfo;
        $email->message = '<table>';
        $email->message .= '<tr><td colspan="2">Заявка с сайта '.Yii::app()->request->hostInfo.'</td></tr>';
        $email->message .= '<tr><td>Имя: </td><td>' . $_POST['name'].'</td></tr>';
        $email->message .= '<tr><td>Телефон: </td><td>' . $_POST['phone'].'</td></tr>';
        $email->message .= '</table>';
        $email->send();
    }
    private function selectSendEmails(){
        $model = Settings::model()->findByPk(2);
        return $model->value;
    }
}

?>
