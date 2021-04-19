<?php
	$award_type = get_field('award_type', $award_winner);
	$award_prize = get_field('award_prize', $award_winner);
	$student_name = get_field('student_name', $award_winner);
	$winning_project = get_field('winning_project', $award_winner);
	$description = get_field('description', $award_winner);
	
	$image = $winning_project->post_type == 'general_submission' ? get_field('submission', $winning_project)['image'] : get_field('thumbnail', $winning_project);
?>

<div class="award-item">
	<a href="" class="award-link">
		<picture class="award-image">
			<img class="lazyload" data-srcset="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
		</picture>
		<h3 class="award-title"><?php echo $award_type; ?></h3>
	</a>
	<p class="award-description"><?php echo $description; ?></p>
</div>