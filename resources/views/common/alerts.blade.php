@if (Session::has('flash_message'))
<div class="container mt-md">
<div class="row">
  <div class="alert alert-success">
      <i class="fa fa-check"></i>
    {{ Session::get('flash_message') }}
  </div>
</div>
</div>
@endif