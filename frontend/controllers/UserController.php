<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use app\models\UserSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['DELETE'],
                    'view' => ['GET'],
                    'create' => ['POST'],
                    'update' => ['PUT'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $users = User::find()->all();
        $result = [];
        foreach ($users as $user) {
            $result[] = $user->toArray();
        };
        Yii::info($result);

        return Json::encode($result);
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

//        return Json::encode($this->findModel($id));

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate( )
    {

        $model = new User();


        if (Yii::$app->request->bodyParams != null) {

            $request = Yii::$app->request->bodyParams;


            $model->load(Yii::$app->request->bodyParams, '');
            Yii::info($model->attributes);
            if (!$model->validate()) {
                Yii::error($model->errors);
                return Json::encode(['success' => false]);
            }
            $model->save();
            return Json::encode(['success' => true]);

            $model->username = $request['username'];
            $model->auth_key = $request['auth_key'];
            $model->password_hash = $request['password_hash'];
            $model->password_reset_token = $request['password_reset_token'];
            $model->email = $request['email'];
            $model->status = $request['status'];
            $model->created_at = $request['created_at'];
            $model->updated_at = $request['updated_at'];
             $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

//        Yii::info(Yii::$app->request->bodyParams,'hello');

        if (Yii::$app->request->bodyParams != null)  {



            $request = Yii::$app->request->bodyParams;

            $model->username = $request['username'];
            $model->auth_key = $request['auth_key'];
            $model->password_hash = $request['password_hash'];
            $model->password_reset_token = $request['password_reset_token'];
            $model->email = $request['email'];
            $model->status = $request['status'];
            $model->created_at = $request['created_at'];
            $model->updated_at = $request['updated_at'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
//        var_dump($id);
//        die();
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
