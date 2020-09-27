$(function ($) {
  $(".clickable-row")
    .css("cursor", "pointer")
    .click(function () {
      location.href = $(this).data("href");
    });
});
