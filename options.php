<?php

function scc_options() {
	
	if (isset($_POST['scc_submit'])) {
		$q=0;
		
		if (isset($_POST['scc_member'])) {
			update_option('scc_member', $_POST['scc_member']);
			$q = 1;
		}
		else {
			update_option('scc_member', 0);
			$q = 1;
		}
		if (isset($_POST['scc_embedpdf'])) {
			update_option('scc_embedpdf',$_POST['scc_embedpdf']);
			$q = 1;
		}
		else {
			update_option('scc_embedpdf', 0);
			$q = 1;
		}
		if (isset($_POST['scc_note'])) {
			update_option('scc_note',$_POST['scc_note']);
			$q = 1;
		}
		else {
			update_option('scc_note', 0);
			$q = 1;
		}
		if (isset($_POST['scc_pirate'])) {
			update_option('scc_pirate',$_POST['scc_pirate']);
			$q = 1;
		}
		else {
			update_option('scc_pirate', 0);
			$q = 1;
		}
		if (isset($_POST['scc_youtube'])) {
			update_option('scc_youtube',$_POST['scc_youtube']);
			$q = 1;
		}
		else {
			update_option('scc_youtube', 0);
			$q = 1;
		}
		if (isset($_POST['scc_signoff'])) {
			update_option('scc_signoff',$_POST['scc_signoff']);
			$q = 1;
		}
		else {
			update_option('scc_signoff', 0);
			$q = 1;
		}
		if(isset($_POST['scc_signoff_content'])) {
			update_option('scc_signoff_content', $_POST['scc_signoff_content']);
			$q = 1;
		}
		else {
			update_option('scc_signoff_content', 0);
			$q = 1;
		}
		if(isset($_POST['scc_dashboard_widget'])) {
			update_option('scc_dashboard_widget', $_POST['scc_dashboard_widget']);
			$q = 1;
		}
		else {
			update_option('scc_dashboard_widget', 0);
		}
		if(isset($_POST['scc_posteditor_metabox'])) {
			update_option('scc_posteditor_metabox', $_POST['scc_posteditor_metabox']);
			$q = 1;
		}
		else {
			update_option('scc_posteditor_metabox', 0);
			$q = 1;
		}

		
		if ($q == 1) {
			global $update_options;
			$update_options = '<div id="message" class="updated">
			<p>Update <strong>Successful!</strong></p></div>';
		}
		else {
			global $update_options;
			$update_options = '<div id="message" class="updated"><p>Update <strong>Failed</strong></p></div>';
		}
	}
	
	$scc_options['member'] = get_option('scc_member');
	$scc_options['embedpdf'] = get_option('scc_embedpdf');
	$scc_options['note'] = get_option('scc_note');
	$scc_options['pirate'] = get_option('scc_pirate');	
	$scc_options['youtube'] = get_option('scc_youtube');
	$scc_options['signoff'] = get_option('scc_signoff');
	$scc_options['signoff_content'] = get_option('scc_signoff_content');
	$scc_options['dashboard_widget'] = get_option('scc_dashboard_widget');
	$scc_options['posteditor_metabox'] = get_option('scc_posteditor_metabox');
	
	if($scc_options['member'] == 1) {
		$scc_check['member'] = 'checked="checked"';
	}
	else {
		$scc_check['member'] = '';
	}
	if($scc_options['embedpdf'] == 1) {
		$scc_check['embedpdf'] = 'checked="checked"';
	}
	else {
		$scc_check['embedpdf'] = '';
	}
	if($scc_options['note'] == 1) {
		$scc_check['note'] = 'checked="checked"';
	}
	else {
		$scc_check['note'] = '';
	}
	if($scc_options['pirate'] == 1) {
		$scc_check['pirate'] = 'checked="checked"';
	}
	else {
		$scc_check['pirate'] = '';
	}
	if($scc_options['youtube'] == 1) {
		$scc_check['youtube'] = 'checked="checked"';
	}
	else {
		$scc_check['youtube'] = '';
	}
	if($scc_options['signoff'] == 1) {
		$scc_check['signoff'] = 'checked="checked"';
	}
	else {
		$scc_check['signoff'] = '';
	}
	if($scc_options['dashboard_widget'] == 1) {
		$scc_check['dashboard_widget'] = 'checked="checked"';
	}
	else {
		$scc_check['dashboard_widget'] = '';
	}
	if($scc_options['posteditor_metabox'] == 1) {
		$scc_check['posteditor_metabox'] = 'checked="checked"';
	}
	else {
		$scc_check['posteditor_metabox'] = '';
	}
	
	?>
	<div class="wrap">
		<div id="icon-scc" class="icon32"><br></div>
			<h2>Shortcode Collection Dashboard</h2>
			
			<?php scc_plugin_options_tabs(); ?>
			<br />
			<?php global $update_options; echo $update_options; ?>
			<div id="page">
			<h2>ShortCode Settings</h2>
			
			
			<form action="" method="post">
				<ul>
					<li>
						<label for="scc_member">Member Shortcode is</label>
						<a class="scc_member" name="scc_member" rel="popover" data-original-title="Member Shortcode" data-content="[member]This is member data![/member]. Data wraped in the shortcode can only be viewed by the members!">
							<input type="checkbox" class="scc" id="scc_member" name="scc_member" <?php echo $scc_check['member']; ?> data-on="ENABLED" data-off="DISABLED" value="<?php echo $scc_options['member']; ?>" />
						</a>
						<script>
							$(function () {
							  $("a.scc_member[rel=popover]")
								.popover({
								  offset: 20
								})
								.click(function(e) {
								  e.preventDefault()
								})
							})
						</script>
					</li>
					<li>
						<label for="scc_embedpdf">EmbedPdf Shortcode is</label>
						<a class="scc_embedpdf" name="scc_embedpdf" rel="popover" data-original-title="Embed Pdf Shortcode" data-content="[embedpdf url= height= width=]. Add the url of the Your Document. Fill in the height and width as you feel!">
							<input type="checkbox" class="scc" id="scc_embedpdf" name="scc_embedpdf" <?php echo $scc_check['embedpdf']; ?> data-on="ENABLED" data-off="DISABLED" value="<?php echo $scc_options['embedpdf']; ?>" />
						</a>
						<script>
							$(function () {
							  $("a.scc_embedpdf[rel=popover]")
								.popover({
								  offset: 20
								})
								.click(function(e) {
								  e.preventDefault()
								})
							})
						</script>
					</li>
					<li>
						<label for="scc_note">Note Shortcode is</label>
						<a class="scc_note" name="scc_note" rel="popover" data-original-title="Note Shortcode" data-content="[note]This is a note![/note]. It will become <div class='note'>This is a note!</div>">
							<input type="checkbox" class="scc" id="scc_note" name="scc_note" <?php echo $scc_check['note']; ?> data-on="ENABLED" data-off="DISABLED" value="<?php echo $scc_options['note']; ?>" />
						</a>
						<script>
							$(function () {
							  $("a.scc_note[rel=popover]")
								.popover({
								  offset: 20
								})
								.click(function(e) {
								  e.preventDefault()
								})
							})
						</script>
					</li>
					<li>
						<label for="scc_pirate">Pirate Talk Shortcode is</label>
						<a class="scc_pirate" name="scc_pirate" rel="popover" data-original-title="Pirate Shortcode" data-content="[pirate]This is pirate Talk. only pirates can understand![/pirate]. Now just copy this and paste it in the post or page and then view the post or page. Then you'll easily understand.">
							<input type="checkbox" class="scc" id="scc_pirate" name="scc_pirate" <?php echo $scc_check['pirate']; ?> data-on="ENABLED" data-off="DISABLED" value="<?php echo $scc_options['pirate']; ?>" />
						</a>
						<script>
							$(function () {
							  $("a.scc_pirate[rel=popover]")
								.popover({
								  offset: 20
								})
								.click(function(e) {
								  e.preventDefault()
								})
							})
						</script>
					</li>
					<li>
						<label for="scc_youtube">Youtube Shortcode is</label>
						<a class="scc_youtube" name="scc_youtube" rel="popover" data-original-title="Youtube Shortcode" data-content="[youtube value= width=430]. Put the url of the video in place of value default width is set to 430.">
							<input type="checkbox" class="scc" id="scc_youtube" name="scc_youtube" <?php echo $scc_check['youtube']; ?> data-on="ENABLED" data-off="DISABLED" value="<?php echo $scc_options['youtube']; ?>" />
						</a>
						<script>
							$(function () {
							  $("a.scc_youtube[rel=popover]")
								.popover({
								  offset: 20
								})
								.click(function(e) {
								  e.preventDefault()
								})
							})
						</script>
					</li>
					<li>
						<label for="scc_signoff">SignOff Text Shortcode is</label>
						<a class="scc_signoff" name="scc_signoff" rel="popover" data-original-title="Signoff Shortcode" data-content="[signoff]. Whatever you enter in the text box will appear wherever you place this shortcode!">
							<input type="checkbox" class="scc" id="scc_signoff" name="scc_signoff" <?php echo $scc_check['signoff']; ?> data-on="ENABLED" data-off="DISABLED" value="<?php echo $scc_options['signoff']; ?>" />
						</a>
						<script>
							$(function () {
							  $("a.scc_signoff[rel=popover]")
								.popover({
								  offset: 20
								})
								.click(function(e) {
								  e.preventDefault()
								})
							})
						</script>
					</li>
					<li>
						<label for="scc_signoff_content">SignOff Text Content</label>
						<a class="scc_signoff_content" name="scc_signoff_content" rel="popover" data-original-title="signoff Content" data-content="Enter the content which will appear instead of a shortcode.">
							<input type="text" class="scc" id="scc_signoff_content" name="scc_signoff_content" value="<?php echo $scc_options['signoff_content']; ?>" />
						</a>
						<script>
							$(function () {
							  $("a.scc_signoff_content[rel=popover]")
								.popover({
								  offset: 20
								})
								.click(function(e) {
								  e.preventDefault()
								})
							})
						</script>
					</li>
					<li>
						<label for="scc_dashboard_widget">Active shortcodes Dashboard Widget is</label>
						<a class="scc_dashboard_widget" name="scc_dashboard_widget" rel="popover" data-original-title="Dahboard widget" data-content="It will add a dashboard widget which list all the active shortcodes for your reference. Also it is visible to only to Blog Admins.">
							<input type="checkbox" class="scc" id="scc_dashboard_widget" name="scc_dashboard_widget" <?php echo $scc_check['dashboard_widget']; ?> data-on="ENABLED" data-off="DISABLED" value="<?php echo $scc_options['dashboard_widget']; ?>" />
						</a>
						<script>
							$(function () {
							  $("a.scc_dashboard_widget[rel=popover]")
								.popover({
								  offset: 20
								})
								.click(function(e) {
								  e.preventDefault()
								})
							})
						</script>
					</li>
					<li>
						<label for="scc_posteditor_metabox">Active shortcodes Post Editor MetaBox is</label>
						<a class="scc_posteditor_metabox" name="scc_posteditor_metabox" rel="popover" data-original-title="Post Editor MetaBox" data-content="It will add a Custom Meta Box to Your Post-Page Editor which list all the active shortcodes for your reference. Also it is visible to only to Blog Admins.">
							<input type="checkbox" class="scc" id="scc_posteditor_metabox" name="scc_posteditor_metabox" <?php echo $scc_check['posteditor_metabox']; ?> data-on="ENABLED" data-off="DISABLED" value="<?php echo $scc_options['posteditor_metabox']; ?>" />
						</a>
						<script>
							$(function () {
							  $("a.scc_posteditor_metabox[rel=popover]")
								.popover({
								  offset: 20
								})
								.click(function(e) {
								  e.preventDefault()
								})
							})
						</script>
					</li>
				</ul>
			<p class="submit" align="center">	
				<input type="submit" class="scc_submit" name="scc_submit" value="Save Changes" />
			</p>
			</form>
			
		</div>
	</div>
	<?php
}