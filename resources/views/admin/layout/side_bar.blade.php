<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('admin/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{auth('admin')->user()->name}}
                            <span class="user-level">{{auth('admin')->user()->type}}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Change Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse"><p><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Logout
                                    </p></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                @if(Session::get('page')=="dashboard")
                    <?php $active = "active"; ?>
                 @else
                    <?php $active = ""; ?>
                @endif
                <li class="nav-item {{$active }}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                @if(Session::get('page')=="banner"
                  || Session::get('page')=="category"
                  || Session::get('page')=="product"
                  || Session::get('page')=="brand"
                  || Session::get('page')=="testimonial"
                  || Session::get('page')=="footer"
                  || Session::get('page')=="coupen"
                  || Session::get('page')=="aboutus"
                  )
                    <?php $active = "active";
                    $menuOpen="submenu"; 
                    $show = "show";
                    ?>
                @else
                    <?php $active = "";
                    $menuOpen=""; 
                    $show = "";
                    ?>
                @endif
                <li class="nav-item  {{ $active}} {{ $menuOpen }} ">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Catelogue</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{$show}}" id="base" style="height: auto;">
                        <ul class="nav nav-collapse">
                            @if(Session::get('page')=="banner")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <li class="{{$active }}">
                                <a href="{{route('admin.banner')}}">
                                    <span class="sub-item">Banner</span>
                                </a>
                            </li>
                            @if(Session::get('page')=="category")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <li class="{{$active }}">
                                <a href="{{route('admin.categories')}}">
                                    <span class="sub-item">Category</span>
                                </a>
                            </li>
                            @if(Session::get('page')=="brand")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <li class="{{$active }}">
                                <a href="{{route('admin.brand')}}">
                                    <span class="sub-item">Brand</span>
                                </a>
                            </li>

                            @if(Session::get('page')=="product")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <li class="{{$active }}">
                                <a href="{{route('admin.product')}}">
                                    <span class="sub-item">Product</span>
                                </a>
                            </li>

                            @if(Session::get('page')=="testimonial")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <li class="{{$active }}">
                                <a href="{{route('admin.testimonial')}}">
                                    <span class="sub-item">Testimonial</span>
                                </a>
                            </li>

                            @if(Session::get('page')=="footer")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <li class="{{$active }}">
                                <a href="{{ route('admin.edit.footer') }}">
                                    <span class="sub-item">Contact</span>
                                </a>
                            </li>

                            @if(Session::get('page')=="coupen")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="{{$active }}">
                            <a href="{{route('admin.coupen')}}">
                                <span class="sub-item">Coupen</span>
                            </a>
                        </li>

                        @if(Session::get('page')=="aboutus")
                        <?php $active = "active"; ?>
                    @else
                        <?php $active = ""; ?>
                    @endif
                    <li class="{{$active }}">
                        <a href="{{ route('admin.edit.aboutus') }}">
                            <span class="sub-item">About Us</span>
                        </a>
                    </li>

                        </ul>
                    </div>
                </li>
                @if(Session::get('page')=="order"
                  )
                    <?php $active = "active";
                    $menuOpen="submenu"; 
                    $show = "show";
                    ?>
                    
                @else
                    <?php $active = "";
                    $menuOpen=""; 
                    $show = "";
                    ?>
                @endif
                <li class="nav-item  {{ $active}} {{ $menuOpen }} ">
                    <a data-toggle="collapse" href="#order">
                        <i class="fas fa-layer-group"></i>
                        <p>Order</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{$show}}" id="order" style="height: auto;">
                        <ul class="nav nav-collapse">
                            @if(Session::get('page')=="order")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <li class="{{$active }}">
                                <a href="{{route('admin.orders')}}">
                                    <span class="sub-item">View Order</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                @if(Session::get('page')=="contactmessage"
                   || Session::get('page')=="userregister"
                )
                  <?php $active = "active";
                  $menuOpen="submenu"; 
                  $show = "show";
                  ?>
                  
              @else
                  <?php $active = "";
                  $menuOpen=""; 
                  $show = "";
                  ?>
              @endif
              <li class="nav-item  {{ $active}} {{ $menuOpen }} ">
                  <a data-toggle="collapse" href="#contactmessage">
                      <i class="fas fa-layer-group"></i>
                      <p>Extra Pages</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse {{$show}}" id="contactmessage" style="height: auto;">
                      <ul class="nav nav-collapse">
                          @if(Session::get('page')=="contactmessage")
                              <?php $active = "active"; ?>
                          @else
                              <?php $active = ""; ?>
                          @endif
                          <li class="{{$active }}">
                              <a href="{{route('admin.contactmessage')}}">
                                  <span class="sub-item">Contact Message</span>
                              </a>
                          </li>

                          @if(Session::get('page')=="userregister")
                          <?php $active = "active"; ?>
                      @else
                          <?php $active = ""; ?>
                      @endif
                      <li class="{{$active }}">
                          <a href="{{route('admin.userregister')}}">
                              <span class="sub-item">User Register</span>
                          </a>
                      </li>

                      </ul>
                  </div>
              </li>

            </ul>
        </div>
    </div>
</div>