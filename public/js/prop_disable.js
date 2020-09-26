$("form").submit(function () {
  $(":submit", this).prop("disabled", true);
});
