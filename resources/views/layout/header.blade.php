<div class="header-top-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-top-wraper">
                    <div class="row">
                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                            <div class="menu-switcher-pro">
                                <button type="button" id="sidebarCollapse"
                                    class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="educate-icon educate-nav"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                            {{-- <div class="header-top-menu tabl-d-n">
                                <ul class="nav navbar-nav mai-top-nav">
                                    <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                    </li>
                                    <li class="nav-item"><a href="#" class="nav-link">About</a>
                                    </li>
                                    <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                    </li>
                                    <li class="nav-item dropdown res-dis-nn">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link dropdown-toggle">Project
                                            <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                        <div role="menu" class="dropdown-menu animated zoomIn">
                                            <a href="#" class="dropdown-item">Documentation</a>
                                            <a href="#" class="dropdown-item">Expert Backend</a>
                                            <a href="#" class="dropdown-item">Expert FrontEnd</a>
                                            <a href="#" class="dropdown-item">Contact Support</a>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="header-right-info">
                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                    {{-- <li class="nav-item dropdown">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link dropdown-toggle"><i
                                                class="educate-icon educate-message edu-chat-pro"
                                                aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                        <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                            <div class="message-single-top">
                                                <h1>Message</h1>
                                            </div>
                                            <ul class="message-menu">
                                                <li>
                                                    <a href="#">
                                                        <div class="message-img">
                                                            <img src="{{ asset('assets/img/contact/1.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="message-content">
                                                            <span class="message-date">16 Sept</span>
                                                            <h2>Advanda Cro</h2>
                                                            <p>Please done this project as soon possible.
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="message-img">
                                                            <img src="{{ asset('assets/img/contact/4.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="message-content">
                                                            <span class="message-date">16 Sept</span>
                                                            <h2>Sulaiman din</h2>
                                                            <p>Please done this project as soon possible.
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="message-img">
                                                            <img src="{{ asset('assets/img/contact/3.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="message-content">
                                                            <span class="message-date">16 Sept</span>
                                                            <h2>Victor Jara</h2>
                                                            <p>Please done this project as soon possible.
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="message-img">
                                                            <img src="{{ asset('assets/img/contact/2.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="message-content">
                                                            <span class="message-date">16 Sept</span>
                                                            <h2>Victor Jara</h2>
                                                            <p>Please done this project as soon possible.
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="message-view">
                                                <a href="#">View All Messages</a>
                                            </div>
                                        </div>
                                    </li> --}}
                                    {{-- <li class="nav-item"><a href="#" data-toggle="dropdown" role="button"
                                            aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                class="educate-icon educate-bell" aria-hidden="true"></i><span
                                                class="indicator-nt"></span></a>
                                        <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                            <div class="notification-single-top">
                                                <h1>Notifications</h1>
                                            </div>
                                            <ul class="notification-menu">
                                                <li>
                                                    <a href="#">
                                                        <div class="notification-icon">
                                                            <i class="educate-icon educate-checked edu-checked-pro admin-check-pro"
                                                                aria-hidden="true"></i>
                                                        </div>
                                                        <div class="notification-content">
                                                            <span class="notification-date">16 Sept</span>
                                                            <h2>Advanda Cro</h2>
                                                            <p>Please done this project as soon possible.
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="notification-icon">
                                                            <i class="fa fa-cloud edu-cloud-computing-down"
                                                                aria-hidden="true"></i>
                                                        </div>
                                                        <div class="notification-content">
                                                            <span class="notification-date">16 Sept</span>
                                                            <h2>Sulaiman din</h2>
                                                            <p>Please done this project as soon possible.
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="notification-icon">
                                                            <i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="notification-content">
                                                            <span class="notification-date">16 Sept</span>
                                                            <h2>Victor Jara</h2>
                                                            <p>Please done this project as soon possible.
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="notification-icon">
                                                            <i class="fa fa-line-chart edu-analytics-arrow"
                                                                aria-hidden="true"></i>
                                                        </div>
                                                        <div class="notification-content">
                                                            <span class="notification-date">16 Sept</span>
                                                            <h2>Victor Jara</h2>
                                                            <p>Please done this project as soon possible.
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="notification-view">
                                                <a href="#">View All Notification</a>
                                            </div>
                                        </div>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link dropdown-toggle">
                                            <img src="{{ asset('assets/img/product/pro4.jpg') }}" alt="" />
                                            <span class="admin-name">{{ Auth::user()->karyawan->nama }}</span>
                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                        </a>
                                        <ul role="menu"
                                            class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                            <li>
                                                <a href="#"
                                                    style="pointer-events: none; cursor: default; color: inherit;">
                                                    <span class="edu-icon edu-user-rounded author-log-ic"></span>
                                                    Jabatan :
                                                    <span
                                                        class="role-badge {{ \App\Helpers\FormatHelper::getRoleClass(Auth::user()->role) }}">
                                                        {{ \App\Helpers\FormatHelper::formatRole(Auth::user()->role) }}
                                                    </span>
                                                </a>
                                            </li>
                                            {{-- <li><a href="#"><span
                                                        class="edu-icon edu-user-rounded author-log-ic"></span>My
                                                    Profile</a>
                                            </li> --}}
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST"
                                                    style="display: none;" id="logout-form">
                                                    @csrf
                                                </form>
                                                <a href="#"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <span class="edu-icon edu-locked author-log-ic"></span> Log Out
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    {{-- <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown"
                                            role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                class="educate-icon educate-menu"></i></a>

                                        <div role="menu"
                                            class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                            <ul class="nav nav-tabs custon-set-tab">
                                                <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                                </li>
                                                <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                </li>
                                                <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content custom-bdr-nt">
                                                <div id="Notes" class="tab-pane fade in active">
                                                    <div class="notes-area-wrap">
                                                        <div class="note-heading-indicate">
                                                            <h2><i class="fa fa-comments-o"></i> Latest
                                                                Notes</h2>
                                                            <p>You have 10 new message.</p>
                                                        </div>
                                                        <div class="notes-list-area notes-menu-scrollbar">
                                                            <ul class="notes-menu-list">
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/4.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/1.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/2.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/3.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/4.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/1.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/2.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/1.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/2.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="notes-list-flow">
                                                                            <div class="notes-img">
                                                                                <img src="{{ asset('assets/img/contact/3.jpg') }}"
                                                                                    alt="" />
                                                                            </div>
                                                                            <div class="notes-content">
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more-or-less normal.</p>
                                                                                <span>Yesterday 2:45
                                                                                    pm</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="Projects" class="tab-pane fade">
                                                    <div class="projects-settings-wrap">
                                                        <div class="note-heading-indicate">
                                                            <h2><i class="fa fa-cube"></i> Latest projects
                                                            </h2>
                                                            <p> You have 20 projects. 5 not completed.</p>
                                                        </div>
                                                        <div class="project-st-list-area project-st-menu-scrollbar">
                                                            <ul class="projects-st-menu-list">
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="project-list-flow">
                                                                            <div class="projects-st-heading">
                                                                                <h2>Web Development</h2>
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more or less normal.</p>
                                                                                <span class="project-st-time">1
                                                                                    hours ago</span>
                                                                            </div>
                                                                            <div class="projects-st-content">
                                                                                <p>Completion with: 28%</p>
                                                                                <div class="progress progress-mini">
                                                                                    <div style="width: 28%;"
                                                                                        class="progress-bar progress-bar-danger hd-tp-1">
                                                                                    </div>
                                                                                </div>
                                                                                <p>Project end: 4:00 pm -
                                                                                    12.06.2014</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="project-list-flow">
                                                                            <div class="projects-st-heading">
                                                                                <h2>Software Development
                                                                                </h2>
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more or less normal.</p>
                                                                                <span class="project-st-time">2
                                                                                    hours ago</span>
                                                                            </div>
                                                                            <div
                                                                                class="projects-st-content project-rating-cl">
                                                                                <p>Completion with: 68%</p>
                                                                                <div class="progress progress-mini">
                                                                                    <div style="width: 68%;"
                                                                                        class="progress-bar hd-tp-2">
                                                                                    </div>
                                                                                </div>
                                                                                <p>Project end: 4:00 pm -
                                                                                    12.06.2014</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="project-list-flow">
                                                                            <div class="projects-st-heading">
                                                                                <h2>Graphic Design</h2>
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more or less normal.</p>
                                                                                <span class="project-st-time">3
                                                                                    hours ago</span>
                                                                            </div>
                                                                            <div class="projects-st-content">
                                                                                <p>Completion with: 78%</p>
                                                                                <div class="progress progress-mini">
                                                                                    <div style="width: 78%;"
                                                                                        class="progress-bar hd-tp-3">
                                                                                    </div>
                                                                                </div>
                                                                                <p>Project end: 4:00 pm -
                                                                                    12.06.2014</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="project-list-flow">
                                                                            <div class="projects-st-heading">
                                                                                <h2>Web Design</h2>
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more or less normal.</p>
                                                                                <span class="project-st-time">4
                                                                                    hours ago</span>
                                                                            </div>
                                                                            <div
                                                                                class="projects-st-content project-rating-cl2">
                                                                                <p>Completion with: 38%</p>
                                                                                <div class="progress progress-mini">
                                                                                    <div style="width: 38%;"
                                                                                        class="progress-bar progress-bar-danger hd-tp-4">
                                                                                    </div>
                                                                                </div>
                                                                                <p>Project end: 4:00 pm -
                                                                                    12.06.2014</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="project-list-flow">
                                                                            <div class="projects-st-heading">
                                                                                <h2>Business Card</h2>
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more or less normal.</p>
                                                                                <span class="project-st-time">5
                                                                                    hours ago</span>
                                                                            </div>
                                                                            <div class="projects-st-content">
                                                                                <p>Completion with: 28%</p>
                                                                                <div class="progress progress-mini">
                                                                                    <div style="width: 28%;"
                                                                                        class="progress-bar progress-bar-danger hd-tp-5">
                                                                                    </div>
                                                                                </div>
                                                                                <p>Project end: 4:00 pm -
                                                                                    12.06.2014</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="project-list-flow">
                                                                            <div class="projects-st-heading">
                                                                                <h2>Ecommerce Business</h2>
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more or less normal.</p>
                                                                                <span class="project-st-time">6
                                                                                    hours ago</span>
                                                                            </div>
                                                                            <div
                                                                                class="projects-st-content project-rating-cl">
                                                                                <p>Completion with: 68%</p>
                                                                                <div class="progress progress-mini">
                                                                                    <div style="width: 68%;"
                                                                                        class="progress-bar hd-tp-6">
                                                                                    </div>
                                                                                </div>
                                                                                <p>Project end: 4:00 pm -
                                                                                    12.06.2014</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="project-list-flow">
                                                                            <div class="projects-st-heading">
                                                                                <h2>Woocommerce Plugin</h2>
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more or less normal.</p>
                                                                                <span class="project-st-time">7
                                                                                    hours ago</span>
                                                                            </div>
                                                                            <div class="projects-st-content">
                                                                                <p>Completion with: 78%</p>
                                                                                <div class="progress progress-mini">
                                                                                    <div style="width: 78%;"
                                                                                        class="progress-bar">
                                                                                    </div>
                                                                                </div>
                                                                                <p>Project end: 4:00 pm -
                                                                                    12.06.2014</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="project-list-flow">
                                                                            <div class="projects-st-heading">
                                                                                <h2>Wordpress Theme</h2>
                                                                                <p> The point of using Lorem
                                                                                    Ipsum is that it has a
                                                                                    more or less normal.</p>
                                                                                <span class="project-st-time">9
                                                                                    hours ago</span>
                                                                            </div>
                                                                            <div
                                                                                class="projects-st-content project-rating-cl2">
                                                                                <p>Completion with: 38%</p>
                                                                                <div class="progress progress-mini">
                                                                                    <div style="width: 38%;"
                                                                                        class="progress-bar progress-bar-danger">
                                                                                    </div>
                                                                                </div>
                                                                                <p>Project end: 4:00 pm -
                                                                                    12.06.2014</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="Settings" class="tab-pane fade">
                                                    <div class="setting-panel-area">
                                                        <div class="note-heading-indicate">
                                                            <h2><i class="fa fa-gears"></i> Settings Panel
                                                            </h2>
                                                            <p> You have 20 Settings. 5 not completed.</p>
                                                        </div>
                                                        <ul class="setting-panel-list">
                                                            <li>
                                                                <div class="checkbox-setting-pro">
                                                                    <div class="checkbox-title-pro">
                                                                        <h2>Show notifications</h2>
                                                                        <div class="ts-custom-check">
                                                                            <div class="onoffswitch">
                                                                                <input type="checkbox"
                                                                                    name="collapsemenu"
                                                                                    class="onoffswitch-checkbox"
                                                                                    id="example">
                                                                                <label class="onoffswitch-label"
                                                                                    for="example">
                                                                                    <span
                                                                                        class="onoffswitch-inner"></span>
                                                                                    <span
                                                                                        class="onoffswitch-switch"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox-setting-pro">
                                                                    <div class="checkbox-title-pro">
                                                                        <h2>Disable Chat</h2>
                                                                        <div class="ts-custom-check">
                                                                            <div class="onoffswitch">
                                                                                <input type="checkbox"
                                                                                    name="collapsemenu"
                                                                                    class="onoffswitch-checkbox"
                                                                                    id="example3">
                                                                                <label class="onoffswitch-label"
                                                                                    for="example3">
                                                                                    <span
                                                                                        class="onoffswitch-inner"></span>
                                                                                    <span
                                                                                        class="onoffswitch-switch"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox-setting-pro">
                                                                    <div class="checkbox-title-pro">
                                                                        <h2>Enable history</h2>
                                                                        <div class="ts-custom-check">
                                                                            <div class="onoffswitch">
                                                                                <input type="checkbox"
                                                                                    name="collapsemenu"
                                                                                    class="onoffswitch-checkbox"
                                                                                    id="example4">
                                                                                <label class="onoffswitch-label"
                                                                                    for="example4">
                                                                                    <span
                                                                                        class="onoffswitch-inner"></span>
                                                                                    <span
                                                                                        class="onoffswitch-switch"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox-setting-pro">
                                                                    <div class="checkbox-title-pro">
                                                                        <h2>Show charts</h2>
                                                                        <div class="ts-custom-check">
                                                                            <div class="onoffswitch">
                                                                                <input type="checkbox"
                                                                                    name="collapsemenu"
                                                                                    class="onoffswitch-checkbox"
                                                                                    id="example7">
                                                                                <label class="onoffswitch-label"
                                                                                    for="example7">
                                                                                    <span
                                                                                        class="onoffswitch-inner"></span>
                                                                                    <span
                                                                                        class="onoffswitch-switch"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox-setting-pro">
                                                                    <div class="checkbox-title-pro">
                                                                        <h2>Update everyday</h2>
                                                                        <div class="ts-custom-check">
                                                                            <div class="onoffswitch">
                                                                                <input type="checkbox"
                                                                                    name="collapsemenu" checked=""
                                                                                    class="onoffswitch-checkbox"
                                                                                    id="example2">
                                                                                <label class="onoffswitch-label"
                                                                                    for="example2">
                                                                                    <span
                                                                                        class="onoffswitch-inner"></span>
                                                                                    <span
                                                                                        class="onoffswitch-switch"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox-setting-pro">
                                                                    <div class="checkbox-title-pro">
                                                                        <h2>Global search</h2>
                                                                        <div class="ts-custom-check">
                                                                            <div class="onoffswitch">
                                                                                <input type="checkbox"
                                                                                    name="collapsemenu" checked=""
                                                                                    class="onoffswitch-checkbox"
                                                                                    id="example6">
                                                                                <label class="onoffswitch-label"
                                                                                    for="example6">
                                                                                    <span
                                                                                        class="onoffswitch-inner"></span>
                                                                                    <span
                                                                                        class="onoffswitch-switch"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox-setting-pro">
                                                                    <div class="checkbox-title-pro">
                                                                        <h2>Offline users</h2>
                                                                        <div class="ts-custom-check">
                                                                            <div class="onoffswitch">
                                                                                <input type="checkbox"
                                                                                    name="collapsemenu" checked=""
                                                                                    class="onoffswitch-checkbox"
                                                                                    id="example5">
                                                                                <label class="onoffswitch-label"
                                                                                    for="example5">
                                                                                    <span
                                                                                        class="onoffswitch-inner"></span>
                                                                                    <span
                                                                                        class="onoffswitch-switch"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
