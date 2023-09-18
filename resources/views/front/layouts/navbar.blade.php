<header class="rbt-header rbt-header-10">
    <div class="rbt-sticky-placeholder"></div>
    <!-- Start Header Top  -->
    {{-- <div class="rbt-header-top rbt-header-top-1 header-space-betwween bg-not-transparent bg-color-darker top-expended-activation">
        <div class="container-fluid">
            <div class="top-expended-wrapper">
                <div class="top-expended-inner rbt-header-sec align-items-center ">
                    <div class="rbt-header-sec-col rbt-header-left d-none d-xl-block">
                        <div class="rbt-header-content">
                            <!-- Start Header Information List  -->
                            <div class="header-info">
                                <ul class="rbt-information-list">
                                    <li>
                                        <a href="#"><i class="feather-phone" style="padding: 0px 5px;"></i>010 12 77 57 04</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Header Information List  -->
                        </div>
                    </div>
                    <div class="rbt-header-sec-col rbt-header-right mt_md--10 mt_sm--10">
                        <div class="rbt-header-content justify-content-start justify-content-lg-end">
                            <div class="header-info d-none d-xl-block">
                                <ul class="social-share-transparent">
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="header-info">
                    <div class="top-bar-expended d-block d-lg-none">
                        <button class="topbar-expend-button rbt-round-btn"><i class="feather-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Header Top  -->

    <div class="rbt-header-wrapper header-space-betwween header-sticky">
        <div class="container-fluid">
            <div class="mainbar-row rbt-navigation-center align-items-center">
                <div class="header-left rbt-header-content">
                    <div class="header-info">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ url('front') }}/assets/images/logo/logo.png" alt="Education Logo Images">
                            </a>
                        </div>
                    </div>
                    
                </div>

                <div class="rbt-main-navigation d-none d-xl-block">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li style="padding: 0px 5px;">
                                <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == '/' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/') }}">الرئيسية</a>
                            </li>
                            
                            <li style="padding: 0px 5px;">
                                <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'about' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/about') }}">عن  الأكاديمية</a>
                            </li>
                            
                            {{-- <li style="padding: 0px 5px;">
                                <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'blog' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/blog') }}">المدونة</a>
                            </li>
                            
                            <li style="padding: 0px 5px;">
                                <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'teachers' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/teachers') }}">المدرسون</a>
                            </li> --}}
                            
                            <li style="padding: 0px 5px;">
                                <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'table_prices/term' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/table_prices/term') }}">الاشتراكات وجداول الحصص</a>
                            </li>

                            {{-- <li style="padding: 0px 5px;">
                                <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'courses' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/courses') }}">دورات الأكاديمية</a>
                            </li> --}}
                            
                            <li style="padding: 0px 5px;">
                                <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'contact' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/contact') }}">تواصل معنا</a>
                            </li>

                            {{-- <li class="with-megamenu has-menu-child-item position-static">
                                <a style="font-weight: bold;" href="#">Blog <i class="feather-chevron-down"></i></a>
                                <div class="rbt-megamenu grid-item-2">
                                    <div class="wrapper">
                                        <div class="row row--15">
                                            
                                            <div class="col-lg-12 col-xl-6 col-xxl-6 single-mega-item">
                                                <h3 class="rbt-short-title">Course Layout</h3>
                                                <ul class="mega-menu-item">
                                                    <li><a style="font-weight: bold;" href="course-card-3.html">Course Card Three</a></li>
                                                    <li><a style="font-weight: bold;" href="course-masonry.html">Course Masonry</a></li>
                                                    <li><a style="font-weight: bold;" href="course-with-sidebar.html">Course With Sidebar</a></li>
                                                    <li><a style="font-weight: bold;" href="course-details.html">Course Details</a></li>
                                                    <li><a style="font-weight: bold;" href="course-details-2.html">Course Details Two</a></li>
                                                    <li><a style="font-weight: bold;" href="lesson.html">Course Lesson <span class="rbt-badge-card">New</span></a></li>
                                                    <li><a style="font-weight: bold;" href="create-course.html">Create Course <span class="rbt-badge-card">New</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="nav-quick-access">
                                                    <li><a style="font-weight: bold;" href="#"><i class="feather-folder-minus"></i> Quick Start Guide</a></li>
                                                    <li><a style="font-weight: bold;" href="#"><i class="feather-folder-minus"></i> For Open Source</a></li>
                                                    <li><a style="font-weight: bold;" href="#"><i class="feather-folder-minus"></i> API Status</a></li>
                                                    <li><a style="font-weight: bold;" href="#"><i class="feather-folder-minus"></i> Support</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
{{-- 
                            <li class="with-megamenu has-menu-child-item position-static">
                                <a style="font-weight: bold;" href="#">Blog <i class="feather-chevron-down"></i></a>
                                <!-- Start Mega Menu  -->
                                <div class="rbt-megamenu grid-item-3">
                                    <div class="wrapper">
                                        <div class="row row--15">
                                            <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                                <h3 class="rbt-short-title">Blog Styles</h3>
                                                <ul class="mega-menu-item">
                                                    <li><a style="font-weight: bold;" href="blog-list.html">Blog List</a></li>
                                                    <li><a style="font-weight: bold;" href="blog.html">Blog Grid</a></li>
                                                    <li><a style="font-weight: bold;" href="blog-grid-minimal.html">Blog Grid Minimal</a></li>
                                                    <li><a style="font-weight: bold;" href="blog-with-sidebar.html">Blog With Sidebar</a></li>
                                                    <li><a style="font-weight: bold;" href="blog-details.html">Blog Details</a></li>
                                                    <li><a style="font-weight: bold;" href="post-format-standard.html">Post Format Standard</a></li>
                                                    <li><a style="font-weight: bold;" href="post-format-gallery.html">Post Format Gallery</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                                <h3 class="rbt-short-title">Get Started</h3>
                                                <ul class="mega-menu-item">
                                                    <li><a style="font-weight: bold;" href="post-format-quote.html">Post Format Quote</a></li>
                                                    <li><a style="font-weight: bold;" href="post-format-audio.html">Post Format Audio</a></li>
                                                    <li><a style="font-weight: bold;" href="post-format-video.html">Post Format Video</a></li>
                                                    <li><a style="font-weight: bold;" href="#">Media Under Title <span class="rbt-badge-card">Coming</span></a></li>
                                                    <li><a style="font-weight: bold;" href="#">Sticky Sidebar <span class="rbt-badge-card">Coming</span></a></li>
                                                    <li><a style="font-weight: bold;" href="#">Auto Masonry <span class="rbt-badge-card">Coming</span></a></li>
                                                    <li><a style="font-weight: bold;" href="#">Meta Overlaid <span class="rbt-badge-card">Coming</span></a></li>
                                                </ul>
                                            </div>

                                            <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                                <div class="rbt-ads-wrapper">
                                                    <a class="d-block" href="#"><img src="{{ url('front') }}/assets/images/service/mobile-cat.jpg" alt="Education Images"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Mega Menu  -->
                            </li> --}}
                        </ul>
                    </nav>
                </div>

                <div class="header-right">

                    <!-- Navbar Icons -->
                    <ul class="quick-access">
                        <li class="access-icon">
                            <a class="search-trigger-active rbt-round-btn" href="#">
                                <i class="feather-search"></i>
                            </a>
                        </li>

                        {{-- <li class="account-access rbt-user-wrapper d-none d-xl-block">
                            <a style="font-weight: bold;" href="#"><i class="feather-user"></i>Admin</a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <div class="rbt-admin-profile">
                                        <div class="admin-thumbnail">
                                            <img src="{{ url('front') }}/assets/images/team/avatar.jpg" alt="User Images">
                                        </div>
                                        <div class="admin-info">
                                            <span class="name">Nipa Bali</span>
                                            <a class="rbt-btn-link color-primary" href="profile.html">View Profile</a>
                                        </div>
                                    </div>
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-dashboard.html">
                                                <i class="feather-home"></i>
                                                <span>My Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="#">
                                                <i class="feather-bookmark"></i>
                                                <span>Bookmark</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-enrolled-courses.html">
                                                <i class="feather-shopping-bag"></i>
                                                <span>Enrolled Courses</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-wishlist.html">
                                                <i class="feather-heart"></i>
                                                <span>Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-reviews.html">
                                                <i class="feather-star"></i>
                                                <span>Reviews</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-my-quiz-attempts.html">
                                                <i class="feather-list"></i>
                                                <span>My Quiz Attempts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-order-history.html">
                                                <i class="feather-clock"></i>
                                                <span>Order History</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-quiz-attempts.html">
                                                <i class="feather-message-square"></i>
                                                <span>Question &amp; Answer</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a style="font-weight: bold;" href="#">
                                                <i class="feather-book-open"></i>
                                                <span>Getting Started</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-settings.html">
                                                <i class="feather-settings"></i>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="index.html">
                                                <i class="feather-log-out"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                            <a class="rbt-round-btn" href="#"><i class="feather-user"></i></a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <div class="rbt-admin-profile">
                                        <div class="admin-thumbnail">
                                            <img src="{{ url('front') }}/assets/images/team/avatar.jpg" alt="User Images">
                                        </div>
                                        <div class="admin-info">
                                            <span class="name">Nipa Bali</span>
                                            <a class="rbt-btn-link color-primary" href="profile.html">View Profile</a>
                                        </div>
                                    </div>
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-dashboard.html">
                                                <i class="feather-home"></i>
                                                <span>My Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="#">
                                                <i class="feather-bookmark"></i>
                                                <span>Bookmark</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-enrolled-courses.html">
                                                <i class="feather-shopping-bag"></i>
                                                <span>Enrolled Courses</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-wishlist.html">
                                                <i class="feather-heart"></i>
                                                <span>Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-reviews.html">
                                                <i class="feather-star"></i>
                                                <span>Reviews</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-my-quiz-attempts.html">
                                                <i class="feather-list"></i>
                                                <span>My Quiz Attempts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-order-history.html">
                                                <i class="feather-clock"></i>
                                                <span>Order History</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-quiz-attempts.html">
                                                <i class="feather-message-square"></i>
                                                <span>Question &amp; Answer</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a style="font-weight: bold;" href="#">
                                                <i class="feather-book-open"></i>
                                                <span>Getting Started</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a style="font-weight: bold;" href="instructor-settings.html">
                                                <i class="feather-settings"></i>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="font-weight: bold;" href="index.html">
                                                <i class="feather-log-out"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}

                    </ul>

                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->

                </div>
            </div>
        </div>
        <!-- Start Search Dropdown  -->
        <div class="rbt-search-dropdown">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#">
                            <input type="text" placeholder="ما الذي تبحث عنة ؟">
                            <div class="submit-btn">
                                <a class="rbt-btn btn-gradient btn-md" href="#">بحث</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="rbt-separator-mid">
                    <hr class="rbt-separator m-0">
                </div>

                {{-- <div class="row g-4 pt--30 pb--60">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h5 class="rbt-title-style-2">Our Top Course</h5>
                        </div>
                    </div>

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a style="font-weight: bold;" href="course-details.html">
                                    <img src="{{ url('front') }}/assets/images/course/course-online-01.jpg" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a style="font-weight: bold;" href="course-details.html">React Js</a>
                                </h5>
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$15</span>
                                        <span class="off-price">$25</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a style="font-weight: bold;" href="course-details.html">
                                    <img src="{{ url('front') }}/assets/images/course/course-online-02.jpg" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a style="font-weight: bold;" href="course-details.html">Java Program</a>
                                </h5>
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$10</span>
                                        <span class="off-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a style="font-weight: bold;" href="course-details.html">
                                    <img src="{{ url('front') }}/assets/images/course/course-online-03.jpg" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a style="font-weight: bold;" href="course-details.html">Web Design</a>
                                </h5>
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$10</span>
                                        <span class="off-price">$20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a style="font-weight: bold;" href="course-details.html">
                                    <img src="{{ url('front') }}/assets/images/course/course-online-04.jpg" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a style="font-weight: bold;" href="course-details.html">Web Design</a>
                                </h5>
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$20</span>
                                        <span class="off-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->
                </div> --}}

            </div>
        </div>
        <!-- End Search Dropdown  -->
    </div>

    <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
</header>

<!-- Mobile Menu Section -->
<div class="popup-mobile-menu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content">
                <div class="logo">
                    <a style="font-weight: bold;" href="{{ url('/') }}">
                        <img src="{{ url('front') }}/assets/images/logo/logo.png" alt="Education Logo Images">
                    </a>
                </div>
                <div class="rbt-btn-close">
                    <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            {{-- <p class="description">Histudy is a education website template. You can customize all.</p>
            <ul class="navbar-top-left rbt-information-list justify-content-start">
                <li>
                    <a style="font-weight: bold;" href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                </li>
                <li>
                    <a style="font-weight: bold;" href="#"><i class="feather-phone"></i>(302) 555-0107</a>
                </li>
            </ul> --}}
        </div>

        <nav class="mainmenu-nav">
            <ul class="mainmenu">
                <li>
                    <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == '/' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/') }}">الرئيسية</a>
                </li>
               
                <li>
                    <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'about' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/about') }}">عن  الأكاديمية</a>
                </li>
               
                {{-- <li>
                    <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'blog' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/blog') }}">المدونة</a>
                </li>
               
                <li>
                    <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'teachers' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/teachers') }}">المدرسون</a>
                </li> --}}
                
                <li>
                    <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'table_prices/term' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/table_prices/term') }}">الاشتراكات وجداول الحصص</a>
                </li>

                {{-- <li>
                    <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'courses' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/courses') }}">دورات الأكاديمية</a>
                </li> --}}
                
                <li>
                    <a class="{{ Illuminate\Support\Facades\Route::current()->uri() == 'contact' ? 'active' : '' }}" style="font-weight: bold;" href="{{ url('/contact') }}">تواصل معنا</a>
                </li>

            </ul>
        </nav>

        <div class="mobile-menu-bottom">
    
            <div class="social-share-wrapper">
                {{-- <span class="rbt-short-title d-block">Find With Us</span> --}}
                <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                    <li><a href="{{ \App\Models\Back\Setting::first()['facebook'] }}/" target="_blank">
                        <i class="feather-facebook"></i>
                    </a>
                    </li>
                    <li><a href="{{ \App\Models\Back\Setting::first()['twitter'] }}" target="_blank">
                            <i class="feather-twitter"></i>
                        </a>
                    </li>
                    <li><a href="{{ \App\Models\Back\Setting::first()['linkedin'] }}" target="_blank">
                            <i class="feather-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>