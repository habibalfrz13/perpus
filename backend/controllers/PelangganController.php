<?php

namespace backend\controllers;

use backend\models\Pelanggan;
use backend\models\User;
use backend\models\PelangganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * PelangganController implements the CRUD actions for Pelanggan model.
 */
class PelangganController extends Controller
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
     * Lists all Pelanggan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PelangganSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pelanggan model.
     * @param int $id_pelanggan Id Pelanggan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pelanggan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pelanggan),
        ]);
    }

    /**
     * Creates a new Pelanggan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pelanggan();
        $model->create_at = date('Y-m-d H:i:s');
        $otpCode = sprintf("%06d", rand(1, 999999));

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // print_r($model->tgl_lahir);
                // die;
                $modelUser = new User();
                $modelUser->username = $model->username;
                $modelUser->email = $model->email;
                $modelUser->setPassword($model->password_data);
                $modelUser->generateAuthKey();
                $modelUser->generateEmailVerificationToken();

                $modelUser->created_at = strtotime(date('Y-m-d H:i:s'));
                $modelUser->updated_at = strtotime(date('Y-m-d H:i:s'));
                $modelUser->role = 'customer';
                if ($modelUser->save(false)) {
                    $model->id_user = $modelUser->id;
                    $model->status = '10';
                    $model->point = 0;
                    $model->kode_otp = $otpCode;

                    $model->_foto = UploadedFile::getInstance($model, '_foto');
                    if ($model->_foto) {
                        $fotoName = 'foto_' . time() . '.' . $model->_foto->extension;
                        $model->_foto->saveAs(Yii::getAlias('@app/uploads/foto/') . $fotoName);
                        $model->foto = $fotoName;
                    }

                    $model->save(false);
                    return $this->redirect(['index']);
                }
            } else {
                // print_r($modelUser->getErrors());
                die;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pelanggan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pelanggan Id Pelanggan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pelanggan)
    {
        $model = $this->findModel($id_pelanggan);
        $modelUser = User::find()->where(['id' => $model->id_user])->one();
        $model->username = $modelUser->username;

        if ($this->request->isPost) {
            $model->load($this->request->post());

            // Set create_at field
            $model->create_at = date('Y-m-d H:i:s');

            if ($model->password_data) {
                $modelUser->setPassword($model->password_data);
                $modelUser->generateAuthKey();
            }
            $modelUser->email = $model->email;
            $modelUser->save();

            $model->create_at = strtotime(date('Y-m-d H:i:s'));
            // Handle uploaded photo
            $model->_foto = UploadedFile::getInstance($model, '_foto');
            if ($model->_foto) {
                $fotoName = 'foto_' . time() . '.' . $model->_foto->extension;
                $model->foto = $fotoName;
                $model->_foto->saveAs(Yii::getAlias('@app/uploads/foto/') . $fotoName);
            }
            $model->save();

            return $this->redirect(['view', 'id_pelanggan' => $model->id_pelanggan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pelanggan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pelanggan Id Pelanggan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pelanggan)
    {
        $this->findModel($id_pelanggan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pelanggan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pelanggan Id Pelanggan
     * @return Pelanggan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pelanggan)
    {
        if (($model = Pelanggan::findOne(['id_pelanggan' => $id_pelanggan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
