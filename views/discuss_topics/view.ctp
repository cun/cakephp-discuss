<h2><?php echo $topic; ?></h2>

<?php foreach ($this->data as $post): ?>
<div style="border-bottom: 1px solid black;"></div>
<div id="post<?php echo $post['DiscussPost']['id']; ?>" class="discussPost">
	<?php echo $html->link($post['DiscussPost']['title'], '/discuss/discuss_posts/view/' . $post['DiscussPost']['id']); ?><br/>
	<?php if (!empty($post['User']['username'])): ?>
	Posted by <?php echo $post['User']['username']; ?> on <?php echo $post['DiscussPost']['created']; ?>
	<?php else: ?>
	Posted by anonymous on <?php echo $post['DiscussPost']['created']; ?>
	<?php endif; ?>
</div>
<div id="postNumReplies<?php echo $post['DiscussPost']['id']; ?>" class="discussPostNumReplies">
	<?php echo $post['DiscussPost']['discuss_post_count']; ?>
</div>	
<div id="postLastReply<?php echo $post['DiscussPost']['id']; ?>" class="discussPostLastReply">
	No Replies Yet
</div>
<div style="clear: both"></div>
<?php endforeach; ?>
<div style="border-bottom: 1px solid black;"></div><br/><br/>

<?php echo $html->link('Add New Post', '', array('onclick' => 'document.getElementById("addNewPost").style.display = ""; return false')); ?>
<div id="addNewPost" style="display: none; margin-top: 10px;">
<?php echo $form->create('DiscussPost'); ?>
<?php echo $form->hidden('discuss_topic_id', array('value' => $topicId)); ?>
<?php echo $form->hidden('user_id', array('value' => $session->read('Auth.User.id'))); ?>
<?php echo $form->input('title'); ?>
<?php echo $form->input('content'); ?>
<?php echo $form->end('Submit'); ?>
</div>