<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->

<div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
        <div class="site-navbar bg-light">
            <div class="row align-items-center">
                <div class="col-2">
                    <h2 class="mb-0 site-logo"> <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ asset('funder-template/images/logo/logo-responsive.png') }}" alt="" class="img-fluid"></a></h2>
                </div>
                <div class="col-10">
                    <nav class="site-navigation text-right" role="navigation">
                        <div class="container">
                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li class="has-children">
                                    <a href="insurance.html">Insurance</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="#">Home Insurance</a></li>
                                        <li><a href="#">Auto Insurance</a></li>
                                        <li><a href="#">Travel Insurance</a></li>
                                        <li class="has-children">
                                            <a href="#">Sub Menus</a>
                                            <ul class="dropdown">
                                                <li><a href="insurance.html">Home Insurance</a></li>
                                                <li><a href="insurance.html">Auto Insurance</a></li>
                                                <li><a href="insurance.html">Travel Insurance</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="contact.html"><span class="d-inline-block p-3 bg-primary text-white btn btn-primary">Get A Quote</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
