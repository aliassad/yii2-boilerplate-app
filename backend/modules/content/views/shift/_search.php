<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Shift $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="shift-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'shift_date') ?>
    <?php echo $form->field($model, 'start_date_time') ?>
    <?php echo $form->field($model, 'end_date_time') ?>
    <?php echo $form->field($model, 'client_id') ?>
    <?php // echo $form->field($model, 'emp_id') ?>
    <?php // echo $form->field($model, 'paid') ?>
    <?php // echo $form->field($model, 'paid_on') ?>
    <?php // echo $form->field($model, 'hour_rate') ?>
    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
