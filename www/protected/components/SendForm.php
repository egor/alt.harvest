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
        
        
$subject="=?utf-8?B?". base64_encode("Заявка с сайта " . Yii::app()->request->serverName). "?=";
$header="From: robot@" . Yii::app()->request->serverName; 
$header.="\nContent-type: text/html; charset=\"utf-8\"";
$message = " <html>
                <head>
                    <title>Заявка с сайта " . Yii::app()->request->serverName . "</title>
                </head>
                <body>
                    <table>
                        <tr><td colspan='2'>Заявка с сайта " . Yii::app()->request->serverName . "</td></tr>
                        <tr><td>Имя: </td><td>" . $_POST['name'] . "</td></tr>
                        <tr><td>Телефон: </td><td>" . $_POST['phone'] . "</td></tr>
                    </table>
                </body>
            </html>";
mail($to, $subject, $message, $header);

    }

    private function selectSendEmails()
    {
        $model = Settings::model()->findByPk(2);
        return $model->value;
    }

}

?>
