<?php

/**
 * @var yii\web\View $this
 * @var common\models\Client $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Client',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
