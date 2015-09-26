<?php

namespace app\controllers;

use Yii;
use app\models\Peso;
use app\models\PesoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PesoController implements the CRUD actions for Peso model.
 */
class PesoController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Peso models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PesoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
      ejemplo mio
     */
    public function actionPesado() {
        //return $this->render('pesado');
        // $id = '2015-07-26';
        //$id='09/09/2015';
        $id = '09-SEP-15';
        // return $this->render('pesado');
        $model = $this->findModel($id);
        return $this->render('pesado', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new Peso model.
     * If creation is successful, the browser will be redirected to the 'view

      ' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Peso();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->fecha]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Peso model.
     * If update is successful, the browser will be redirected to the 'view

      ' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        error_log('DEBUG: ' . $id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->fecha]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Peso model.
     * If deletion is successful, the browser will be redirected to the 'index

      ' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Peso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Peso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Peso::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('

        The requested page does not exist.');
        }
    }

}
