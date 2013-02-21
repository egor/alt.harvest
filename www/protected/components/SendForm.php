<?php

/**
 * SendForm
 *
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package frontEnd
 */
class SendForm
{

    public function sendSmallForm()
    {
        
        /* получатели */
        $to = SendForm::selectSendEmails();
        

   $from = 'robot@' . Yii::app()->request->serverName; 
   $subject = 'Заявка с сайта ' . Yii::app()->request->serverName; 
   $subject = '=?utf-8?b?'. base64_encode($subject) .'?='; 
   $headers = "Content-type: text/html; charset=\"utf-8\"\r\n"; 
   $headers .= "From: <". $from .">\r\n"; 
   $headers .= "MIME-Version: 1.0\r\n"; 
   $headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n"; 
   $message = 'Вот такое вот письмо'; 
   
$message = " <html>
                <head>
                    <title>Заявка с сайта " . Yii::app()->request->serverName . "</title>
                </head>
                <body>
                    <table>
                        <tr><td colspan='2'>Заявка с сайта " . Yii::app()->request->serverName . "</td></tr>
                        <tr><td>Имя: </td><td>" . $_POST['name'] . "</td></tr>
                        <tr><td>Телефон: </td><td>" . $_POST['phone'] . "</td></tr>
                        <tr><td>Пометка: </td><td>" . $_POST['remark'] . "</td></tr>
                    </table>
                </body>
            </html>";
mail($to, $subject, $message, $headers, '-f'. $from );


    }

    private function selectSendEmails()
    {
        $model = Settings::model()->findByPk(2);
        return $model->value;
    }

}

?>
