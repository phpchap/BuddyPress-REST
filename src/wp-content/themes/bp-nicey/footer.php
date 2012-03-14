		</div> <!-- #container -->
		
		<?php do_action( 'bp_after_container' ) ?>
	
		<div class="clear"></div>
	
		<?php do_action( 'bp_before_footer' ) ?>		

		<div id="footer">
		    <p class="alignright"><?php printf( __( '%s is proudly powered by <a href="http://mu.wordpress.org">WordPress MU</a> , <a href="http://buddypress.org">BuddyPress</a> &amp; <a href="http://buddydev.com">Bp Nicey</a> Theme ', 'buddypress' ), bloginfo('name') ); ?></p>
			<br class="clear" />
			<?php do_action( 'bp_footer' ) ?>
		</div>
</div><!-- end of page -->
		<?php do_action( 'bp_after_footer' ) ?>

		<?php wp_footer(); ?>
	
	</body>

</html>