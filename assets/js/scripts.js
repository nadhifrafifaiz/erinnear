/*!
    * Start Bootstrap - Agency v6.0.1 (https://startbootstrap.com/template-overviews/agency)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-agency/blob/master/LICENSE)
    */
    (function ($) {
    "use strict"; // Start of use strict



    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html, body").animate(
                    {
                        scrollTop: target.offset().top - 72,
                    },
                    1000,
                    "easeInOutExpo"
                );
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $(".js-scroll-trigger").click(function () {
        $(".navbar-collapse").collapse("hide");
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $("body").scrollspy({
        target: "#mainNav",
        offset: 74,
    });

    // Collapse Navbar
    var navbarCollapse = function () {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
        }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);



    // ini JS kuh sendiri
    // <!-- Change name when upload edit profile picture -->

      $('.custom-file-input').on('change', function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });

      //change color t shirt Order
      $('#change-black').on({'click': function(){
          $('#gambar').attr('src','http://localhost/erinnear/assets/img/shirt_color/1.png');
        }
      });

      //change color t shirt Order
      $('#change-white').on({'click': function(){
          $('#gambar').attr('src','http://localhost/erinnear/assets/img/shirt_color/2.png');
        }
      });

      //change color t shirt Order
      $('#change-green').on({'click': function(){
          $('#gambar').attr('src','http://localhost/erinnear/assets/img/shirt_color/3.png');
        }
      });

      //change color t shirt Order
      $('#change-gray').on({'click': function(){
          $('#gambar').attr('src','http://localhost/erinnear/assets/img/shirt_color/4.png');
        }
      });
      //change color t shirt Order
      $('#change-red').on({'click': function(){
          $('#gambar').attr('src','http://localhost/erinnear/assets/img/shirt_color/5.png');
        }
      });
      //change color t shirt Order
      $('#change-navy').on({'click': function(){
          $('#gambar').attr('src','http://localhost/erinnear/assets/img/shirt_color/6.png');
        }
      });




      //  $(function() {
      //    $("#refresh").on("click", function() {
      //       $("#inidiv").load("index.html")
      //       return false;
      //   })
      // })

      $('#province').change(function(){
        var province_id = $('#province').val();
        if(province_id != '')
        {
          console.log("base_url('order/fetch_city')");
          $.ajax({
            url:"http://localhost/erinnear/order/fetch_city",
            method:"POST",
            data:{province_id:province_id},
            success:function(data)
            {
              $('#destination').html(data);
            }
          })
        }
      });











})(jQuery); // End of use strict
