<?php

namespace app\controllers;

use Yii;
use app\models\Permintaan;
use app\models\Ketua;
use app\models\Aplikasi;
use app\models\Surat;
use app\models\Pendaftar;
use app\models\PermintaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PermintaanController implements the CRUD actions for Permintaan model.
 */
class PermintaanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Permintaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PermintaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Permintaan model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Permintaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Permintaan();
        $model2 = new Ketua();
        $model3 = new Surat();
        $model4 = new Pendaftar();

        $model2->id_ketua = 0;
        $model3->kode_surat =0;
        $model4->id_pendaftar =0;
        if ($model->load(Yii::$app->request->post()) &&  
            $model2->load(Yii::$app->request->post()) && 
            $model3->load(Yii::$app->request->post()) &&
            $model4-> load(Yii::$app->request->post())) {
           // $dbTrans = Yii::$app->db->beginTransaction();
            if($model->save())
            {
                //$model->upload();
                $model2->id_ketua = $model->id_ketua;
                $model3->kode_surat = $model->kode_surat;
                //$model2->password = $model->nip_nik;
                if($model2->save())
                {
                    $model3->kode_surat = (string)$model->kode_surat;
                    if($model3->save())
                    {
                        $model4->id_pendaftar=(string)$model->id_pendaftar;
                        if($model4->save()){

                         $dbTrans->commit();
                        }
                        else
                        {
                            $dbTrans->rollBack();
                        }
                    }
                    else
                    {
                        $dbTrans->rollBack();
                    }
                }
                else
                {
                    $dbTrans->rollBack();
                }
            }
            else
            {
                $dbTrans->rollBack();
            }
            
            return $this->redirect(['view', 'id' => $model->id_pegawai]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
                'model3' => $model3,
                'model4' => $model4,
            ]);
        }
    }

    /**
     * Updates an existing Permintaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->kode_permintaan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Permintaan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Permintaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Permintaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Permintaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
