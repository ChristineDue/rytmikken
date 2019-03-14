/**
 * Button Widget by Loomisoft - Admin JavaScript Routines
 * Copyright (c) 2017 Loomisoft (www.loomisoft.com)
 */

jQuery(function ($) {
	$(document).ready(function () {
		function updateColorPickers() {
			$('#widgets-right .ls-bw-color-picker').each(function () {
				var nearbyInput = $(this).closest('.ls-bw-form').find('.ls-bw-form-text').first();
				$(this).wpColorPicker({
					change:
						function (event, ui) {
							// This is a workaround to ensure that the widget is aware that the field has changed
							// by triggering a change event in a nearby text field and so the save button is enabled
							nearbyInput.trigger('change');
						},
					clear:
						function (event, ui) {
							// This is a workaround to ensure that the widget is aware that the field has changed
							// by triggering a change event in a nearby text field and so the save button is enabled
							nearbyInput.trigger('change');
						}
				});
			});
		}

		updateColorPickers();

		$(document).ajaxSuccess(function (e, xhr, settings) {
			if (settings) {
				if (settings.data) {
					if (settings.data.search) {
						if (settings.data.search('action=save-widget') != -1) {
							$('.color-field .wp-picker-container').remove();
							updateColorPickers();
						}
					}
				}
			}
		});

		$('.ls-bw-notice-hide-container').css('display', 'block');

		$('.ls-bw-notice-hide-link').on('click', function (event) {

			event.preventDefault();

			button_id = $(this).attr('id');
			if (button_id) {
				button_id = String(button_id);
				button_prefix = String('ls-bw-notice-hide-');
				button_prefix_length = button_prefix.length;
				if (button_id.substr(0, button_prefix_length) == button_prefix) {
					notice_id = button_id.substr(button_prefix_length, button_id.length - button_prefix_length);
					if (notice_id != '') {
						var data = {
							'action': 'ls_bw_hide_notice',
							'ls-bw-notice-hide': notice_id
						};

						$.post(ajaxurl, data, function (response) {
							if (response == 'ok') {
								$('#ls-bw-notice-' + notice_id).slideUp();
							}
						});
					}
				}
			}
		});
	});
});