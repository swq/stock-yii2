<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Expenses');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                    <div class="box-tools">
                        <div class="input-group">

                                <?= Html::a(Yii::t('app', 'Create Expense'), ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'speciality:ntext',
            'sum',
            'date',
            'comment:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
                </div>
            </div>
        </div>
    </div>
</section>
