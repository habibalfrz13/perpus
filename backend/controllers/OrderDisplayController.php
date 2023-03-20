<?php

namespace backend\controllers;

use backend\models\OrderDisplay;
use backend\models\OrderDisplaySearch;
use backend\models\OrderHistori;
use backend\models\Teknisi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * OrderDisplayController implements the CRUD actions for OrderDisplay model.
 */
class OrderDisplayController extends Controller
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
     * Lists all OrderDisplay models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderDisplaySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderDisplay model.
     * @param int $id_order Id Order
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_order)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_order),
        ]);
    }

    /**
     * Creates a new OrderDisplay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $user = Yii::$app->user->identity;
        $model = new OrderDisplay();
        $model->id_user = $user->id;
        $model->tgl_pesan = date('Y-m-d H:i:s');
        $model->status = 'dipesan';

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                return $this->redirect(['view', 'id_order' => $model->id_order]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrderDisplay model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_order Id Order
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_order)
    {
        $model = $this->findModel($id_order);
        $id_user = Yii::$app->user->identity->id;
        $teknisiId = Teknisi::find()
            ->select('teknisi.id_teknisi')
            ->joinWith('user')
            ->where(['user.id' => $id_user])
            ->scalar();
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->status == 'dipesan') {
                $model->status = 'diterima';
                $model->id_teknisi = $teknisiId;
                $model->save();
                Yii::$app->session->setFlash('success', 'Pesanan berhasil diterima.');
            } else if ($model->status == 'diterima') {
                $model->status = 'dipesan';
                $model->id_teknisi = null;
                $model->save();
                Yii::$app->session->setFlash('success', 'Pesanan dikembalikan ke status "dipesan".');
            } else {
                Yii::$app->session->setFlash('error', 'Tidak dapat mengubah status pesanan.');
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing OrderDisplay model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_order Id Order
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_order)
    {
        $model = $this->findModel($id_order);
        if ($this->request->isPost) {
            if ($model->status == 'dipesan') {
                $modelHistory = new OrderHistori();
                $modelHistory->status = 'Dibatalkan';
                $modelHistory->id_user = $model->id_user;
                $modelHistory->id_order = $model->id_order;
                $modelHistory->jenis_layanan = $model->jenis_layanan;
                $modelHistory->save();
                $this->findModel($id_order)->delete();
                Yii::$app->session->setFlash('error', 'Pesanan berhasil dibatalkan.');
            } else if ($model->status == 'diterima') {
                $modelHistory = new OrderHistori();
                $modelHistory->status = 'Selesai';
                $modelHistory->id_user = $model->id_user;
                $modelHistory->id_order = $model->id_order;
                $modelHistory->jenis_layanan = $model->jenis_layanan;
                $modelHistory->save();
                $this->findModel($id_order)->delete();
                Yii::$app->session->setFlash('Success', 'Pesanan Telah Selesai".');
            } else {
                Yii::$app->session->setFlash('error', 'Tidak dapat mengubah status pesanan.');
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderDisplay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_order Id Order
     * @return OrderDisplay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_order)
    {
        if (($model = OrderDisplay::findOne(['id_order' => $id_order])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
