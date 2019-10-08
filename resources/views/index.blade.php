isi index

<div class="pull-right">
  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
     onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
    Log out
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
