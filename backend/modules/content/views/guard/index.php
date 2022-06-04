<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;
use kartik\date\DatePicker;

/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\search\GuardSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Guards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guard-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(FAS::icon('user-plus') . ' ' . Yii::t('backend', 'Add New {modelClass}', [
                    'modelClass' => 'Guard',
                ]), ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
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
                    [
                        'attribute' => 'id',
                        'options' => ['style' => 'width: 5%'],
                    ],
                    [
                        'attribute' => 'first_name',
                        'options' => ['style' => 'width: 15%'],
                    ],
                    [
                        'attribute' => 'last_name',
                        'options' => ['style' => 'width: 15%'],
                    ],
                    [
                        'attribute' => 'license_number',
                        'options' => ['style' => 'width: 15%'],
                    ],
                    [
                        'attribute' => 'gender',
                        'options' => ['style' => 'width: 15%'],
                    ],
                    [
                        'attribute' => 'date_of_birth',
                        'options' => ['style' => 'width: 15%'],
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'date_of_birth',
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
                        'attribute' => 'created_at',
                        'options' => ['style' => 'width: 15%'],
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'created_at',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'showMeridian' => true,
                                'todayBtn' => true,
                                'endDate' => '0d',
                            ]
                        ]),
                    ],
                    // 'nationality',
                    // 'phone_number',
                    // 'address',
                    // 'email:email',
                    // 'license_number',
                    // 'licence_expiry',
                    // 'bank_name',
                    // 'sort_number',
                    // 'account_number',
                    // 'created_at',
                    [
                        'class' => \common\widgets\ActionColumn::class,
                        'options' => ['style' => 'width: 5%'],
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                $url = Yii::$app->urlManager->createUrl('content/shift/guard?id=' . $model->id);
                                return Html::a('<span class="fa fa-clock"></span>', $url, ['class' => 'btn btn-info btn-xs']);
                            },
                        ]
                    ],
                ],
            ]); ?>

        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
