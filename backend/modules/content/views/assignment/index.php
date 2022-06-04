<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;
use kartik\date\DatePicker;

/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\search\AssignmentSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignment-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(FAS::icon('user-plus') . ' ' . Yii::t('backend', 'Add New {modelClass}', [
                    'modelClass' => 'Assignment',
                ]), ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn','options' => ['style' => 'width: 5%']],
                    [
                        'attribute' => 'id',
                        'options' => ['style' => 'width: 10%'],
                    ],
                    [
                        'attribute' => 'emp_id',
                        'options' => ['style' => 'width: 15%'],
                        'value' => function ($model) {
                            return $model->emp ? $model->emp->first_name . ' ' . $model->emp->last_name : null;
                        },
                        'filter' => \yii\helpers\ArrayHelper::map(\common\models\Guard::find()->all(), 'id', 'first_name'),
                    ],
                    [
                        'attribute' => 'client_id',
                        'options' => ['style' => 'width: 20%'],
                        'value' => function ($model) {
                            return $model->client ? $model->client->location : null;
                        },
                        'filter' => \yii\helpers\ArrayHelper::map(\common\models\Client::find()->all(), 'id', 'location'),
                    ],
                    [
                        'attribute' => 'assigned_on',
                        'options' => ['style' => 'width: 20%'],
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'assigned_on',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'showMeridian' => true,
                                'todayBtn' => true,
                                'endDate' => '0d',
                            ]
                        ]),
                    ],
                    [
                        'attribute' => 'unassigned_on',
                        'options' => ['style' => 'width: 20%'],
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'unassigned_on',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'showMeridian' => true,
                                'todayBtn' => true,
                                'endDate' => '0d',
                            ]
                        ]),
                    ],
                    // 'created_at',

                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>

        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
