<?php

use app\models\Authors;
use app\models\Books;
use app\widgets\BooksList;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>hello world</h1>

<?= BooksList::widget(['authorId' => $id]);?>
