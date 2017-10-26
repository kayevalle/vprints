// 

   
        var big_image;
        var transparent = true;
        var params_url = '';

        $().ready(function(){
            responsive = $(window).width();

            if (responsive >= 768){
                big_image = $('.parallax-image').find('img');

                $(window).on('scroll',function(){
                    parallax();
                    checkScroll();
                });
            }

            var coupon = getUrlParameter('coupon');
            var ref = getUrlParameter('ref');

            has_param = 0;

            $('[rel="tooltip"]').tooltip();

            if(coupon){
                addQSParm("coupon", coupon);
            }
            if(ref){
                addQSParm("ref", ref);
            }

            if(coupon){
                $('#buyButton').html('Buy now with 25% Discount');
            }

            if(ref || coupon){
                kit_link = $(".navbar-brand").attr('href');
                $(".navbar-brand").attr('href', kit_link + params_url);

                $('.navbar-right a').each(function(){
                    href = $(this).attr('href');
                    if(href != '#'){
                        $(this).attr('href',href + params_url);
                    }
                });
            }


        });

       var parallax = function() {
            var current_scroll = $(this).scrollTop();

            oVal = ($(window).scrollTop() / 3);
            big_image.css('top',oVal);
        };

        function getUrlParameter(sParam){
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++)
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam){
                    return sParameterName[1];
                }
            }
        }

        function addQSParm(name, value) {
            var re = new RegExp("([?&]" + name + "=)[^&]+", "");

            function add(sep) {
                params_url += sep + name + "=" + encodeURIComponent(value);
            }

            function change() {
                params_url = params_url.replace(re, "$1" + encodeURIComponent(value));
            }
            if (params_url.indexOf("?") === -1) {
                add("?");
            } else {
                if (re.test(params_url)) {
                    change();
                } else {
                    add("&");
                }
            }
        }

       function checkScroll(){
        	if($(document).scrollTop() > 260 ) {
                if(transparent) {
                    transparent = false;
                    $('nav[role="navigation"]').removeClass('navbar-transparent').addClass('navbar-default');
                }
            } else {
                if( !transparent ) {
                    transparent = true;
                    $('nav[role="navigation"]').addClass('navbar-transparent').removeClass('navbar-default');
                }
            }
        }

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-46172202-1', 'auto');
      ga('send', 'pageview');


 

  (function() {
    window._pa = window._pa || {};
    // _pa.orderId = "myOrderId"; // OPTIONAL: attach unique conversion identifier to conversions
    // _pa.revenue = "19.99"; // OPTIONAL: attach dynamic purchase values to conversions
    // _pa.productId = "myProductId"; // OPTIONAL: Include product ID for use with dynamic ads
    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.marinsm.com/serve/56026dc590a7b5bf54000030.js";
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
  })();
