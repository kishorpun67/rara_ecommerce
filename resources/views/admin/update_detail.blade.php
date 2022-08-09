@extends('admin.layout.layout')
    @section('content')  
    <section id="main-content">
        <section class="wrapper">
          <!-- /row -->
          <div class="row mt">
            <div class="col-lg-12">
              <h4><i class="fa fa-angle-right"></i> Update Admin Detail</h4>
              <div class="form-panel">
                <div class="form">
                  <form class="cmxform form-horizontal style-form" id="signupForm" method="get" action="">
                    <div class="form-group ">
                      <label for="firstname" class="control-label col-lg-2">Firstname</label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="firstname" name="firstname" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                        <label for="email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                          <input class="form-control " id="email" name="email" type="email" />
                        </div>
                      </div>
                    <div class="form-group ">
                      <label for="lastname" class="control-label col-lg-2">Number</label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="lastname" name="lastname" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Image</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="username" name="username" type="file" />
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