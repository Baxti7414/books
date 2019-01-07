if(window.screen.width > 800) {
    document.write('<script type="text/javascript" src="/js/slider/script1.js"><\/script>');
    document.write('<script type="text/javascript" src="/js/slider/script2.js"><\/script>');
    document.write('<script type="text/javascript" src="/js/slider/script3.js"><\/script>');
}

function diplay_hide (blockId){
    if ($(blockId).css('display') == 'none'){
        $(blockId).animate({height: 'show'}, 300);
    }else{
        $(blockId).animate({height: 'hide'}, 300);
    }
}

function diplay_hide1 (blockId){
    if ($(blockId).css('display') == 'none'){
        $('#menusub1').animate({height: 'show'}, 300);
        $('#korzinas').animate({height: 'hide'}, 300);
    }else{
        $('#menusub1').animate({height: 'hide'}, 300);
        $('#korzinas').animate({height: 'hide'}, 300);
    }
}

function diplay_hide2 (blockId){
    if ($(blockId).css('display') == 'none'){
        $('#menusub1').animate({height: 'hide'}, 300);
        $('#korzinas').animate({height: 'show'}, 300);
    }else{
        $('#menusub1').animate({height: 'hide'}, 300);
        $('#korzinas').animate({height: 'hide'}, 300);
    }
}