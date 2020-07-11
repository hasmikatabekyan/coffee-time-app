<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datecontrol\DateControl;

$this->title = 'Coffee Time App';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Select Coffee Time</h2>
                <?php $form = ActiveForm::begin([
                        'id' => 'schedule-form',
                ]); ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'coffee_time')->widget(DateControl::classname(), [
                    'displayFormat' => 'php:H:i',
                    'type'=>DateControl::FORMAT_DATETIME
                ]); ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
</div>
