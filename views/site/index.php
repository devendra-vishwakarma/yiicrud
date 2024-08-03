<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posts[] $posts */

$this->title = 'Posts';
?>
<div class="site-index">
    <h3>All Posts</h3>
    <p><?= Html::a('Create New Post', ['create'], ['class' => 'btn btn-success']) ?></p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $pos): ?>
                <tr>
                    <td><?= $pos->id ?></td>
                    <td><?= Html::encode($pos->title) ?></td>
                    <td><?= Html::encode($pos->description) ?></td>
                    <td>
                        <?= Html::a('View', ['view', 'id' => $pos->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Update', ['update', 'id' => $pos->id], ['class' => 'btn btn-warning']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $pos->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
