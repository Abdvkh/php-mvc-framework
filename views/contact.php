<?php
/** @var $this \abubakr\phpmvc\View */
/** @var $model \app\models\ContactForm */

use abubakr\phpmvc\form\Form;
use abubakr\phpmvc\form\TextAreaField;

$this->title = 'Contact';
?>
<h1>Contact</h1>

<?php $form = Form::begin('', 'post');?>

    <?= $form->field($model, 'subject')?>
    <?= $form->field($model, 'email')?>
    <?= new TextAreaField($model, 'body') ?>

    <button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end()?>
