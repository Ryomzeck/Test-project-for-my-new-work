  <nav class="navbar navbar-default default">
    <div class="container">
      <div class="navbar-header">
        <div class="basic-wrapper"> <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
          <div class="navbar-brand"> <a href="index.html"><img src="#" srcset="style/images/logo.png 1x, style/images/logo@2x.png 2x" class="logo-light" alt="" /><img src="#" srcset="style/images/logo-dark.png 1x, style/images/logo-dark@2x.png 2x" class="logo-dark" alt="" /></a>
          </div>
          <!-- /.navbar-brand -->
        </div>
        <!-- /.basic-wrapper -->
      </div>
      <!-- /.navbar-header -->
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="current dropdown"><a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">Home <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('index') }}">Home Layout</a></li>

            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">Portfolio <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('galleryPage') }}">Gallery</a></li>
            </ul>
          </li>
        </ul>
        <!-- /.navbar-nav -->
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>
