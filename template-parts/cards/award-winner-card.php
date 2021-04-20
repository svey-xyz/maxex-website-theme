<?php
	$award_type = get_field('award_type', $award_winner);
	$award_prize = get_field('award_prize', $award_winner);
	$winning_project = get_field('winning_project', $award_winner);
	$description = get_field('description', $award_winner);
	$link = get_post_permalink($winning_project);
	
	$image = get_field('thumbnail', $winning_project);
	$student_name = get_field('student_name', $winning_project);
	$project_title = $winning_project->post_title;

	if ($winning_project->post_type == 'general_submission') {
		$sub = get_field('submission', $winning_project);
		$image = $sub['image'];

		$theme_name = get_term(get_field('submission_theme', $winning_project))->slug;
		$link = "/general-submissions/?theme=" . $theme_name;

		$project_title = $sub['image_title'];
		$student_name = $sub['student_name'];
	}
?>

<div class="award-item">
	<a href="<?php echo $link; ?>" class="award-link">
		<picture class="award-image">
			<img class="lazyload" data-srcset="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
		</picture>
		<h3 class="student-name"><?php echo $student_name; ?>, &nbsp</h3>
		<h3 class="project-title"><?php echo $project_title; ?></h3>
	</a>
	
	<em><h3 class="award-title"><?php echo $award_type; ?></h3></em>
	
	<p class="award-description"><?php echo $description; ?></p>
</div>