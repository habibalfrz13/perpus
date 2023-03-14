<?php

namespace backend\controllers;

use backend\models\OrderHistori;
use backend\models\OrderHistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderHistoryController implements the CRUD actions for OrderHistori model.
 */
class OrderHistoryController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all OrderHistori models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderHistorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderHistori model.
     * @param int $id_historis Id Historis
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_historis)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_historis),
        ]);
    }

    /**
     * Creates a new OrderHistori model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OrderHistori();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_historis' => $model->id_historis]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrderHistori model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_historis Id Historis
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_historis)
    {
        $model = $this->findModel($id_historis);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_historis' => $model->id_historis]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrderHistori model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_historis Id Historis
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_historis)
    {
        $this->findModel($id_historis)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderHistori model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_historis Id Historis
     * @return OrderHistori the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_historis)
    {
        if (($model = OrderHistori::findOne(['id_historis' => $id_historis])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
