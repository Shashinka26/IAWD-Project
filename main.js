(function($) {
    "use strict";

    // Spinner
    var spinner = function() {
        setTimeout(function() {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function() {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });


    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
                function() {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function() {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });

})(jQuery);


$(window).scroll(function() {
    if ($(this).scrollTop() > 150)
        $(".gotopbtn").addClass("active");
    else
        $(".gotopbtn").removeClass("active");
});
$(".gotopbtn").click(function() {
    $("html, body").animate({ scrollTop: 0 }, 800);
});

// *******************side bar*************************

$(document).ready(function() {
    // Show or hide the sticky footer button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 750) {
            $(".centernav").fadeIn(750);
        } else {
            $(".centernav").fadeOut(750);
        }
    });
});


// ======================================================================
// ======================================================================
// ======================================================================

$('.toggle-icon').click(function() {
    $(this).toggleClass('-checked');
});

$('.fa-circle-plus').click(function() {
    $(this).removeClass('fa-beat');
});