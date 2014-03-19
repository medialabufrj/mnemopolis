Dropzone.options.myAwesomeDropzone = {
  paramName: "file",
  maxFilesize: 3,
  acceptedFiles: "image/*",
  dictInvalidFileType: "por favor, faça apenas upload de imagens",
  dictFileTooBig: "máximo de 3mb por imagem",
  init: function(){
    this.on("error", function(error, msg){
        $.growl.error({ title: "Erro", message: msg });
        if(_gaq) _gaq.push(['_trackEvent', 'mnemopolis', 'error', msg]);
    });
    this.on("success", function(error, msg){
        $.growl.notice({ title: "Obrigado!", message: "sua imagem foi enviada!" });
        if(_gaq) _gaq.push(['_trackEvent', 'mnemopolis', 'upload']);
    });
  }
};

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

        
    });

    /*$('.navbar a').click(function(e){
        e.preventDefault();
        router.setRoute($(this).attr('href'));
    });*/

    var routes = {
        '/': [menuActive],
        '/chips': [menuActive, function(){scrollTo('#chips');}],
        '/participar': [menuActive, function(){scrollTo('#participar');}],
        '/atlas': [menuActive, function(){scrollTo('#atlas');}]
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
    
    init_d3();

})(jQuery);

function init_d3(){

    var date_format = "%Y-%m-%d %H:%M";

    var margin = {top: 20, right: 50, bottom: 30, left: 50},
        width = 700 - margin.left - margin.right,
        height = 300 - margin.top - margin.bottom;

    var parseDate = d3.time.format(date_format).parse,
        bisectDate = d3.bisector(function(d) { return d.date; }).left;

    var x = d3.time.scale()
        .range([0, width]);

    var y = d3.scale.linear()
        .range([height, 0]);

    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left");

    var line = d3.svg.line()
        .x(function(d) { return x(d.date); })
        .y(function(d) { return y(d.images); });

    var svg = d3.select("#vis").append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
      .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    d3.csv("data.php", function(error, data) {
      var total = 0;
      data.forEach(function(d) {
        d.date = parseDate(d.date);
        d.images = +d.images;
        total+=d.images;
      });

      $('#total').text(total);

      data.sort(function(a, b) {
        return a.date - b.date;
      });

      x.domain([data[0].date, data[data.length - 1].date]);
      y.domain(d3.extent(data, function(d) { return d.images; }));

      svg.append("g")
          .attr("class", "x axis")
          .attr("transform", "translate(0," + height + ")")
          .call(xAxis);

      svg.append("g")
          .attr("class", "y axis")
          .call(yAxis)
        .append("text")
          .attr("transform", "rotate(-90)")
          .attr("y", 6)
          .attr("dy", ".71em")
          .style("text-anchor", "end")
          .text("Imagens");

      svg.append("path")
          .datum(data)
          .attr("class", "line")
          .attr("d", line);

      var focus = svg.append("g")
          .attr("class", "focus")
          .style("display", "none");

      focus.append("circle")
          .attr("r", 4.5);

      focus.append("text")
          .attr("x", 9)
          .attr("dy", ".35em");

      svg.append("rect")
          .attr("class", "overlay")
          .attr("width", width)
          .attr("height", height)
          .on("mouseover", function() { focus.style("display", null); })
          .on("mouseout", function() { focus.style("display", "none"); })
          .on("mousemove", mousemove);

      function mousemove() {
        var x0 = x.invert(d3.mouse(this)[0]),
            i = bisectDate(data, x0, 1),
            d0 = data[i - 1],
            d1 = data[i],
            d = x0 - d0.date > d1.date - x0 ? d1 : d0;
        focus.attr("transform", "translate(" + x(d.date) + "," + y(d.images) + ")");
        focus.select("text").text(d.images);
      }
    });
}

