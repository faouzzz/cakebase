$(document).ready(function(){

    //tooltips
    $('[rel="tooltip"]').tooltip()


    /**
     * This part create the modal dialogs, this should be rewritten
     * into a plugin at some point
     */

    /*$('[data-toggle="modal"]').click(function(e){
        e.preventDefault();
        $($(this).data('target')).find('h3').html($(this).data('modal-title'));
        $($(this).data('target')).find('p').html($(this).data('modal-content'));
        //$($(this).data('target')).find('a.continue').attr('href', $(this).attr('href'));
    });*/

    //cakephp will turn the post link that this works on into a form
    $('[data-toggle="confirm"]').attr('onClick', '');
    $('[data-toggle="confirm"]').click(function(e){
        e.preventDefault();
        confirm = $("#tmpl-modal-confirm").tmpl({
            title: $(this).data('modal-title'),
            content: $(this).data('modal-content'),
            action: $(this).attr('href')
        })
        .appendTo("body")
        .modal({})
        .on('hidden', function(){
            $(this).remove();
        })
    });
    /* End of confirm plugin */
    
    $('#login.modal').modal({backdrop: 'static'});

});