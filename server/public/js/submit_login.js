function submitLogin(role) {
  if (role === "organization_admin") {
    $("#login").find('input[name="email"]').val("sawamura1009+1@gmail.com");
    $("#login").find('input[name="password"]').val("12345678");
  } else if (role === "store_share") {
    $("#login").find('input[name="email"]').val("sawamura1009+2@gmail.com");
    $("#login").find('input[name="password"]').val("12345678");
  }
  $("#login").submit();
}
