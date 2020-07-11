<?php

namespace app\components;

use Yii;

class CoffeeTime {
    public static function sendEmail ( $from, $to, $subject, $message )
    {
        Yii::$app->mailer->compose()
            ->setFrom('from@domain.com')
            ->setTo($to)
            ->setSubject($subject)
            ->setTextBody($message)
            ->send();
    }
}
