			</main>
			
			<?php if (!is_page('contact')) { ?>
				<div class="cta">
					<div class="container">
						<h1>Like what you see?</h1>
						<p>Click the link below to get in touch with the team.</p>
						<a href="<?php echo site_url('/contact'); ?>" class="button">Contact us</a>
					</div>
				</div>
			<?php } ?>

			<footer class="site-footer" role="contentinfo">
				<div class="container">
					<ul class="footer-links">
						<li><a href="<?php echo site_url('/terms'); ?>"<?php echo (is_page('terms') ? 'class="active"' : ''); ?>>Terms</a></li>
						<li><a href="<?php echo site_url('/privacy'); ?>"<?php echo (is_page('privacy') ? 'class="active"' : ''); ?>>Privacy</a></li>	
					</ul>
				</div>
			</footer>

			<div class="copyright">
				<div class="container">
					&copy; Bones <?php echo date('Y'); ?>. All Rights Reserved.
				</div>
			</div>

		</div>
		<?php wp_footer(); ?>
	</body>
</html>
