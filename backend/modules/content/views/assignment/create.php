<?php

/**
 * @var yii\web\View $this
 * @var common\models\Assignment $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Assignment',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignment-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
