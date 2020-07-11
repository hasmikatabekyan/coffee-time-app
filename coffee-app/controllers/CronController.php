<?php

namespace app\controllers;

use Yii;
use yii\console\Controller;
use app\components\CoffeeTime;
use app\models\Schedule;
use app\models\CronJob;

class CronController extends Controller
{

    /**
     * Run send email for a period of time
     * @param string $from
     * @param string $to
     * @return int exit code
     */
    public function actionInit($from, $to){

        $dates  = CronJob::getDatetimeRange($from, $to);
        $command = CronJob::run($this->id, $this->action->id, 0, CronJob::countDateRange($dates));
        if ($command === false){
            return Controller::EXIT_CODE_ERROR;
        }else{
            foreach ($dates as $date) {
                //this is the function to execute for each minute
                $users_schedules = Schedule::find()
                    ->where(['coffee_time' => $date])
                    ->select(["email"])
                    ->asArray()
                    ->all();
                if(!empty($users_schedules)){
                    foreach ($users_schedules as $user) {
                        $sendEmail  = CoffeeTime::sendEmail("from@gmail.com",  $user['email'], "Coffee Time", "Hey it's time to drink some coffee" ) ;
                    }
                }
            }
            $command->finish();
            return Controller::EXIT_CODE_NORMAL;
        }
    }

}
