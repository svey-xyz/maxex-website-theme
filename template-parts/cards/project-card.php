<?php
// 
// Project card
//

$student = get_field('student_name');
$image = get_field('thumbnail');
?>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

<div class="project-card">
	<a class="card-link" href="<?php echo get_permalink() ?>" title="<?php echo esc_attr(get_the_title()) ?>">
    	<div class="card-content">
			
			<div class="card-cover">
				<h3><?php echo the_title(); ?><br></h3>
				<p><?php echo $student; ?></p>
			</div>

			<?php if ($image) : ?>
				<picture class="card-image">
					<img srcset="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
				</picture>
			<?php endif ?>

      		<p class="student-name"><?php echo $student; ?></p>
    	</div>
  	</a>
</div>