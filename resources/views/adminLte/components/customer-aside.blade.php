<!--begin::Aside-->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    background-image: linear-gradient(to bottom, #012642, #2c3c935d), /* Deep Yellow Transparent Overlay */
                      url('https://www.expressunload.com/wp-content/uploads/2024/02/shutterstock_426744064-scaled-1.jpg'); /* Background Image */
    background-size: cover;
    background-position: center;
    /* Remove background-blend-mode: overlay; */
    backdrop-filter: blur(30px);
    -webkit-backdrop-filter: blur(30px);
    border: none;
    width: 300px; /* Make it wider */
    border-top-right-radius: 10%;
">
    <!-- Logo Container -->
    <div class="aside-logo flex-column-auto brand-link" id="kt_aside_logo" style="
        padding: 1.5rem;
        text-align: center;
    ">
        @php
            $model = App\Models\Settings::where('group', 'general')->where('name','system_logo')->first();
        @endphp
        <a href="{{ aurl('/') }}" style="display: inline-block;">
            <img src="{{ $model->getFirstMediaUrl('system_logo') ? $model->getFirstMediaUrl('system_logo') : asset('assets/lte/cargo-logo-white.svg') }}" alt="Logo" style="height: 50px; filter: drop-shadow(0 2px 5px rgba(0, 191, 255, 0.5));" class="logo" />
        </a>
    </div>

    <div class="sidebar" style="padding-top: 1rem;">
        <!--begin::Aside menu-->
        <nav class="mt-2" style="padding-bottom: 30px !important;">
            <!--begin::Aside Menu-->
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

                <li class="nav-header" style="
                    padding: 0.75rem 1rem;
                    font-size: 0.8rem;
                    text-transform: uppercase;
                    color: #00bfff;
                    letter-spacing: 0.5px;
                    margin-top: 1rem;
                ">
                MENU

                </li>


                @if (app('hook')->get('aside_menu'))
                    @foreach (aasort(app('hook')->get('aside_menu'), 'order') as $componentView)
                        {!! $componentView !!}
                    @endforeach
                @endif

                
                
            </ul>
        </nav>
        <!--end::Aside menu-->
    </div>... <!-- Custom bottom decoration -->
    <div style="position: sticky; bottom: 0; left: 0; right: 0; height: 60px; background: linear-gradient(to top, rgba(0,0,0,0.3), transparent); pointer-events: none;"></div>
</aside>
<!--end::Aside-->

<style>
.main-sidebar {
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

/* Enhanced Glassmorphism */
.main-sidebar {
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
}

.aside-logo {
    border-bottom: none !important;
}

/* Streamlined Menu Items */
.nav-link {
    padding: 0.7rem 1rem;
    margin: 0.3rem 1rem;
    border-radius: 12px;
    color: #343a40 !important;
    font-weight: 500;
    transition: background-color 0.3s ease, transform 0.2s ease;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.nav-link i.nav-icon {
    margin-right: 0.75rem;
    font-size: 1rem;
    width: 20px;
    text-align: center;
}

.nav-link:hover {
    background-color: rgba(0, 191, 255, 0.2) !important;
    transform: translateX(3px);
}

.nav-link.active {
    background-color: rgba(0, 191, 255, 0.3) !important;
    font-weight: 600;
}

/* No borders on active or hover */
.nav-link.active::before,
.nav-link:hover::before {
    display: none;
}

/* Streamlined Submenu */
.nav-treeview {
    background: rgba(0, 191, 255, 0.07);
    border-radius: 10px;
    margin: 0.5rem 0;
}

.nav-treeview .nav-link {
    margin: 0.2rem 1.5rem;
    padding: 0.6rem 1rem;
    font-size: 0.85rem;
}

/* Dashboard Shortcut Styling */
.dashboard-shortcut {
    background: rgba(0, 191, 255, 0.1) !important;
    border-radius: 15px;
    margin: 0.5rem 1rem;
    padding: 0.75rem 1rem;
    text-align: left;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    color: #343a40 !important;
    font-weight: 500;
}

.dashboard-shortcut:hover {
    background: rgba(0, 191, 255, 0.3) !important;
    transform: scale(1.03);
}

.dashboard-shortcut i {
    margin-right: 0.75rem;
    font-size: 1.1rem;
}

/* Clean Scrollbar */
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.05);
    border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb {
    background: rgba(0, 191, 255, 0.2);
    border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(0, 191, 255, 0.4);
}

/* Subtle Menu Expansion */
.nav-treeview {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
}

.menu-is-opening > .nav-treeview,
.menu-open > .nav-treeview {
    max-height: 800px;
    transition: max-height 0.35s ease-in;
}... /* General adjustments for a modern look */
p {
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
    line-height: 1.4;
}

/* Animation Keyframes */
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.fa-bell {
    animation: pulse 2s infinite;
}

/* Remove bullets from lists */
.nav-sidebar .nav-treeview > .nav-item > .nav-link > p {
    margin: 0;
    display: inline-block;
}

.nav-sidebar .nav-treeview > .nav-item > .nav-link {
    padding: .5rem 1rem;
}
</style>
