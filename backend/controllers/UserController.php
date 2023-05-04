<?php

namespace backend\controllers;

use backend\models\User;
use backend\models\Teknisi;
use backend\models\Pelanggan;
use backend\models\UserSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = User::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new User();
    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }


    // 

    public function actionCreate()
    {
        $model = new User();
        $otpCode = sprintf("%06d", rand(1, 999999));
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->status = 10;
                $model->setPassword($model->password_data);
                $model->generateAuthKey();
                $model->generateEmailVerificationToken();
                $model->created_at = strtotime(date('Y-m-d H:i:s'));
                $model->updated_at = strtotime(date('Y-m-d H:i:s'));
                if ($model->save(false)) {
                    if ($model->role == 'operator') {
                        $modelTeknisi = new Teknisi();
                        $modelTeknisi->nama_lengkap = $model->nama;
                        $modelTeknisi->id_user = $model->id;
                        $modelTeknisi->create_at = date('Y-m-d H:i:s');
                        $modelTeknisi->status = 10;
                        $modelTeknisi->save(false);
                    } else if ($model->role == 'teknisi') {
                        $modelTeknisi = new Teknisi();
                        $modelTeknisi->nama_lengkap = $model->nama;
                        $modelTeknisi->username = $model->username;
                        $modelTeknisi->id_user = $model->id;
                        $modelTeknisi->create_at = date('Y-m-d H:i:s');
                        $modelTeknisi->status = 10;
                        $modelTeknisi->point = 0;
                        $modelTeknisi->save(false);
                    } else if ($model->role == 'customer') {
                        $modelPelanggan = new Pelanggan();
                        $modelPelanggan->nama = $model->nama;
                        $modelPelanggan->email = $model->email;
                        $modelPelanggan->username = $model->username;
                        $modelPelanggan->id_user = $model->id;
                        $modelPelanggan->create_at = date('Y-m-d H:i:s');
                        $modelPelanggan->point = 0;
                        $modelPelanggan->status = 10;
                        $modelPelanggan->kode_otp = $otpCode;
                        $modelPelanggan->save(false);
                    }

                    return $this->redirect(['index']);
                } else {
                    print_r($model->getErrors());
                    die;
                }
            } else {
                print_r($model->getErrors());
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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
