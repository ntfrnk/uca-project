

/**
 * Confirmación para eliminar un usuario
 **/

window.delete_user = function(element) {
	var form = document.getElementById(element);
	if(confirm('Seguro quieres eliminar este usuario?')){
		form.submit();
	}
}


/**
 * Confirmación para eliminar un curso
 **/

window.delete_course = function(element) {
	var form = document.getElementById(element);
	if(confirm('Seguro quieres eliminar este curso?')){
		form.submit();
	}
}


window.onload = function() {

	 /**
	 * Alternar entre tabs de settings
	 **/

	var tabs = document.querySelectorAll('.tab');

	tabs.forEach((item) => {

		item.addEventListener('click', function(e){

			hideAll();

			e.target.classList.add('active');
			var tabId = e.target.getAttribute('rel');

			document.getElementById(tabId).classList.add('show');
			document.getElementById(tabId).classList.add('active');

		});

	});

}

const hideAll = () => {
	var tabs = document.querySelectorAll('.tab');
	tabs.forEach((item) => {
		item.classList.remove('active');
		var tab = item.getAttribute('rel');
		document.getElementById(tab).classList.remove('show');
		document.getElementById(tab).classList.remove('active');
	});
}