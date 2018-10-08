(function($){
    $(function(){
        $('select').formSelect();
        $('.sidenav').sidenav({
			edge: 'left',
			draggable: true
		});
    }); // end of document ready
})(jQuery); // end of jQuery name space