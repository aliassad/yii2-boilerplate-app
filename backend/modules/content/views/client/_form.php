<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Client $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="client-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'per_hour_rate')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'shifts_deduction')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'shifts_cancelation')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'additional_cover')->textInput(['maxlength' => true]) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton(
                    $model->isNewRecord? \rmrevin\yii\fontawesome\FAS::icon('save').' '.Yii::t('backend', 'Create'):\rmrevin\yii\fontawesome\FAS::icon('save').' '. Yii::t('backend', 'Save Changes'),
                    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
                ) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
