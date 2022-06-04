<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Shift $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="shift-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-body">
            <?php echo $form->errorSummary($model); ?>

            <?php echo $form->field($model, 'shift_date')->widget(
                \kartik\date\DatePicker::class,
                [
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'showMeridian' => true,
                        'todayBtn' => true,
                    ]
                ]
            ) ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="border border-secondary rounded p-1" style="width:320px">
                        <?php echo $form->field($model, 'start_date_time')->widget(
                            \kartik\datetime\DateTimePicker::class,
                            [
                                'type' => \kartik\datetime\DateTimePicker::TYPE_INLINE,
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd HH:mm:ss',
                                    'showMeridian' => true,
                                    'todayBtn' => true,
                                ]
                            ]
                        ) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="border border-secondary rounded p-1" style="width:320px">
                        <?php echo $form->field($model, 'end_date_time')->widget(
                            \kartik\datetime\DateTimePicker::class,
                            [
                                'type' => \kartik\datetime\DateTimePicker::TYPE_INLINE,
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd HH:mm:ss',
                                    'showMeridian' => true,
                                    'todayBtn' => true,
                                ]
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
            <?php echo $form->field($model, 'emp_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(\common\models\Guard::find()->all(),
                    'id', 'first_name'), ['prompt' => '']
            ) ?>

            <?php echo $form->field($model, 'client_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(\common\models\Client::find()->all(),
                    'id', 'location'), ['prompt' => '']
            ) ?>

        </div>
        <div class="card-footer">
            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
