<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PersonaCongregacion */

$this->title = 'Create Persona Congregacion';
$this->params['breadcrumbs'][] = ['label' => 'Persona Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-congregacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
