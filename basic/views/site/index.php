<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Мероприятия</h2>
                <ol>
                <?php foreach ( $rows as $row): ?>
                    <li><a href="/site/view/<?=$row->id?>"><?php echo $row->name; ?></a></li>
                <?php endforeach ?>
                </ol>
            </div>
        </div>

    </div>
</div>
