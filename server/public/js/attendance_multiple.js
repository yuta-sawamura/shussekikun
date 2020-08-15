$(function () {
  $('[name="check"]').change(function () {
    const full_name = $(this)
      .parents("tr")
      .find('input:hidden[name="full_name"]')
      .val();
    const user_id = $(this)
      .parents("tr")
      .find('input:hidden[name="user_id"]')
      .val();
    if ($(this).is(":checked")) {
      $("#attendanceMultipleModal")
        .find("ul")
        .append(
          '<li id="userId-' +
            user_id +
            '" class="mb-2 attendance-multiple-close"><p>' +
            full_name +
            '</p><button type="button" class="close" aria-label="Close"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button><input type="hidden" name="users[][user_id]" value="' +
            user_id +
            '"></li>'
        );
    } else {
      $("#userId-" + user_id).remove();
    }
  });
  $(document).on("click", ".attendance-multiple-close", function () {
    const user_id = $(this).find('[type="hidden"]').val();
    $("#checkbox-" + user_id).prop("checked", false);
    $(this).remove();
  });
});
