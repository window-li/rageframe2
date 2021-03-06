<?php
use yii\helpers\Html;
use common\enums\StatusEnum;
?>

<div class="form-group">
    <?php echo Html::label($row['title'],$row['name'],['class' => 'control-label demo']);?>
    <?php if($row['is_hide_remark'] != StatusEnum::ENABLED){ ?>
        (<?php echo $row['remark']?>)
    <?php } ?>
    <div class="col-sm-push-10">
        <?php foreach ($option as $key => $v){ ?>
            <label class="radio-inline">
                <input type="radio" name="config[<?php echo $row['name']?>]" class="radio" value="<?php echo $key?>" <?php if($key == $row['value']){ ?>checked<?php } ?>><?php echo $v?>
            </label>
        <?php } ?>
    </div>
</div>