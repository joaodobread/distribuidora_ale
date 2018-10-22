(function($){
    $(function(){
        $('select').formSelect();
        $('.sidenav').sidenav({
			edge: 'left',
			draggable: true
        });
        // $(".button-collapse").sideNav();
        // $('.datepicker').pickadate();
        $('.modal').modal();
        $('.tabs').tabs();
    }); // end of document ready
})(jQuery); // end of jQuery name space