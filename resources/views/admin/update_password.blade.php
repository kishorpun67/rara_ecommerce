@extends('admin.layout.layout')
    @section('content')  
    <section id="main-content">
        <section class="wrapper">
          <!-- /row -->
          <div class="row mt">
            <div class="col-lg-12">
              <h4><i class="fa fa-angle-right"></i> Update Current Password</h4>
              <div class="form-panel">
                <div class="form">
                  <form class="cmxform form-horizontal style-form" id="signupForm" method="get" action="">
                    <div class="form-group ">
                        <label for="current_password" class="control-label col-lg-2">Current Password</label>
                        <div class="col-lg-10">
                          <input class="form-control " id="current_password" name="current_password" type="password" />
                        </div>
                      </div>
                    <div class="form-group ">
                      <label for="new_password" class="control-label col-lg-2">New Password</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="new_password" name="new_password" type="password" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="confirm_password" class="control-label col-lg-2">Confirm Password</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-theme" type="submit">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /form-panel -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </section>
        <!-- /wrapper -->
    </section>
    @endsection