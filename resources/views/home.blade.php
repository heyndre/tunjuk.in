@if(Auth::user()->privileged == '1')
@include ('dashboard')
<?php $nama = Auth::user()->name?>
@elseif (Auth::user()->privileged == '0')
@include ('index')
<?php $nama = Auth::user()->name?>
@endif
