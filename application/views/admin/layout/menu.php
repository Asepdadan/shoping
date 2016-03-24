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
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
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
                                <li><a href="<?php echo base_url().'logout'; ?>"><i class="fa fa-lock"></i> Logout</a></li>
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
                        <!-- <div class="navbar-header ">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div> -->
                      
                    </div>
                    
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

<script type="text/javascript">
function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>
<br>
<div class="container">
    <div class="row">

<div class="col-xs-12 col-md-3">

<div class="panel-group category-products" id="accordian" ><!--category-productsr-->
                            <div class="panel panel-default" style="font-size:22pt; ">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                            <span class="badge pull-right"><!-- <i class="fa fa-plus"></i> --></span>
                                            Pria
                                        </a>
                                    </h4>
                                </div>
                                <div id="mens" class="panel-collapse collapse">
                                    <div class="panel-body" >
                                        <ul >
                                            <li><a href="<?php echo site_url('blazer') ?>" >Blazer</a></li>
                                            <li><a href="<?php echo site_url('celana') ?>">Celana</a></li>
                                            <li><a href="<?php echo site_url('jaket') ?>">Jaket</a></li>
                                            <li><a href="<?php echo site_url('kemeja') ?>">Kemeja</a></li>
                                            <li><a href="<?php echo site_url('kaos') ?>">Kaos</a></li>
                                            <li><a href="<?php echo site_url('topi') ?>">Topi</a></li>                                          
                                            <li><a href="<?php echo site_url('sepatu') ?>">Sepatu</a></li> 
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                            <span class="badge pull-right"><!-- <i class="fa fa-plus"></i> --></span>
                                            Wanita
                                        </a>
                                    </h4>
                                </div>
                                <div id="womens" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="<?php echo site_url('wanita_sendal_sepatu') ?>">Sendal Sepatu</a></li>
                                            <li><a href="<?php echo site_url('wanita_jaket') ?>">Jaket</a></li>
                                            <li><a href="<?php echo site_url('wanita_atasan') ?>">Atasan</a></li>
                                            <li><a href="<?php echo site_url('wanita_kerudung') ?>">Kerudung</a></li>
                                            <li><a href="<?php echo site_url('wanita_kemeja') ?>">Kemeja</a></li>
                                            <li><a href="<?php echo site_url('wanita_gamis') ?>">Gamis</a></li>
                                            <li><a href="<?php echo site_url('wanita_celana') ?>">Celana</a></li>
                                            <li><a href="<?php echo site_url('wanita_kaos') ?>">Kaos</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Kids</a></h4>
                                </div>
                            </div>
                            
                        </div><!--/category-products-->

</div>
