function submitForm(type, val = null) {
  $("form")
    .find("#" + type)
    .val(val);
  $("#form").submit();
}
