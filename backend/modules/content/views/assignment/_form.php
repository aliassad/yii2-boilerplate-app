<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
/**
 * @var yii\web\View $this
 * @var common\models\Assignment $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="assignment-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-body">
            <?php echo $form->errorSummary($model); ?>
            <?php echo $form->field($model, 'emp_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(\common\models\Guard::find()->all(),
                    'id', 'first_name'), ['prompt' => '']
            ) ?>

            <?php echo $form->field($model, 'client_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(\common\models\Client::find()->all(),
                    'id', 'location'), ['prompt' => '']
            ) ?>

            <div class="border border-secondary rounded p-1" style="width:320px">
                <?php echo $form->field($model, 'assigned_on')->widget(
                    \kartik\date\DatePicker::class,
                    [
                        'type' => \kartik\date\DatePicker::TYPE_INLINE,
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'showMeridian' => true,
                            'todayBtn' => true,
                        ]
                    ]
                ) ?>
            </div>
            <?php if (!$model->isNewRecord) { ?>
                <div class="border border-secondary rounded p-1" style="width:320px">
                    <?php echo $form->field($model, 'unassigned_on')->widget(
                        \kartik\date\DatePicker::class,
                        [
                            'type' => \kartik\date\DatePicker::TYPE_INLINE,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'showMeridian' => true,
                                'todayBtn' => true,
                            ]
                        ]
                    ) ?>
                </div>
            <?php } ?>

        </div>
        <div class="card-footer">
            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
