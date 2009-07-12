<?php foreach ($this->data as $forum): ?>
<?php if (count($forum['DiscussTopic']) > 0): ?>
<div id="forum<?php echo $forum['DiscussForum']['id']; ?>" class="discussForum">
<h2><?php echo $forum['DiscussForum']['name']; ?></h2>
	<?php foreach ($forum['DiscussTopic'] as $topic): ?>
	<div style="border-bottom: 1px solid black;"></div>
	<div id="topic<?php echo $topic['id']; ?>" class="discussTopic">
		<?php echo $html->link($topic['name'], '/discuss/discuss_topics/view/' . $topic['id']); ?><br/>
		<?php echo $topic['description']; ?>
	</div>
	<div id="topicNumPosts<?php echo $topic['id']; ?>" class="discussTopicNumPosts">
		<?php echo $topic['discuss_post_count']; ?>
	</div>	
	<div id="topicLastPost<?php echo $topic['id']; ?>" class="discussTopicLastPost">
		<?php if (!empty($latestPosts[$topic['id']]['Parent'])) : ?>
			<?php echo $html->link($latestPosts[$topic['id']]['Parent']['title'], '/discuss/discuss_posts/view/' . $latestPosts[$topic['id']]['Parent']['id']);?><br/>
			<?php if (!empty($latestPosts[$topic['id']]['User']['username'])): ?>
			Posted by <?php echo $latestPosts[$topic['id']]['User']['username']; ?><br/>
			<?php else: ?>
			Posted by Anonymous<br/>		
			<?php endif; ?>
			<?php echo $latestPosts[$topic['id']]['DiscussPost']['created']; ?>
		<?php else: ?>
		No Posts Yet
		<?php endif; ?>
	</div>
	<div style="clear: both"></div>
	<?php endforeach; ?>
	<div style="border-bottom: 1px solid black;"></div>
</div>
<?php endif; ?>
<?php endforeach; ?>