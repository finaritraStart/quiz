 
    jQuery.ajax({
        type:'POST',
        url:'quiz/check',
        data:jQuery("#quiz-frm").serialize(),
        dataType:'json',    
        beforeSend: function () {
            jQuery('button#info-quiz').button('loading');
        },
        complete: function () {
            jQuery('button#info-quiz').button('reset');
            jQuery('#quiz-frm').find('textarea, input').each(function () {
                jQuery(this).val('');
            });
            setTimeout(function () {
                jQuery('span#success-msg').html('');
            }, 3000);
        },                
        success: function (json) {
           
           $('.text-danger').remove();
            if (json['error']) {
             
                for (i in json['error']) {
 
                  var element = $('.input-quiz-' + i.replace('_', '-'));
                  if ($(element).parent().hasClass('input-group')) {
                       
                    $(element).parent().after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                  } else {
                    $(element).after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                  }
                }
            } else {
                jQuery('span#success-msg').html('<div class="alert alert-success">Your form has been successfully submitted.</div>');
            }                       
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
