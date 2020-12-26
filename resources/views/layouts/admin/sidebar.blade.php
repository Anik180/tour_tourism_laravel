        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('public/admin/images/user.png')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                                                       <li>
                              <a class="dropdown-item" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="material-icons">input</i>
                                        {{ __('Sign Out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="active">
                        <a href="{{URL::to('home')}}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{URL::to('package-category')}}">
                            <i class="material-icons">content_copy</i>
                            <span>Package category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{URL::to('package-subcategory')}}">
                            <i class="material-icons">content_copy</i>
                            <span>Package Subcategory</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{URL::to('packages')}}">
                            <i class="material-icons">content_copy</i>
                            <span>Packages</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Visa</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{URL::to('visas')}}">
                                    <span>Visa country</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('visa_services')}}">
                                    <span>Visa Service</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>About</span>
                        </a>
                        <ul class="ml-menu">
                        <li>
                          <a href="{{route('ceo.massage')}}">
                            <span>Ceo massage</span>
                          </a>
                       </li>
                        <li>
                          <a href="{{URL::to('about')}}">
                            <span>About</span>
                          </a>
                       </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Air Ticket</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{URL::to('ticket-categories')}}">
                                    <span>Air Ticket Category</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('ticket-subcategories')}}">
                                    <span>Air Ticket Subcategory</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('air-tickets')}}">
                                    <span>Air Ticket</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('hotel-booking')}}">
                            <i class="material-icons">widgets</i>
                            <span>Hotel booking</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('sliders')}}">
                            <i class="material-icons">widgets</i>
                            <span>Sliders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('agents')}}">
                            <i class="material-icons">widgets</i>
                            <span>Air Lines Agent</span>
                        </a>
                    </li>                   
                    <li>
                        <a href="{{url('partners')}}">
                            <i class="material-icons">widgets</i>
                            <span>Our partner</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('contact_us')}}">
                            <i class="material-icons">settings</i>
                            <span>Contact us</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('gallery')}}">
                            <i class="material-icons">photo</i>
                            <span>Photo Gallery</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.config')}}">
                            <i class="material-icons">settings</i>
                            <span>Site settings</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">Admin</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>