<body class="login-page">
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Title</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      
    </div>

<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Panel Login</h3>
  </div>
  <div class="panel-body">
    
<div class="login-box">
      <div class="login-logo">
        
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Masuk</p>
        <p><?php echo $this->session->flashdata('info'); ?></p>
        <form action="<?php echo base_url().'check_login';?>" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" />
            
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" />
            
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
            </div><!-- /.col -->
          </div>
        </form>

        


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->





  </div>
</div>

    

    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      
    </div>
  </div>
</div>

<br><br>
<br><br>
<br><br>
<br><br><br><br><br><br><br>
    