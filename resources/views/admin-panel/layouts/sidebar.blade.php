<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('dashboard') }}" class="site_title"><i class="fa fa-paw"></i> <span>{{ config('app.name') }}</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('default_user.png') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li class="{{ request()->routeIs('users.list') ? 'active' : '' }}">
                        <a href="{{ route('users.list') }}">
                            <i class="fa fa-users"></i> Users
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('products.*') ? 'active' : '' }} {{ request()->routeIs('products.*') ? 'open' : '' }}">
                        <a>
                            <i class="fa fa-product-hunt"></i> Products 
                            <span class="fa {{ request()->routeIs('products.*') ? 'fa-chevron-up' : 'fa-chevron-down' }}"></span>
                        </a>
                        <ul class="nav child_menu" style="{{ request()->routeIs('products.*') ? 'display: block;' : '' }}">
                            <li class="{{ request()->routeIs('products.create') ? 'current-page' : '' }}">
                                <a href="{{ route('products.create') }}">Create</a>
                            </li>
                            <li class="{{ request()->routeIs('products.list') ? 'current-page' : '' }}">
                                <a href="{{ route('products.list') }}">List</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Handle sidebar menu toggle
        $('.nav.side-menu > li:has(ul) > a').on('click', function(e) {
            e.preventDefault();
            var $parent = $(this).parent();
            var $chevron = $(this).find('.fa');
            
            // Check if this is an "active" page (should keep active class)
            var isActivePage = $parent.hasClass('active');
            
            if ($parent.hasClass('open')) {
                // Close the dropdown
                $parent.removeClass('open');
                $chevron.removeClass('fa-chevron-up').addClass('fa-chevron-down');
                $parent.find('> .nav.child_menu').slideUp(200);
                
                // If it's not an active page, remove active class too
                if (!isActivePage) {
                    $parent.removeClass('active');
                }
            } else {
                // Close other open menus
                $('.nav.side-menu > li.open').removeClass('open');
                $('.nav.side-menu > li.open > a > .fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');
                $('.nav.side-menu > li.open > .nav.child_menu').slideUp(200);
                
                // Open this menu
                $parent.addClass('open active');
                $chevron.removeClass('fa-chevron-down').addClass('fa-chevron-up');
                $parent.find('> .nav.child_menu').slideDown(200);
            }
        });
        
        // Prevent child menu clicks from closing the parent
        $('.nav.child_menu li a').on('click', function(e) {
            e.stopPropagation();
        });
        
        // Initialize the menu state on page load
        function initMenuState() {
            // If we're on a products page, make sure it's active and open
            if (window.location.href.indexOf('/products/') > -1) {
                $('.nav.side-menu > li:has(a i.fa-product-hunt)').addClass('active open');
                $('.nav.side-menu > li:has(a i.fa-product-hunt) > a > .fa').removeClass('fa-chevron-down').addClass('fa-chevron-up');
                $('.nav.side-menu > li:has(a i.fa-product-hunt) > .nav.child_menu').show();
            }
            
            // Initialize all active menus
            $('.nav.side-menu > li.active').each(function() {
                if ($(this).hasClass('open')) {
                    $(this).find('> a > .fa').removeClass('fa-chevron-down').addClass('fa-chevron-up');
                    $(this).find('> .nav.child_menu').show();
                }
            });
        }
        
        initMenuState();
    });
</script>
@endpush