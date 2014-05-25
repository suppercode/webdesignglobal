<?php if ($model->description): ?>
<p class="description"><?php echo CHtml::encode($model->description); ?></p>
<?php endif; ?>

<?php $this->renderPartial('_results', array('model' => $model)); ?>

<?php if ($userVote->id): ?>
  <p id="pollvote-<?php echo $userVote->id ?>">
    You voted: <strong><?php echo $userChoice->label ?></strong>.<br />
    <?php
      if ($userCanCancel) {
        echo CHtml::ajaxLink(
          'Cancel Vote',
          array('/polls/pollvote/delete', 'id' => $userVote->id, 'ajax' => TRUE),
          array(
            'type' 		=> 'POST',
            'success' 	=> 'js:function(){window.location.reload();}',
          ),
          array(
            'class' 	=> 'cancel-vote btn btn-danger',
            'confirm' 	=> 'Are you sure you want to cancel your vote?'
          )
        );
      }
    ?>
  </p>
<?php else: ?>
  <p><?php echo CHtml::link('Vote', array('/polls/poll/vote', 'id' => $model->id), array('class'=>'btn btn-primary')); ?></p>
<?php endif; ?>
