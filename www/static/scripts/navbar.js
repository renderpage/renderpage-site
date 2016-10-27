$.ready(function () {
  $(".navbar button").click(function (e) {
    if ($(".navbar button").hasClass("active")) {
      $(".navbar button").removeClass("active");
      $(".navbar ul").removeClass("mobile-block");
    } else {
      $(".navbar button").addClass("active");
      $(".navbar ul").addClass("mobile-block");
      e.stopPropagation();
    }
  });
  $(document).click(function () {
    $(".navbar button").removeClass("active");
    $(".navbar ul").removeClass("mobile-block");
  });
});
