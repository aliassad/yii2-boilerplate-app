<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Client $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="client-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'location') ?>
    <?php echo $form->field($model, 'company_name') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'phone') ?>
    <?php // echo $form->field($model, 'address') ?>
    <?php // echo $form->field($model, 'per_hour_rate') ?>
    <?php // echo $form->field($model, 'shifts_deduction') ?>
    <?php // echo $form->field($model, 'shifts_cancelation') ?>
    <?php // echo $form->field($model, 'additional_cover') ?>
    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
