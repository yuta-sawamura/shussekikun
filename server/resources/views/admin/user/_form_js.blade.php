<script>
  $(function () {
    const defaultVal = $('[name=role]').val();
    shoWHideByRole(defaultVal);
  });

  $('[name=role]').change(function () {
    const val = $('[name=role]').val();
    shoWHideByRole(val);
  });

  const system_user = @json(App\Enums\User\Role::System);
  const organization_admin_user = @json(App\Enums\User\Role::Organization_admin);
  const store_share_user = @json(App\Enums\User\Role::Store_share);
  const normal_user = @json(App\Enums\User\Role::Normal);

  $('#user-submit').click(function(){
    const val = $('[name=role]').val();
    if (val == normal_user) {
      $('#email, #password').find($('input')).val('');
    }
  });

  function shoWHideByRole(val) {
    if (val == system_user || val == organization_admin_user) {
      $('#email, #password').show();
      $('#email, #password').find($('input')).prop('required', true);
      $('#store, #category').hide();
      $('#store, #category').find($('select')).prop('required', false).val('');
    } else if (val == store_share_user) {
      $('#email, #password, #store').show();
      $('#email, #password, #store').find($('input, select')).prop('required', true);
      $('#category').hide();
      $('#category').find($('select')).prop('required', false).val('');
    } else if (val == normal_user) {
      $('#store, #category').show();
      $('#store, #category').find($('select')).prop('required', true);
      $('#email, #password').hide();
      $('#email, #password').find($('input')).prop('required', false).val('');
    }
  }
</script>
