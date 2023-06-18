// ini untuk body dan header
$(document).ready(function () {
  var lastScrollTop = 0;
  $(window).on("scroll", function () {
    var st = $(this).scrollTop();
    if (st) {
      $("header").addClass("bgc");
      $("ul").addClass("flex");
      $("i.bi-chevron-double-down").addClass("none");
      $("h1").addClass("heading1");
      $("h3").addClass("heading3");
      $("button.signin").addClass("tombol");
      $("div.header").addClass("row-header");
      $("form.search-header").removeClass("search");
      $("form.search-header").addClass("forms");
      $("span.or").addClass("span-header");
      $("input.haader-search").addClass("scroll-down");
      $("button.menu-togel").addClass("button-mobile");
    } else {
      $("button.menu-togel").removeClass("button-mobile");
      $("header").removeClass("bgc");
      $("ul").removeClass("flex");
      $("i.bi-chevron-double-down").addClass("none");
      $("h1").removeClass("heading1");
      $("h3").removeClass("heading3");
      $("button.signin").removeClass("tombol");
      $("div.header").removeClass("row-header");
      $("form.search-header").addClass("search");
      $('a[href="#home"]').addClass("none");
      $("form.search-header").removeClass("forms");
      $("input.header-search").removeClass("scroll-down");
    }
    if (st < lastScrollTop) {
      $("button.menu-togel").addClass("button-mobile");
      $("header").addClass("bgc");
      $("ul").addClass("flex");
      $("i.bi-chevron-double-down").addClass("none");
      $("h1").addClass("heading1");
      $("h3").addClass("heading3");
      $("button.signin").addClass("tombol");
      $("footer").removeClass("ftr");
      $("div.header").addClass("row-header");
      $("input.header-search").addClass("scroll-down");
    }
    lastScrollTop = st;
  });
});

/* default codingan 

$(document).ready(function () {
  $(window).on("scroll", function () {
    if ($(window).scrollTop()) {
      $("header").addClass("bgc");
      $("main").addClass("content");
      $("ul").addClass("flex");
      $("i").addClass("none");
      $("h1").addClass("heading1");
      $("h3").addClass("heading3");
      $("button").addClass("tombol");
    } else {
      $("header").removeClass("bgc");
      $("main").removeClass("content");
      $("ul").removeClass("flex");
      $("i").removeClass("none");
      $("h1").removeClass("heading1");
      $("h3").removeClass("heading3");
      $("button").removeClass("tombol");
    }
  });
});
*/
