<h2><?php echo $topic['DiscussTopic']['name']; ?></h2>

<?php foreach ($topic['DiscussPost'] as $post): ?>
<div style="border-bottom: 1px solid black;"></div>
<div id="post<?php echo $post['id']; ?>" class="discussPost">
	<?php echo $html->link($post['title'], '/discuss/discuss_posts/view/' . $post['id']); ?><br/>
	<?php if (!empty($post['User']['username'])): ?>
	Posted by <?php echo $post['User']['username']; ?> on <?php echo $post['created']; ?>
	<?php else: ?>
	Posted by anonymous on <?php echo $post['created']; ?>
	<?php endif; ?>
</div>
<div id="postNumReplies<?php echo $post['id']; ?>" class="discussPostNumReplies">
	<?php echo $post['discuss_post_count']; ?>
</div>	
<div id="postLastReply<?php echo $post['id']; ?>" class="discussPostLastReply">
	<?php if (!empty($latestPosts[$post['id']]['Parent'])): ?>
		<?php echo $html->link($latestPosts[$post['id']]['Parent']['title'], '/discuss/discuss_posts/view/' . $latestPosts[$post['id']]['Parent']['id']);?><br/>
		<?php if (!empty($latestPosts[$post['id']]['User']['username'])): ?>
		Posted by <?php echo $latestPosts[$post['id']]['User']['username']; ?><br/>
		<?php else: ?>
		Posted by Anonymous<br/>		
		<?php endif; ?>
		<?php echo $latestPosts[$post['id']]['created']; ?>	
	<?php else: ?>
	No Replies Yet
	<?php endif; ?>
</div>
<div style="clear: both"></div>
<?php endforeach; ?>
<div style="border-bottom: 1px solid black;"></div><br/><br/>

<?php echo $html->link('Add New Post', '', array('onclick' => 'document.getElementById("addNewPost").style.display = ""; return false')); ?>
<div id="addNewPost" style="display: none; margin-top: 10px;">
<?php echo $form->create('DiscussPost'); ?>
<?php echo $form->hidden('discuss_topic_id', array('value' => $topic['DiscussTopic']['id'])); ?>
<?php echo $form->hidden('user_id', array('value' => $session->read('Auth.User.id'))); ?>
<?php echo $form->input('title'); ?>
<?php echo $form->input('content'); ?>
<?php echo $form->end('Submit'); ?>
</div>