<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadoCongregacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estado Congregacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-congregacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estado Congregacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'econg_codigo',
            'econg_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
