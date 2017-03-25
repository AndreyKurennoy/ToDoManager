/**
 * Ждем, когда прогрузится страница
 */
$(function () {
    $(document).ready(function () {
        $(document).on("click", '.modal-backdrop', popup_close);
    });
});


function popup(title,content,width)
{
    var modal_width = width || 600;
    $('.modal').remove();
    var modal =
        '<div class="modal fade">\
          <div class="modal-dialog">\
           <div class="modal-content">\
            <div class="modal-header">\
            <div class="table-header">\
        <button aria-hidden="true" data-dismiss="modal" class="close" data-action="close" type="button">\
        </button>\
        '+title+'</div>\
            </div>\
             <div class="modal-body">\
                '+content+'\
				 </div>\
			  </div>\
			 </div>\
			</div>';

    modal = $(modal).appendTo('body');
    modal.find('.modal-dialog').width(modal_width);
    modal.find('button[data-action=close]').on('click', function(){
        modal.modal("hide");
        $('.modal-backdrop').hide();
    });
    modal.modal('show').on('hidden', function(){
        modal.remove();
    });
}

function popup_close()
{
    $('button[data-action=close]').click();
    enableBodyScroll();
}


(function($){
    $.fn.serializeObject = function(){

        var self = this,
            json = {},
            push_counters = {},
            patterns = {
                "validate": /^[a-zA-Z][a-zA-Z0-9_]*(?:\[(?:\d*|[a-zA-Z0-9_]+)\])*$/,
                "key":      /[a-zA-Z0-9_]+|(?=\[\])/g,
                "push":     /^$/,
                "fixed":    /^\d+$/,
                "named":    /^[a-zA-Z0-9_]+$/
            };


        this.build = function(base, key, value){
            base[key] = value;
            return base;
        };

        this.push_counter = function(key){
            if(push_counters[key] === undefined){
                push_counters[key] = 0;
            }
            return push_counters[key]++;
        };

        $.each($(this).serializeArray(), function(){

            // skip invalid keys
            if(!patterns.validate.test(this.name)){
                return;
            }

            var k,
                keys = this.name.match(patterns.key),
                merge = this.value,
                reverse_key = this.name;

            while((k = keys.pop()) !== undefined){

                // adjust reverse_key
                reverse_key = reverse_key.replace(new RegExp("\\[" + k + "\\]$"), '');

                // push
                if(k.match(patterns.push)){
                    merge = self.build([], self.push_counter(reverse_key), merge);
                }

                // fixed
                else if(k.match(patterns.fixed)){
                    merge = self.build([], k, merge);
                }

                // named
                else if(k.match(patterns.named)){
                    merge = self.build({}, k, merge);
                }
            }

            json = $.extend(true, json, merge);
        });

        return json;
    };
})(jQuery);
