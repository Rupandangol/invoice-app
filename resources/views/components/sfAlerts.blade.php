@if(session('success'))
  <div class="alert alert-success">
    {{__(session('success'))}}
  </div>
@endif
@if(session('fail'))
<div class="alert alert-danger">
  {{__(session('fail'))}}
</div>
@endif