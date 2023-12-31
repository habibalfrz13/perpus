<?php

namespace backend\controllers;


use backend\models\Feedback;
use backend\models\OrderDisplay;
use backend\models\User;
use backend\models\Teknisi;
use backend\models\FeedbackSearch;
use backend\models\OrderHistori;
use backend\models\Pelanggan;
use backend\models\PointHistory;
use backend\models\PointMaster;
use PhpParser\Node\Scalar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * FeedbackController implements the CRUD actions for Feedback model.
 */
class FeedbackController extends Controller
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
     * Lists all Feedback models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FeedbackSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = Feedback::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Feedback model.
     * @param int $id_feedback Id Feedback
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_feedback)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_feedback),
        ]);
    }

    /**
     * Creates a new Feedback model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $id_user = Yii::$app->user->identity->id;
        $orderid = OrderHistori::find()
            ->select('id_order')
            ->where(['id_user' => $id_user])
            ->orderBy(['id_order' => SORT_DESC])
            ->scalar();
        $idteknisi = OrderHistori::find()->select('id_teknisi')->where(['id_order' => $orderid])->scalar();
        $point = PointMaster::find()->select('jumlah_point')->where(['keterangan' => 'Feedback'])->scalar();
        $pointvalue = $point;
        $user = Yii::$app->user->identity;
        $model = new Feedback();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->id_user = $user->id;
                $model->id_order = $orderid;
                $model->id_teknisi = $idteknisi;
                $model->foto_feedback = UploadedFile::getInstance($model, 'foto_feedback');
                if ($model->foto_feedback) {
                    $fotoName = 'foto_' . time() . '.' . $model->foto_feedback->extension;
                    $model->foto_feedback->saveAs(Yii::getAlias('@app/uploads/fotofeedback/') . $fotoName);
                    $model->foto_feedback = $fotoName;
                }
                $model->create_at = date('Y-m-d H:i:s');
                $model->point = $point;
                if ($model->save(false)) {
                    $modelPelanggan = Pelanggan::find()->where(['id_user' => $model->id_user])->one();
                    $modelPelanggan->point += $pointvalue;
                    if ($modelPelanggan->save(false)) {
                        $historiPoint = new PointHistory();
                        $historiPoint->id_user = $id_user;
                        $historiPoint->point = $point;
                        $historiPoint->created_at = date('Y-m-d H:i:s');
                        $historiPoint->save(false);
                    }
                    return $this->redirect(['view', 'id_feedback' => $model->id_feedback]);
                } else {
                    print_r($model->getErrors());
                    die;
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Feedback model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_feedback Id Feedback
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_feedback)
    {
        $model = $this->findModel($id_feedback);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_feedback' => $model->id_feedback]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Feedback model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_feedback Id Feedback
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_feedback)
    {
        $this->findModel($id_feedback)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Feedback model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_feedback Id Feedback
     * @return Feedback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_feedback)
    {
        if (($model = Feedback::findOne(['id_feedback' => $id_feedback])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
