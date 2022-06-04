<?php

/**
 * @var yii\web\View $this
 * @var common\models\Guard $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Guard',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Guards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guard-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
