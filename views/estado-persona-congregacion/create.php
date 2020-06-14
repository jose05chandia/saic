<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoPersonaCongregacion */

$this->title = 'Create Estado Persona Congregacion';
$this->params['breadcrumbs'][] = ['label' => 'Estado Persona Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-persona-congregacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
