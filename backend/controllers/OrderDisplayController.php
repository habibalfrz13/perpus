<?php

namespace backend\controllers;

use backend\models\OrderDisplay;
use backend\models\OrderDisplaySearch;
use backend\models\OrderHistori;
use backend\models\Teknisi;
use Codeception\Step\Retry;
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

        $searchModel1 = new OrderDisplaySearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        $dataProvider1->query->andWhere(['jenis_layanan' => 1]);

        $searchModel2 = new OrderDisplaySearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        $dataProvider2->query->andWhere(['jenis_layanan' => 2]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
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

                return $this->redirect(['index']);
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
                if ($model->save(false)) {
                    $modelTeknisi = Teknisi::findOne(['id_user' => $id_user]);
                    $modelTeknisi->point -= 10;
                    $modelTeknisi->save();
                }
                Yii::$app->session->setFlash('success', 'Pesanan berhasil diterima.');
            } else if ($model->status == 'diterima') {
                $model->status = 'dipesan';
                $model->id_teknisi = null;
                if ($model->save(false)) {
                    $modelTeknisi = Teknisi::findOne(['id_user' => $id_user]);
                    $modelTeknisi->point += 10;
                    $modelTeknisi->save();
                }
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
    // kode yang
    public function actionDelete($id_order)
    {
        $modelHistory = new OrderHistori();
        $model = $this->findModel($id_order);
        if ($this->request->isPost) {
            if ($model->status == 'dipesan') {
                $modelHistory->status = 'Dibatalkan';
                $modelHistory->id_user = $model->id_user;
                $modelHistory->id_order = $model->id_order;
                $modelHistory->jenis_layanan = $model->jenis_layanan;
                $modelHistory->tanggal = date('Y-m-d H:i:s');
                if ($modelHistory->save()) {
                    Yii::$app->session->setFlash('success', 'Pesanan berhasil dibatalkan.');
                } else {
                    Yii::$app->session->setFlash('error', 'Gagal menyimpan data.');
                }
                return $this->redirect(['order-history/index']);
            } else if ($model->status == 'diterima') {
                $modelHistory = new OrderHistori();
                $modelHistory->status = 'Selesai';
                $modelHistory->id_user = $model->id_user;
                $modelHistory->id_order = $model->id_order;
                $modelHistory->jenis_layanan = $model->jenis_layanan;
                $modelHistory->tanggal = date('Y-m-d H:i:s');
                if ($modelHistory->save()) {
                    Yii::$app->session->setFlash('success', 'Pesanan Telah Selesai.');
                } else {
                    Yii::$app->session->setFlash('error', 'Gagal menyimpan data.');
                }
                return $this->redirect(['feedback/create']);
            } else {
                Yii::$app->session->setFlash('error', 'Tidak dapat mengubah status pesanan.');
            }
        }
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
