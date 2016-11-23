var lpt_config = config.LimitPageTable;

function checkPT(role_class, inputfield_class, table_match, btn_match, limit) {
	var $existing = $('body' + role_class + ' ' + inputfield_class).find('td').filter(function() {
		return $(this).text() == table_match;
	});
	// Template add buttons
	var $tpl_button = $('body' + role_class + ' ' + inputfield_class).find('button[value="' + btn_match + '"]');
	if($existing.length > limit - 1) {
		$tpl_button.addClass('button-hide');
	} else {
		$tpl_button.removeClass('button-hide');
	}
	// Default add buttons
	var $default_button  = $('body' + role_class + ' ' + inputfield_class).find('button[value="' + lpt_config.addnew_text + '"]');
	if($(inputfield_class).find('tbody tr').length > limit - 1) {
		$default_button.addClass('button-hide');
	} else {
		$default_button.removeClass('button-hide');
	}
}
