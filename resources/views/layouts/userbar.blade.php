<li class="nav-item">
  <a href="{{route('chat.index')}}" class="nav-link iconClass">
    <i class="fas fa-comments"></i>
    <span class="badge bg-danger notif-count">{{ auth()->user()->getMessageCount() }}</span>
    @if(auth()->user()->getMessageCount() > 0)
    @endif
  </a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="media align-items-center">
        <span>
          @php
            use App\Helpers\AuthCommon;
            $avatar = AuthCommon::user()->profile_picture;
            $avatar = $avatar != null ? asset('upload/'.$avatar) : asset('img/default-avatar.png');
          @endphp
          <img class="avatar avatar-sm rounded-circle" style="object-fit: cover" alt="Image placeholder" src="{{ $avatar }}">
        </span>
        <div class="media-body ml-2 d-none d-lg-block">
          <span class="mb-0 text-sm  font-weight-bold">{{ @\App\Helpers\AuthCommon::user()->username }}</span>
        </div>
      </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <div class="dropdown-header noti-title">
        <h6 class="text-overflow m-0">Welcome!</h6>
      </div>
      <div class="dropdown-divider"></div>
      <a href="{{ route('auth.logout') }}" class="dropdown-item">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
    </div>
  </li>