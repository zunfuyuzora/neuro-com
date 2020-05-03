$('.pic-avatar').each(function() {
    //set size
    var th = $(this).height(),//box height
        tw = $(this).width(),//box width
        im = $(this).children('img'),//image
        ih = im.height(),//inital image height
        iw = im.width();//initial image width
    if (ih>iw) {//if portrait
        im.addClass('w-100').removeClass('h-100');//set width 100%
    } else {//if landscape
        im.addClass('h-100').removeClass('w-100');//set height 100%
    }
    //set offset
    var nh = im.height(),//new image height
        nw = im.width(),//new image width
        hd = (nh-th)/2,//half dif img/box height
        wd = (nw-tw)/2;//half dif img/box width
    if (nh<nw) {//if portrait
        im.css({marginLeft: '-'+wd+'px', marginTop: 0});//offset left
    } else {//if landscape
        im.css({marginTop: '-'+hd+'px', marginLeft: 0});//offset top
    }
});