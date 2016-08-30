<?php

use DevGroup\EventsSystem\helpers\EventHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var DevGroup\EventsSystem\models\EventEventHandler $model
 * @var yii\web\View $this
 */

\DevGroup\EventsSystem\assets\EventFormAsset::register($this);
$this->title = EventHelper::t($model->isNewRecord ? 'Create' : 'Update');
$this->params['breadcrumbs'][] = ['label' => EventHelper::t('Event handlers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php $form = ActiveForm::begin(); ?>
<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <?= $form->field($model, 'event_id')->dropDownList(\DevGroup\EventsSystem\models\Event::dropDownListWithGroup()) ?>
                <?= $form->field($model, 'event_handler_id')->dropDownList([]) ?>
                <?= $form->field($model, 'method')->dropDownList([]) ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?= $form->field($model, 'params')->widget('devgroup\jsoneditor\Jsoneditor') ?>
                <?= $form->field($model, 'is_active')->checkbox() ?>
                <?= $form->field($model, 'sort_order')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group pull-right">
            <?= Html::submitButton($this->title, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>