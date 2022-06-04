<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Guard $model
 */

$this->title = $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Guards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guard-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'first_name',
                    'last_name',
                    'date_of_birth',
                    'gender',
                    'nationality',
                    'phone_number',
                    'address',
                    'email:email',
                    'license_number',
                    'licence_expiry',
                    'bank_name',
                    'sort_number',
                    'account_number',
                    'created_at',

                ],
            ]) ?>
        </div>
    </div>
</div>
