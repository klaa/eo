<div class="col align-middle @if(!$mobile) d-none d-md-block @else d-md-none pr-0 @endif">
    <div class="text-right">
        <div class="btn-group" role="group">
            <button id="userTopBtn" type="button" class="btn @if(!$mobile) bg-vang @else bg-blue2 @endif dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="far fa-user"></i> Nguyễn Hữu Khánh
            </button>
            <div class="dropdown-menu" aria-labelledby="userTopBtn">
              <a class="dropdown-item" href="#">{{ __('home.user_info') }}</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#">{{ __('home.logout') }}</a>
            </div>
        </div>
    </div>
</div>