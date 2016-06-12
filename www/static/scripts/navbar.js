$.ready(function () {
  $(".navbar button").click(function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(".navbar ul").removeClass("mobile-block");
    } else {
      $(this).addClass("active");
      $(".navbar ul").addClass("mobile-block");
    }
  });
});
