<?php

namespace backend\controllers;

use backend\models\Topup;
use backend\models\Teknisi;
use backend\models\TopupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * TopupController implements the CRUD actions for Topup model.
 */
class TopupController extends Controller
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
     * Lists all Topup models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TopupSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Topup model.
     * @param int $id_topup Id Topup
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_topup)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_topup),
        ]);
    }

    /**
     * Creates a new Topup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $id_user = Yii::$app->user->identity->id;
        $model = new Topup();
        $model->id_user = $id_user;
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $modelTeknisi = Teknisi::find()->where;
                $modelTeknisi->point = $model->jumlah_point;
                return $this->redirect(['view', 'id_topup' => $model->id_topup]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Topup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_topup Id Topup
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_topup)
    {
        $model = $this->findModel($id_topup);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_topup' => $model->id_topup]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Topup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_topup Id Topup
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_topup)
    {
        $this->findModel($id_topup)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Topup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_topup Id Topup
     * @return Topup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_topup)
    {
        if (($model = Topup::findOne(['id_topup' => $id_topup])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
