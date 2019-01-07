<?
namespace app\controllers;


use app\models\Books;
use app\models\Cart;
use Yii;


class CartController extends AppController {

    public function actionAdd() {
        $id = Yii::$app->request->get('id');
        $books = Books::findOne($id);
        if(empty($books)) return false;
        vd($books);
    }
}