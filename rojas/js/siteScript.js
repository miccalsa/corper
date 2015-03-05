var coverIndex;
var coverController;

function initCoverCarrousel(){
    coverController = setInterval(function(){
        coverIndex = coverIndex == 4 ? 0 : coverIndex + 1;
        if(coverIndex == 0){
            $('#coverSection').fadeOut(10);
            $('#coverSection').scrollLeft(0);
            $('#coverSection').fadeIn(1000);
        }else
            $('#coverSection').scrollTo($('li.cover').eq(coverIndex), 3000);
    }, 9000);
}

function stopCoverCarrousel(){
    clearInterval(coverController);
    coverIndex = 0;
}

function openPopup(){
    var link = $(this).attr('class');
    $('.content', '#popUp').empty();
    $('#popUp').fadeIn(800);
    $('aside', '#popUp').unbind('click').click(closePopup);
    stopCoverCarrousel();
    setTimeout(function(){
        $('.content', '#popUp').load(loadContent(link));
    }, 850);
    return false;
}

function closePopup(){
    $('#popUp').fadeOut(800);
    $('aside', '#popUp').unbind('click');
    initCoverCarrousel();
}

function openGallery(){
    $('.content', '#popUp').empty();
    $('#galeria').fadeIn(800);
    $('aside', '#galeria').unbind('click').click(closeGallery);
    stopCoverCarrousel();
    setTimeout(function(){
        $('.content', '#galeria').load('./galeria.html');
    }, 850);
    return false;
}

function closeGallery(){
    $('#galeria').fadeOut(800);
    $('aside', '#galeria').unbind('click');
    initCoverCarrousel();
}

function onStart(){
    coverIndex = 0;
    initCoverCarrousel();
    $('a', 'nav').not($('a.galeria')).click(openPopup);
    $('a.galeria').click(openGallery);
}

function loadContent(type){
    var path = '';

    switch(type){
        case 'productos':
            path = './productos.html';
            break;
        case 'servicios':
            path = './servicios.html';
            break;
        case 'salas':
            path = './salas.html';
            break;
        case 'contacto':
            path = './contacto.php';
            break;
    }

    return path;
}

$(document).ready(onStart);