<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaCongregacion */

$this->title = $model->perc_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Persona Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-congregacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->perc_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->perc_codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'perc_codigo',
            'per_codigo',
            'cong_codigo',
            'tpcong_codigo',
            'epcong_codigo',
        ],
    ]) ?>

</div>
