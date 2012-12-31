
	<div class="sidebarContainer">

	    <div class="sidebarMiddle">
			<?php
				$posts = Post::model()->findAll(array('condition'=>'parentid=4')) ;
				if(!empty($posts)): ?>

					<?php foreach ($posts as $post):?>
					<div class="father trigger <?php if($post->id==$data->id) echo 'active';?>">
					 	<a href="/post/ajaxview/<?php echo $post->id?>"><?php echo $post->title; ?></a>
					 	<span>&nbsp</span>
					 	<?php $postChidls = Post::model()->findAll(array('condition'=>'parentid='.$post->id));
					 		if(!empty($postChidls)):?>
					</div>
				 	<div class="toggle_container" style="display:none;">
				 		<?php foreach ($postChidls as $postChidl) {?>
				 			<div class="block">
								<div class="sub <?php if($postChidl->id==$data->id) echo 'active';?>">
									<a href="/post/ajaxview/<?php echo $postChidl->id?>"><?php echo $postChidl->title; ?></a>
									<span>&nbsp</span>
								</div>

								<div class="sub-child" style="display:none;">
									<div class="description"><?php echo $postChidl->description; ?></div>
									<div class="feature">
										<ul>
											<li><div class="text"></div>swipe file</li>
											<li><div class="video"></div> video</li>
											<li><div class="audio"></div>audio</li>
										</ul>
									</div>
								</div><!-- end sub-child -->
							</div>
				 		<?php } endif;?>
				 	</div>

					<?php endforeach; ?>
				<?php endif; ?>
	    </div>
	</div> <!--sidebarContainer end -->
	<div class="bodyContent">
		<div class="post">
			<div class="content">
				<?php
					echo $data->content;
				?>
			</div>
		</div>
	</div><!--bodyContent end -->

