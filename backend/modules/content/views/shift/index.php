<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;

/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\search\ShiftSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Shifts');
$this->params['breadcrumbs'][] = $this->title;
$guardView = $guardView ?? false;
?>
<div class="shift-index">
    <div class="card">
        <?php if (!$guardView) { ?>
            <div class="card-header">

                <?php echo Html::a(FAS::icon('user-plus') . ' ' . Yii::t('backend', 'Add New {modelClass}', [
                        'modelClass' => 'Shift',
                    ]), ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        <?php } ?>
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
                    ['class' => 'yii\grid\SerialColumn', 'options' => ['style' => 'width: 5%']],
                    ['attribute' => 'id', 'options' => ['style' => 'width: 5%']],
                    [
                        'attribute' => 'shift_date',
                        'options' => ['style' => 'width: 15%'],
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'shift_date',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'showMeridian' => true,
                                'todayBtn' => true,
                            ]
                        ]),
                    ],
                    [
                        'attribute' => 'start_date_time',
                        'options' => ['style' => 'width: 20%'],
                        'format' => 'datetime',
                        'filter' => DateTimePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'start_date_time',
                            'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd HH:mm:ss',
                                'showMeridian' => true,
                                'todayBtn' => true,
                            ]
                        ]),
                    ],
                    [
                        'attribute' => 'end_date_time',
                        'options' => ['style' => 'width: 20%'],
                        'format' => 'datetime',
                        'filter' => DateTimePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'end_date_time',
                            'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd HH:mm:ss',
                                'showMeridian' => true,
                                'todayBtn' => true,
                            ]
                        ]),
                    ],
                    [
                        'visible' => !$guardView,
                        'attribute' => 'emp_id',
                        'options' => ['style' => 'width: 15%'],
                        'value' => function ($model) {
                            return $model->emp ? $model->emp->first_name . ' ' . $model->emp->last_name : null;
                        },
                        'filter' => \yii\helpers\ArrayHelper::map(\common\models\Guard::find()->all(), 'id', 'first_name'),
                    ],
                    [
                        'visible' => true,
                        'attribute' => 'Total Hours',
                        'format' => 'raw',
                        'options' => ['style' => 'width: 5%'],
                        'value' => function ($model) {
                            return calHours($model->start_date_time, $model->end_date_time);
                        },
                        'filter' => \yii\helpers\ArrayHelper::map(\common\models\Guard::find()->all(), 'id', 'first_name'),
                    ],
                    [
                        'attribute' => 'client_id',
                        'options' => ['style' => 'width: 10%'],
                        'value' => function ($model) {
                            return $model->client ? $model->client->location : null;
                        },
                        'filter' => \yii\helpers\ArrayHelper::map(\common\models\Client::find()->all(), 'id', 'location'),
                    ],
                    // 'paid',
                    // 'paid_on',
                    // 'hour_rate',
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
