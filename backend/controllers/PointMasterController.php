<?php

namespace backend\controllers;

use backend\models\PointMaster;
use backend\models\PointMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PointMasterController implements the CRUD actions for PointMaster model.
 */
class PointMasterController extends Controller
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
     * Lists all PointMaster models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PointMasterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PointMaster model.
     * @param int $id_point Id Point
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_point)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_point),
        ]);
    }

    /**
     * Creates a new PointMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PointMaster();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_point' => $model->id_point]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PointMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_point Id Point
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_point)
    {
        $model = $this->findModel($id_point);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_point' => $model->id_point]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PointMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_point Id Point
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_point)
    {
        $this->findModel($id_point)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PointMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_point Id Point
     * @return PointMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_point)
    {
        if (($model = PointMaster::findOne(['id_point' => $id_point])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
