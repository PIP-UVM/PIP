<script>
$('select[name=optSection]').val() = 'other';

// Javascript to make the newSection content disappear if we don't need it
$('select[name=optSection]').change(function () {

	// If the select option is set to "other" fade in
	// Otherwise, fade out
    if ($(this).val() != 'other') {
        $( ".newSection" ).children().slideUp('fast');
    } else {
        $( ".newSection" ).children().slideDown('fast');
    }
});
</script>
