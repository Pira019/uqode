<?php
// defaults.
$vars = array(
	'message'       => '',
	'message_error' => '',
	'error_message' => '',
	'multi_id'      => '',
	'fields'        => array(),
);
/** @var array $template_vars */
foreach ( $template_vars as $key => $val ) {
	$vars[ $key ] = $val;
}
?>

<div class="forminator-integration-popup__header">

	<h3 id="forminator-integration-popup__title" class="sui-box-title sui-lg" style="overflow: initial; white-space: normal; text-overflow: initial;">
		<?php esc_html_e( 'Set Up Message', 'forminator' ); ?>
	</h3>

	<p id="forminator-integration-popup__description" class="sui-description"><?php esc_html_e( 'Configure message to be sent.', 'forminator' ); ?></p>

	<?php if ( ! empty( $vars['error_message'] ) ) : ?>
		<?php echo Forminator_Admin::get_red_notice( esc_html( $vars['error_message'] ) ); ?>
	<?php endif; ?>

</div>

<form>

	<div class="sui-form-field <?php echo esc_attr( ! empty( $vars['message_error'] ) ? 'sui-form-field-error' : '' ); ?>" style="margin: 0;">

		<label class="sui-label"><?php esc_html_e( 'Message', 'forminator' ); ?></label>

		<div class="sui-insert-variables">

			<textarea
				id="slack_message"
				class="sui-form-control"
				name="message"
				placeholder="<?php esc_attr_e( 'Message', 'forminator' ); ?>"
			><?php echo esc_html( $vars['message'] ); ?></textarea>

			<select class="sui-variables" data-textarea-id="slack_message">
				<?php foreach ( $vars['fields'] as $field ) : ?>
					<option value="{<?php echo esc_attr( $field['element_id'] ); ?>}" data-content="{<?php echo esc_attr( $field['element_id'] ); ?>}"><?php echo esc_html( strip_tags( $field['field_label'] ) ); ?></option>
				<?php endforeach; ?>
			</select>

		</div>

		<?php if ( ! empty( $vars['message_error'] ) ) : ?>
			<span class="sui-error-message"><?php echo esc_html( $vars['message_error'] ); ?></span>
		<?php endif; ?>

		<span class="sui-description">
			<?php
				printf(
				/* Translators: 1. Opening <a> tag with link to slack article link, 2. closing <a> tag. */
					esc_html__( 'You can format your message using Slack Flavored Markdown, find more information %shere%s.', 'forminator' ),
					'<a href="https://get.slack.help/hc/en-us/articles/202288908-how-can-i-add-formatting-to-my-messages" target="_blank">',
					'</a>'
				);
			?>
		</span>

		<span class="sui-description">
			<?php
			printf(
			/* Translators: 1. Opening <a> tag with link to the message attach link, 2. closing <a> tag. */
				esc_html__( 'By default sent message will include ALL FIELDS as attachment using Forminator Format to ease you up, more information about attachment can be found %shere%s.', 'forminator' ),
				'<a href="https://api.slack.com/docs/message-attachments" target="_blank">',
				'</a>'
			);
			?>
		</span>

	</div>

	<input type="hidden" name="multi_id" value="<?php echo esc_attr( $vars['multi_id'] ); ?>">

</form>
