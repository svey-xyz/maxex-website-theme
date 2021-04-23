<?php
//
// Template Name: Contact Page
//

	$email_addresses = array();
	$title = get_the_title();

	if (have_rows('email_adresses')) {

		while (have_rows('email_adresses')) {
			the_row();
			$email_addresses[] = get_sub_field('email');

		}
	}

	if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$nameError = '* please enter your name';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		if(trim($_POST['phone']) === '')  {
			$phone = 'Phone number not provided.';
		} else {
			$phone = trim($_POST['phone']);
		}

		if(trim($_POST['email']) === '')  {
			$emailError = '* please enter your email address';
			$hasError = true;
		} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
			$emailError = '* you entered an invalid email address';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		if(trim($_POST['message']) === '') {
			$messageError = '* please enter a message';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$message = stripslashes(trim($_POST['message']));
			} else {
				$message = trim($_POST['message']);
			}
		}

		if(!isset($hasError)) {
			$subject = '[MaxEx Contact Form] From: '.$name;
			$body = "Name: $name \n\nPhone: $phone \n\nEmail: $email \n\nMessage: $message";
			$headers = 'From: '.$name.' <'.$email_addresses[0].'>' . "\r\n" . 'Reply-To: ' . $email;

			wp_mail($email_addresses, $subject, $body, $headers);
			$emailSent = true;
		}
	}

	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/blocks/blocks');
?>

<div id="post-<?php the_ID() ?>" class="contact-form-layout full-width-wrapper">
	<div class="max-width-container">
		<?php the_post() ?>

		<div class="entry-content block">
			<?php if(isset($hasError) || isset($captchaError)) { ?>
				<p class="error">Sorry, an error occured.<p>
			<?php } ?>
			<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
				<ul>
					<li>
						<label for="contactName">Name<span class="required-marker">*</span></label>
						<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField accent-colour" />
						<?php if($nameError != '') { ?>
							<span class="submit-error"><?=$nameError;?></span>
						<?php } ?>
					</li>
					<li>
						<label for="phone">Phone</label>
						<input type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" class="accent-colour" />
					</li>
					<li>
						<label for="email">Email<span class="required-marker">*</span></label>
						<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email accent-colour" />
						<?php if($emailError != '') { ?>
							<span class="submit-error"><?=$emailError;?></span>
						<?php } ?>
					</li>
					<li>
						<label for="messageText">Message<span class="required-marker">*</span></label>
						<textarea name="message" id="messageText" rows="20" cols="30" class="required requiredField accent-colour"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
						<?php if($messageError != '') { ?>
							<span class="submit-error"><?=$messageError;?></span>
						<?php } ?>
					</li>
					<li>
						<button type="submit" class="accent-colour">Send email</button>
					</li>
				</ul>
				<input type="hidden" name="submitted" id="submitted" value="true" />
				<?php if($emailSent == true): ?>
					<span class="submit-success">Message sent!</span>
				<?php endif; ?>
			</form>
		</div><!-- .entry-content -->

		<!-- <div class="logo-wrapper block">
			<?php get_template_part('template-parts/nav/logos'); ?>
		</div> -->
	</div>
</div>


<?php
	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>