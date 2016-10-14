// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#recherche').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: '/Projet2/ajax_traitement_autocompletion.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#list').show();
				$('#list').html(data);
			}
		});
	} else {
		$('#list').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#recherche').val(item);
	// hide proposition list
	$('#list').hide();
}