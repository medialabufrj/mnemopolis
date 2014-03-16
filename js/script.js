function fadedEls(el, shift) {
    el.css('opacity', 0);

    switch (shift) {
        case undefined: shift = 0;
        break;
        case 'h': shift = el.eq(0).outerHeight();
        break;
        case 'h/2': shift = el.eq(0).outerHeight() / 2;
        break;
    }

    $(window).resize(function() {
        if (!el.hasClass('ani-processed')) {
            el.eq(0).data('scrollPos', el.eq(0).offset().top - $(window).height() + shift);
        }
    }).scroll(function() {
        if (!el.hasClass('ani-processed')) {
            if ($(window).scrollTop() >= el.eq(0).data('scrollPos')) {
                el.addClass('ani-processed');
                el.each(function(idx) {
                    $(this).delay(idx * 200).animate({
                        opacity : 1
                    }, 1000);
                });
            }
        }
    });
};

(function($) {
    $(function() {
        var videobackground = new $.backgroundVideo($('#bgVideo'), {
            "align" : "centerXY",
            "path" : "video/",
            "width": 1280,
            "height": 720,
            "filename" : "preview",
            "types" : ["mp4", "ogg", "webm"]
        });
        // Sections height & scrolling
        $(window).resize(function() {
            var sH = $(window).height();
            $('section.header-10-sub').css('height', (sH - $('header').outerHeight()) + 'px');
           // $('section:not(.header-10-sub):not(.content-11)').css('height', sH + 'px');
        });        

        // Parallax
        $('.parallax').each(function() {
            $(this).parallax('50%', 0.3, true);
        });

        /* For the section content-8 */
        if ($('.content-8').length > 0) {
            fadedEls($('.content-8'), 300);
        }

        /* For the section content-7 */

        if ($('.content-7').length > 0) {

            // Faded elements
            fadedEls($('.content-7'), 300);

            // Ani screen
            (function(el) {
                $('img:first-child', el).css('left', '-29.7%');

                $(window).resize(function() {
                    if (!el.hasClass('ani-processed')) {
                        el.data('scrollPos', el.offset().top - $(window).height() + el.outerHeight());
                    }
                }).scroll(function() {
                    if (!el.hasClass('ani-processed')) {
                        if ($(window).scrollTop() >= el.data('scrollPos')) {
                            el.addClass('ani-processed');
                            $('img:first-child', el).animate({
                                left : 0
                            }, 500);
                        }
                    }
                });
            })($('.screen'));
        }

       
        /*(function(el) {
            el.css('left', '-100%');

            $(window).resize(function() {
                if (!el.hasClass('ani-processed')) {
                    el.data('scrollPos', el.offset().top - $(window).height() + el.outerHeight());
                }
            }).scroll(function() {
                if (!el.hasClass('ani-processed')) {
                    if ($(window).scrollTop() >= el.data('scrollPos')) {
                        el.addClass('ani-processed');
                        el.animate({
                            left : 0
                        }, 500);
                    }
                }
            });
        })($('.content-11 > .container'));*/

        $(window).resize().scroll();

    });

    $(window).load(function() {
        $('html').addClass('loaded');
        $(window).resize().scroll();

        var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;

        $('#upload_btn').click(function(e) {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(this);
            var id = button.attr('id').replace('_button', '');
            _custom_media = true;
            wp.media.editor.send.attachment = function(props, attachment){
            if ( _custom_media ) {
                //$("#"+id).val(attachment.url);
            } else {
                return _orig_send_attachment.apply( this, [props, attachment] );
            };
        }

        wp.media.editor.open(button);
        return false;
        });

        $('.add_media').on('click', function(){
            _custom_media = false;
        });
    });

    /*$('.navbar a').click(function(e){
        e.preventDefault();
        router.setRoute($(this).attr('href'));
    });*/

    var routes = {
        '/': [menuActive],
        '/chips': [menuActive, function(){scrollTo('#chips');}],
        '/participar': [menuActive, function(){scrollTo('#participar');}]
    };

    var router = Router(routes);
    
    function menuActive(){
        var li, a;
        li = $('.navbar li');
        a = li.find('a[href="#/'+router.getRoute()+'"]');
        li.removeClass('active');
        a.parent('li').addClass('active');
    }

    function scrollTo(id){
        $('html, body').animate({
            scrollTop: $(id).offset().top -100
        },1000);
    }

    router.init('/');

    $('.social_connect_form a').click(function(e){
        router.setRoute('/participar');
    });
    

})(jQuery);

