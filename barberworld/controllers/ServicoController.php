<?php

namespace app\controllers;

use app\models\Servico;
use app\models\Reserva;
use app\models\Search\ServicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ServicoController implements the CRUD actions for Servico model.
 */
class ServicoController extends Controller
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
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['index', 'view', 'create', 'update', 'delete', 'list-subscribed'],
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                        [
                            'actions' => ['list'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['list-subscribed'],
                            'allow' => true,
                          //  'roles' => ['student'],
                        ],
                    ],
                ],
    
            ]
        );
    }

    /**
     * Lists all Servico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ServicoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (isset($this->request->queryParams['ServicoSearch']['Barbearia_ID'])) {
            $searchModel->Barbearia_ID = $this->request->queryParams['ServicoSearch']['Barbearia_ID'];
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servico model.
     * @param int $ID_Servico Id Servico
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_Servico)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_Servico),
        ]);
    }

    /**
     * Creates a new Servico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($servico_id = null)
{
    $model = new Reserva();
    if ($servico_id) {
        $model->Servico_ID = $servico_id;
    }

    if ($this->request->isPost) {
        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_Reserva' => $model->ID_Reserva]);
        }
    } else {
        $model->loadDefaultValues();
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}

    /**
     * Updates an existing Servico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_Servico Id Servico
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_Servico)
    {
        $model = $this->findModel($ID_Servico);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_Servico' => $model->ID_Servico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Servico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_Servico Id Servico
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_Servico)
    {
        $this->findModel($ID_Servico)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Servico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_Servico Id Servico
     * @return Servico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_Servico)
    {
        if (($model = Servico::findOne(['ID_Servico' => $ID_Servico])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
