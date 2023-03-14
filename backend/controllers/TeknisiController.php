<?php

namespace backend\controllers;

use backend\models\Teknisi;
use backend\models\User;
use backend\models\TeknisiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * TeknisiController implements the CRUD actions for Teknisi model.
 */
class TeknisiController extends Controller
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
     * Lists all Teknisi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TeknisiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        // $dataProvider = $searchModel->searchOperator($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex2()
    {
        $searchModel = new TeknisiSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider = $searchModel->searchOperator($this->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teknisi model.
     * @param int $id_teknisi Id Teknisi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_teknisi)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_teknisi),
        ]);
    }

    /**
     * Creates a new Teknisi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    // Create Work
    // public function actionCreate()
    // {
    //     $model = new Teknisi();
    //     $modelUser = new User();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post())) {
    //             $modelUser->username = $model->username;
    //             $modelUser->email = $model->email;
    //             $modelUser->setPassword($model->password);
    //             $modelUser->generateAuthKey();
    //             $modelUser->generateEmailVerificationToken();

    //             $modelUser->created_at = strtotime(date('Y-m-d H:i:s'));
    //             $modelUser->updated_at = strtotime(date('Y-m-d H:i:s'));
    //             $modelUser->role = 'teknisi';
    //             if ($modelUser->save()){

    //             }else{
    //                 // print_r($modelUser->getErrors());
    //                 // die;
    //             }

    //             $model->id_user = $modelUser->id;
    //             $model->status = '10';
    //             $model->create_at = date('Y-m-d H:i:s');
    //             if ($model->save()){
    //             }else{
    //                 // print_r($model->getErrors()); die;
    //             }

    //             return $this->redirect(['index']);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //         $modelUser->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //         'modelUser' => $modelUser,
    //     ]);
    // }

    public function actionCreate()
    {
        $model = new Teknisi();
        $model->create_at = date('Y-m-d H:i:s');

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
                $modelUser->role = 'teknisi';
                if ($modelUser->save(false)) {
                    $model->id_user = $modelUser->id;
                    $model->status = '10';
                    $model->point = 0;

                    $model->_cv = UploadedFile::getInstance($model, '_cv');
                    $model->_foto = UploadedFile::getInstance($model, '_foto');

                    if ($model->_cv) {
                        $cvName = 'cv_' . time() . '.' . $model->_cv->extension;
                        $model->_cv->saveAs(Yii::getAlias('@app/uploads/cv/') . $cvName);
                        $model->cv = $cvName;
                    }

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

    public function actionCreate2()
    {
        $model = new Teknisi();
        $model->create_at = date('Y-m-d H:i:s');

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
                $modelUser->role = 'operator';
                if ($modelUser->save(false)) {
                    $model->id_user = $modelUser->id;
                    $model->status = '10';
                    $model->point = 0;

                    $model->_cv = UploadedFile::getInstance($model, '_cv');
                    $model->_foto = UploadedFile::getInstance($model, '_foto');

                    if ($model->_cv) {
                        $cvName = 'cv_' . time() . '.' . $model->_cv->extension;
                        $model->_cv->saveAs(Yii::getAlias('@app/uploads/cv/') . $cvName);
                        $model->cv = $cvName;
                    }

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
     * Deletes an existing Teknisi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_teknisi Id Teknisi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_teknisi)
    {
        $this->findModel($id_teknisi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teknisi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_teknisi Id Teknisi
     * @return Teknisi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_teknisi)
    {
        if (($model = Teknisi::findOne(['id_teknisi' => $id_teknisi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
