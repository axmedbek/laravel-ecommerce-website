@if(session()->has('message'))
   <div class="alert alert-{{ session('message_status') }}">
       {{ session('message') }}
   </div>
@endif
