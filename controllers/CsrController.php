<?php

namespace vendor\istt\ticket\controllers;

use Yii;
use vendor\istt\ticket\models\Ticket;
use vendor\istt\ticket\models\TicketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CsrController implements the CRUD actions for Ticket model.
 */
class CsrController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
	    'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Ticket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TicketSearch;
        $param = Yii::$app->request->getQueryParams();
        $param['TicketSearch']['type'] = Ticket::TYPE_CSR;
        $dataProvider = $searchModel->search($param);

        return $this->render('indexTicket', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Ticket model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('viewTicket', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ticket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ticket;
        $model->type = Ticket::TYPE_CSR;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->validateDate();
        	if ($model->save())
            	return $this->redirect(['view', 'id' => $model->id]);
        	else
        		return \yii\helpers\VarDumper::dumpAsString($model->errors);
        } else {
        	$model->parseDate();
            return $this->render('createTicket', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ticket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->type = Ticket::TYPE_CSR;
            $model->validateDate();
        	if ($model->save())
            	return $this->redirect(['view', 'id' => $model->id]);
        	else
        		return \yii\helpers\VarDumper::dumpAsString($model->errors);
        } else {
        	$model->parseDate();
            return $this->render('updateTicket', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ticket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ticket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ticket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if ($id !== null && ($model = Ticket::find($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
