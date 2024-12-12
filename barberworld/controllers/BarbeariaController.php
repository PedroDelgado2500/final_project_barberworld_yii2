<?php

namespace app\controllers;
use Yii;
use app\models\Barbearia;
use app\models\Search\BarbeariaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\HttpException;//importar!!! em todos os controllers
use yii\filters\AccessControl;//importar!!! '' '' controllers

/**
 * BarbeariaController implements the CRUD actions for Barbearia model.
 */
class BarbeariaController extends Controller
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
                            'actions' => ['search', 'view'], 
                            'allow' => true,
                            'roles' => ['@'], //@ significa que só quem está logado pode realizar as ações inseridas!
                        ],
                        [
                            'actions' => ['index', 'view', 'create', 'update', 'delete', 'list-subscribed', 'search'],
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
                        ],
                    ],
                ],
    
    
            ]
        );
    }


    /**
     * Lists all Barbearia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BarbeariaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Barbearia model.
     * @param int $ID_Barbearia Id Barbearia
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_Barbearia)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_Barbearia),
        ]);
    }

    /**
     * Creates a new Barbearia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Barbearia();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_Barbearia' => $model->ID_Barbearia]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Barbearia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_Barbearia Id Barbearia
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_Barbearia)
    {
        $model = $this->findModel($ID_Barbearia);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_Barbearia' => $model->ID_Barbearia]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Barbearia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_Barbearia Id Barbearia
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_Barbearia)
    {
        $this->findModel($ID_Barbearia)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Barbearia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_Barbearia Id Barbearia
     * @return Barbearia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_Barbearia)
    {
        if (($model = Barbearia::findOne(['ID_Barbearia' => $ID_Barbearia])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página não existe!');
    }
    public function actionSearch()
{
    $searchModel = new BarbeariaSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->post());

    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
}

}
