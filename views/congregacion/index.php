<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CongregacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Congregacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congregacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Congregacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<div class="pull-right">
        <?= Html::a('Estados', ['/estado-congregacion'], ['class' => 'btn btn-info']) ?>
		<?= Html::a('Tipos', ['/tipo-congregacion'], ['class' => 'btn btn-info']) ?>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cong_codigo',
            'cong_nombre',
            'cong_sector',
            'econg_codigo',
            'tcong_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
