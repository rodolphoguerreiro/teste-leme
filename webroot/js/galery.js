$(document).on('change', '#fp-input', function() {
    makepreview(this, $(this).closest('#fp-upload'));

    if($(this).val() !== ''){
        var image = $('#fp-preview > img');
        var clear = $('#fp-actions #fp-clear');

        if(typeof $(clear).attr('data-holder') == 'undefined'){
            $(clear).attr('data-holder', $(image).attr('src'));
        }

        if($(this).val() != $(clear).data('holder')){
            $(clear).removeClass('disabled').removeAttr('disabled');
        }
    }
});

$(document).on('click', '#fp-clear', function() {
    var container = $(this).closest('#fp-upload');

    $(this).addClass('disabled').attr('disabled', 'true');
    $(container).find('#fp-actions > input').val('');
    $(container).find('#fp-preview > img').attr('src', $(container).find('#fp-clear').data('holder'));
});

$('#fp-upload-xhr').hover(function() {
    $(this).css({
        'position': 'relative',
        'cursor': 'pointer'
    }).append($('<div/>')
            .css({
                'background': 'rgba(51,51,51,0.6)',
                'position': 'absolute',
                'top': 0,
                'height': '100%',
                'width': '100%',
                'font-size': '60px',
                'text-align': 'center',
                'z-index': 9999
            }).addClass('d-flex')
                .append($('<span class="align-self-center text-white mx-auto"/>')
                    .html('<i class="far fa-image"></i>')));
}, function() {
    $(this).removeAttr('style').find('div').remove();
});

$(document).on('click', '#fp-upload-xhr', function() {
    let fp_upload = $(this);
    let $inputfile = $('<input/>').attr('type', 'file')
    let pathname = window.location.pathname.split('/');
    pathname[pathname.length-1] = 'upload';

    $inputfile.trigger('click');

    $inputfile.on('change', function(){
        var fd = new FormData();
        var image = $inputfile[0].files[0];

        fd.append('upload', image);

        $.ajax({
            url: pathname.join('/'),
            enctype: 'multipart/form-data',
            type: 'post',
            cache: false,
            contentType: false,
            processData: false,
            dataType:'json',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', getCookie('csrfToken'));
            },
            data: fd,
            success: (resp) => {
                if(typeof resp.url != 'undefined'){
                    $(fp_upload).find('img').attr('src', resp.url);
                }
            },
            error: (error) => {
                console.log(error);
            }
        });
    });
});

function thumbnail(container, image, multiple = false){
    if(multiple){
        // Multiple images
    }else{
        $(container).find('#fp-preview > img').attr('src', image);
    }
}

function makepreview(inputfile, container){
    if(window.File && window.FileList && window.FileReader){
        var multiple = $(inputfile).attr('multiple') ? true : false;

        for(var i = 0; i < inputfile.files.length; i++){
            var file = inputfile.files[i];
            if(!file.type.match('image.*')){
                continue;
            }
            if(file.size < 2097152){
                var reader = new FileReader();
                reader.onload = function (e) {
                    thumbnail(container, e.target.result, multiple);
                }
                reader.readAsDataURL(file);
            }else{
                alert("Tamanho da imagem é muito grande. O tamanho máximo é de 2MB.");
            }
        }
    }else{
        console.log('Seu navegador não suporta a API para upload de arquivo.');
    }
}
