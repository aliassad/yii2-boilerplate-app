<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use rmrevin\yii\fontawesome\FAS;
use kartik\datetime\DateTimePicker;

/**
 * @var yii\web\View $this
 * @var common\models\Guard $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="guard-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                <div class="border border-secondary rounded p-1" style="width:320px">
                    <?php echo $form->field($model, 'date_of_birth')->widget(
                        DateTimePicker::class,
                        [
                            'type' => DateTimePicker::TYPE_INLINE,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd HH:mm:ss',
                                'showMeridian' => true,
                                'todayBtn' => true,
                            ]
                        ]
                    ) ?>
                </div>
                <?php echo $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'nationality')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'license_number')->textInput(['maxlength' => true]) ?>
                <div class="border border-secondary rounded p-1" style="width:320px">
                    <?php echo $form->field($model, 'licence_expiry')->widget(
                        DateTimePicker::class,
                        [
                            'type' => DateTimePicker::TYPE_INLINE,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd HH:mm:ss',
                                'showMeridian' => true,
                                'todayBtn' => true,
                            ]
                        ]
                    ) ?>
                </div>
                <br>
                <h3>Bank Details</h3>
                <hr>
                <?php echo $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'sort_number')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'account_number')->textInput(['maxlength' => true]) ?>

                
            </div>

            <div class="card-footer">
                <?php echo Html::submitButton(
                    $model->isNewRecord? FAS::icon('save').' '.Yii::t('backend', 'Create'):FAS::icon('save').' '. Yii::t('backend', 'Save Changes'),
                    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
                ) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
