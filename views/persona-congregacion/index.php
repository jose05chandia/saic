<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaCongregacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Persona Congregacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-congregacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Persona Congregacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'perc_codigo',
            'per_codigo',
            'cong_codigo',
            'tpcong_codigo',
            'epcong_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
