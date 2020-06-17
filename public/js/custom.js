// $(".pic-avatar").each(function() {
//     //set size
//     var th = $(this).height(), //box height
//         tw = $(this).width(), //box width
//         im = $(this).children("img"), //image
//         ih = im.height(), //inital image height
//         iw = im.width(); //initial image width
//     if (ih > iw) {
//         //if portrait
//         im.addClass("w-100").removeClass("h-100"); //set width 100%
//     } else {
//         //if landscape
//         im.addClass("h-100").removeClass("w-100"); //set height 100%
//     }
//     //set offset
//     var nh = im.height(), //new image height
//         nw = im.width(), //new image width
//         hd = (nh - th) / 2, //half dif img/box height
//         wd = (nw - tw) / 2; //half dif img/box width
//     if (nh < nw) {
//         //if portrait
//         im.css({ marginLeft: "-" + wd + "px", marginTop: 0 }); //offset left
//     } else {
//         //if landscape
//         im.css({ marginTop: "-" + hd + "px", marginLeft: 0 }); //offset top
//     }
// });

var avatar = document.getElementsByClassName('pic-avatar');

for (let i = 0; i < avatar.length; i++) {
    const x = avatar[i];
    
    let th = x.offsetHeight,
        tw = x.offsetWidth,
        im = x.childNodes[1],
        ih = im.offsetHeight,
        iw = im.offsetWidth;
    if(ih>iw){
        im.classList.add('w-100');
        im.style.height = "auto";
        im.classList.remove('h-100');
    }else {
        im.classList.add('h-100');
        im.style.width = "auto";
        im.classList.remove('w-100');
    }

    // var nh = im.offsetHeight,
    //     nw = im.offsetWidth,
    //     hd = (nh - th) / 2,
    //     wd = (nw - tw) / 2;
    // console.log(nh,nw,hd,wd,th,tw,ih,iw);
    // if (nh > nw) {
    //     im.style.marginLeft = "-"+ wd +"px";
    //     im.style.marginTop = 0+"px";
    // }else{
    //     im.style.marginTop = "-"+ hd +"px";
    //     im.style.marginLeft = 0+"px";
    // }
}