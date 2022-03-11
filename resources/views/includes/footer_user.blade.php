      <!-- footer start -->
      <footer class="footer_section">

          <div class="container">
              <div class="row">
                  <div class="col-md-4">
                      <div class=" full">
                          <div class="logo_footer">
                              <a href="#"><img width="120" src="{{ asset('admin') }}/img/nobleseed.png" alt="#" /></a>
                          </div>
                          <div class="footer_social">
                              <div class="information_f">

                                  <div class="d-flex">
                                      <a href="" class="">
                                          <i class="fa fa-map-marker" aria-hidden="true"></i>
                                      </a><strong class="mt-1 ml-1">Alamat :</strong>
                                      <p class="mt-1">&nbsp Jatibarang</p>
                                  </div>
                                  <div class="d-flex">
                                      <a href="" class="">
                                          <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                      </a><strong class="mt-1 ml-1">Whatsapp :</strong>
                                      <p class="mt-1">&nbsp 08981596549</p>
                                  </div>
                                  <div class="d-flex">
                                      <a href="" class="">
                                          <i class="fa fa-instagram" aria-hidden="true"></i>
                                      </a><strong class="mt-1 ml-1">Instagram :</strong>
                                      <p class="mt-1">&nbsp nobleseed</p>
                                  </div>
                                  <div class="d-flex">
                                      <a href="" class="">
                                          <i class="fa fa-facebook" aria-hidden="true"></i>
                                      </a><strong class="mt-1 ml-1">Facebook :</strong>
                                      <p class="mt-1">&nbsp nobleseed</p>
                                  </div>
                                  <div class="d-flex">
                                      <a href="" class="">
                                          <i class="fa fa-envelope" aria-hidden="true"></i>
                                      </a><strong class="mt-1 ml-1">Email :</strong>
                                      <p class="mt-1">&nbsp nobleseed@gmail.com</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="row">
                          <div class="col-md-7">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="widget_menu">
                                          <h3>Menu</h3>
                                          <ul>

                                              <li><a style="color:white" href="/home">Home</a></li>
                                              <li><a style="color:white" href="/produk">Products</a></li>
                                              @if (Request::is('home'))
                                                  <li><a style="color:white" href="#about">About</a></li>
                                              @else
                                                  <li><a style="color:white" href="/home#about">About</a></li>
                                              @endif
                                              <li><a style="color:white" href="#">Contact</a></li>

                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="widget_menu">
                                          <h3>Account</h3>
                                          <ul>
                                              <li><a style="color:white" href="#">Login</a></li>
                                              <li><a style="color:white" href="#">Register</a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
      </footer>
