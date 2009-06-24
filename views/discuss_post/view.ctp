<h2><?php echo $this->data['DiscussPost']['title']; ?></h2>
<div style="border-bottom: 1px solid black;"></div>
<div id="postUser<?php echo $this->data['DiscussPost']['id']; ?>" class="discussPostDetailsUser">
	<?php echo $html->image('http://www.gravatar.com/avatar/' . md5($this->data['User']['email']) . '.jpg'); ?><br/>
	
	<?php if (!empty($this->data['User']['username'])): ?>
	<strong><?php echo $this->data['User']['username'];?></strong>
	<?php else: ?>
	<strong>Anonymous</strong>
	<?php endif; ?>	
</div>
<div id="post<?php echo $this->data['DiscussPost']['id']; ?>" class="discussPostDetails">
	<?php if (!empty($this->data['User']['username'])): ?>
	Posted by <?php echo $this->data['User']['username']; ?> on <?php echo $this->data['DiscussPost']['created']; ?>
	<?php else: ?>
	Posted by anonymous on <?php echo $this->data['DiscussPost']['created']; ?>
	<?php endif; ?><br/><br/>
	
	<?php echo $this->data['DiscussPost']['content']; ?>
</div>
<div style="clear: both"></div>

<?php foreach ($this->data['Reply'] as $post): ?>
<div style="border-bottom: 1px solid black;"></div>
<div id="postLastReply<?php echo $post['id']; ?>" class="discussPostDetailsUser">
	<?php echo $html->image('http://www.gravatar.com/avatar/' . md5($post['User']['email']) . '.jpg'); ?><br/>
	<?php if (!empty($post['User']['username'])): ?>
	<strong><?php echo $post['User']['username'];?></strong>
	<?php else: ?>
	<strong>Anonymous</strong>
	<?php endif; ?>
</div>
<div id="post<?php echo $post['id']; ?>" class="discussPostDetails">
	<?php if (!empty($post['User']['username'])): ?>
	Posted by <?php echo $post['User']['username']; ?> on <?php echo $post['created']; ?>
	<?php else: ?>
	Posted by anonymous on <?php echo $post['created']; ?>
	<?php endif; ?><br/><br/>
	
	<?php echo $post['content']; ?>
</div>
<div style="clear: both"></div>
<?php endforeach; ?>
<div style="border-bottom: 1px solid black;"></div><br/><br/>

<?php echo $html->link('Reply to Post', '', array('onclick' => 'document.getElementById("addNewPost").style.display = ""; return false')); ?>
<div id="addNewPost" style="display: none; margin-top: 10px;">
<?php echo $form->create('DiscussPost', array('action' => 'add')); ?>
<?php echo $form->hidden('discuss_topic_id', array('value' => $this->data['DiscussPost']['discuss_topic_id'])); ?>
<?php echo $form->hidden('parent_id', array('value' => $this->data['DiscussPost']['id'])); ?>
<?php echo $form->hidden('user_id', array('value' => $session->read('Auth.User.id'))); ?>
<?php echo $form->input('content', array('value' => '', 'label' => '')); ?>
<?php echo $form->end('Submit'); ?>
</div>