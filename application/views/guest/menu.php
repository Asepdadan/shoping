<body>
    <header id="header" ><!--header-->
        <div class="header_top" ><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo" >
                            <ul class="nav nav-pills">
                                <li style="padding-left:20px;"><a href="#"><i class="fa fa-phone"></i> +62 817718</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@gudangjeansfashion.com</a></li>
                                <li><a href="#"><i class="fa fa-"></i> Pin BBM : 2CBD345</a></li>
                                <!-- <li><a href="http://line.me/ti/p/~@GUDANG:JLN.GEMPOL%20Sari"><i class="fa fa-"></i> Line</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.instagram.com/gudangjeans_fashion/?ref=badge" target="blank" class="ig-b- ig-b-24"><i><img src="//badges.instagram.com/static/images/ig-badge-24.png" alt="Instagram" /></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?php echo base_url() ?>"><img src="<?php echo base_url()?>assets/images/home/logo.png" alt="" /></a>
                        </div>
                        
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="<?php echo base_url().'cart'; ?>"> <i class="fa fa-shopping-cart"></i> Cart   <span class="pull-right"><span class="badge" style="background: #0EB3F6; margin-left: 5px;"><?php echo $this->cart->total_items(); ?> </span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                       <!--  <div class="navbar-header ">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div> -->
                      
                    </div>
                    <div class="col-sm-3">
                    <form action="<?php echo base_url().'home/pencarian'; ?>" method="POST" accept-charset="utf-8">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Pencarian" name="pencarian" />
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
