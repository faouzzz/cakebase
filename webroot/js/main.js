$(document).ready(function(){

    init = function(){
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
    }

    /*Ajax calls effects*/
    $('body').ajaxStart(function(){
        $('body').addClass('loading');
    });
    $('body').ajaxComplete(function(){
        $('body').removeClass('loading');
    });
    if($.pjax){
        //we want nearly all links to be pjax...
        //not sure why using the .not() cannot be used with $.fn.live() which
        //is used in the pjax function
        $('a:not([data-pjax="false"]):not([data-toggle="confirm"]):not(.modal a)').pjax('#main');

        $('#main').on('pjax:beforeRender', function(event, data){
            data = $.parseJSON(data);
            document.title = $.trim(data.title)
            $('.alert.alert-block').remove();
            $('#main').html(data.content);

            if(data.hook_current_actions){
                $("#sidebar .nav-header.current-actions").nextUntil(".nav-header").remove();
                $("#sidebar .nav-header.current-actions").show().after(data.hook_current_actions);
            }else{
                //if no hook content is set remove all the html
                $("#sidebar .nav-header.current-actions").nextUntil(".nav-header").remove();
                $("#sidebar .nav-header.current-actions").hide();
            }
            if(data.hook_related_actions){
                $("#sidebar .nav-header.related-actions").nextUntil(".nav-header").remove();
                $("#sidebar .nav-header.related-actions").show().after(data.hook_related_actions);
            }else{
                //if no hook content is set remove all the html
                $("#sidebar .nav-header.related-actions").nextUntil(".nav-header").remove();
                $("#sidebar .nav-header.related-actions").hide();
            }

            //need to make sure that we re-apply javascript
            init();

            return false;
        });
	}//end pjax if
	//
    //initialize the javascript
    init();

});