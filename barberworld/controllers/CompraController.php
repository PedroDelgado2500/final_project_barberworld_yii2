<?php

namespace app\controllers;

use app\models\Compra;
use app\models\CompraProduto;
use app\models\Produto;
use app\models\Search\CompraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends Controller
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
                            'actions' => ['index', 'view', 'create', 'update', 'delete', 'list-subscribed', 'process-payment'],
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
                            //'roles' => ['student'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Compra models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compra model.
     * @param int $ID_Compra Id Compra
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_Compra)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_Compra),
        ]);
    }

    /**
     * Creates a new Compra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Compra();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_Compra' => $model->ID_Compra]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Compra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_Compra Id Compra
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_Compra)
    {
        $model = $this->findModel($ID_Compra);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_Compra' => $model->ID_Compra]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Compra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_Compra Id Compra
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_Compra)
    {
        $this->findModel($ID_Compra)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Compra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_Compra Id Compra
     * @return Compra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_Compra)
    {
        if (($model = Compra::findOne(['ID_Compra' => $ID_Compra])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Process payment and register the purchase.
     * @return \yii\web\Response
     */
    public function actionProcessPayment()
    {
        $request = Yii::$app->request;
        $produtos = $request->post('produtos', []);

        $transaction = Yii::$app->db->beginTransaction();

        try {
            // Create new Compra
            $compra = new Compra();
            $compra->data_compra = date('Y-m-d H:i:s');
            $compra->save();

            // Save each product in CompraProduto
            foreach ($produtos as $produto) {
                $compraProduto = new Compra();
                $compraProduto->ID_Compra = $compra->ID_Compra;
                $compraProduto->ID_Produto = $produto['id'];
                $compraProduto->quantidade = $produto['quantity'];
                $compraProduto->preco = $produto['price'];
                $compraProduto->save();
            }

            $transaction->commit();
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
}
?>
