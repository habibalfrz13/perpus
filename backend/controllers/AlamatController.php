<?php

namespace backend\controllers;

use backend\models\Alamat;
use backend\models\AlamatKategori;
use backend\models\User;
use backend\models\AlamatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * AlamatController implements the CRUD actions for Alamat model.
 */
class AlamatController extends Controller
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
     * Lists all Alamat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlamatSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alamat model.
     * @param int $id_alamat Id Alamat
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_alamat)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_alamat),
        ]);
    }

    /**
     * Creates a new Alamat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Alamat();
        $model->create_at = date('Y-m-d H:i:s');
        $user = Yii::$app->user->identity;
        $model->id_user = $user->id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_alamat' => $model->id_alamat]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alamat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_alamat Id Alamat
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_alamat)
    {
        $model = $this->findModel($id_alamat);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_alamat' => $model->id_alamat]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alamat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_alamat Id Alamat
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_alamat)
    {
        $this->findModel($id_alamat)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alamat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_alamat Id Alamat
     * @return Alamat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_alamat)
    {
        if (($model = Alamat::findOne(['id_alamat' => $id_alamat])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
