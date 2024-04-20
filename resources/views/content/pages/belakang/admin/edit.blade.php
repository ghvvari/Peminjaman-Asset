<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
    <form action="{{ route('admin.update', $admin->id)}}" method="POST" id="formUpdate{{ $admin->id }}">
  <div class="row">
      @csrf
    <div class="col mb-3">
      <label class="form-label" for="language">Username</label>
      <select class="select2" id="editusername" name="username" data-style="btn-transparent" data-icon-base="ti" data-tick-icon="ti-check text-white">
        {{-- <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option> --}}
        @foreach ($karyawan as $item)
        <option value="{{ $item->username }}" {{ ($item->username == $admin->username)?'selected':'' }}>{{$item->username}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" disabled id="editpassword" name="password" class="form-control" data-route="{{ route('getData') }}" placeholder="Enter Password">
    </div>
</div>

<div class="row">
  <div class="col mb-3">
    <label for="nameBasic" class="form-label">Email</label>
    <input type="text" readonly id="editemail" name="email" class="form-control" placeholder="Enter Name">
  </div>
</div>
    <div class="row">
      <div class="col mb-3">
        <label for="nameBasic" class="form-label">Level</label>
        <input type="text" id="nameBasic" name="level" class="form-control" readonly placeholder="Enter Name" value="admin">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary btn-submit" data-form="#formUpdate{{ $admin->id }}">Save changes</button>
  </div>
</form>
</div>


<script>
  $('.btn-submit').on('click', function(e) {
    e.preventDefault();
    let idForm = $(this).data('form');
    let form = $(idForm);
    form.submit();
  });

  $('#editusername').change(function() {
    console.log('ada');
  var username = $(this).val();
  let routeGetData = $('#editpassword').data('route');

  $.ajax({
      url: routeGetData,
      method: 'GET',
      data: {
          username: username
      },
      success: function (response) {
          $('#editpassword').val(response.password);
          $('#editemail').val(response.email);
      },
      error: function (xhr, status, error) {
          console.error(xhr);
      }
  });
});
</script>
