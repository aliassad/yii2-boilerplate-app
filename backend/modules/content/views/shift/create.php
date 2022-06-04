<?php

/**
 * @var yii\web\View $this
 * @var common\models\Shift $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Shift',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Shifts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shift-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
