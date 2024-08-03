<?php

namespace app\controllers;

use app\models\Posts;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $posts = Posts::find()->all();
        return $this->render('index', ['posts' => $posts]);
    }

    public function actionCreate()
    {
        $post = new Posts();

        if ($post->load(Yii::$app->request->post()) && $post->save()) {
            return $this->redirect(['view', 'id' => $post->id]);
        }

        return $this->render('create', ['post' => $post]);
    }

    public function actionView($id)
    {
        $post = $this->findModel($id);

        if (!($post->id !== Yii::$app->user->id)) {
            throw new \yii\web\ForbiddenHttpException('You are not allowed to view this post.');
        }

        return $this->render('view', ['post' => $post]);
    }


    public function actionUpdate($id)
    {
        $post = $this->findModel($id);

        if ($post->load(Yii::$app->request->post()) && $post->save()) {
            return $this->redirect(['view', 'id' => $post->id]);
        }

        return $this->render('update', ['post' => $post]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($post = Posts::findOne($id)) !== null) {
            return $post;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Optional: Error action to handle errors gracefully
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }
}
