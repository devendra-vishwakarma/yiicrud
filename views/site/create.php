<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Posts $post */

$this->title = 'Create Post';
?>
<div class="site-create">
    <h3>Create a New Post</h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($post, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($post, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
