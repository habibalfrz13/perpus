<?php

namespace backend\controllers;

use backend\models\Layanan;
use backend\models\LayananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LayananController implements the CRUD actions for Layanan model.
 */
class LayananController extends Controller
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
     * Lists all Layanan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LayananSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Layanan model.
     * @param int $id_layanan Id Layanan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_layanan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_layanan),
        ]);
    }

    /**
     * Creates a new Layanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Layanan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_layanan' => $model->id_layanan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Layanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_layanan Id Layanan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_layanan)
    {
        $model = $this->findModel($id_layanan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_layanan' => $model->id_layanan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Layanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_layanan Id Layanan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_layanan)
    {
        $this->findModel($id_layanan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Layanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_layanan Id Layanan
     * @return Layanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_layanan)
    {
        if (($model = Layanan::findOne(['id_layanan' => $id_layanan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
