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



        <div class="col-xs-12 col-sm-6 col-md-9">
        <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $header; ?></h3>
                </div>
                <div class="panel-body">
                    
                    <div class="row">
                      <div class="col-xs-12 col-md-6">
                         <form action="<?php echo base_url().'root/Post/action_edit_celana'; ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                    
                    
                    </div>                    
                </div>

                <div class="form-group">           
                        <div class="col-sm-10 col-sm-offset-2">         
                        <?php 
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo validation_errors();
                        echo "</div>";
                         ?>
                        
                        </div>
                </div>
<?php foreach ($data as $row) { ?>
                    <div class="form-group">           
                        <div class="col-sm-10 col-sm-offset-2">         
                        <label >Gambar Produk</label>    <br>
                        <img id="uploadPreview" style="width: 200px; height: 150px;" src="<?php echo base_url()?>/assets/uploads/<?php echo $row['gambar']; ?>" /><br>
                        <input type="hidden" name="userfile" value="<?php echo $row['gambar']; ?>">
                        </div>
                </div>
              <!--   <div class="form-group">           
                        <div class="col-sm-10 col-sm-offset-2">         
                        <input type="file" class="form-control" name="userfile" size="20" onchange="PreviewImage();"  id="uploadImage">
                        </div>
                </div> -->

            
                <div class="form-group">      
                        <div class="col-sm-10 col-sm-offset-2">              
                        <label >Kategori </label>    
                        <input type="hidden" class="form-control" name="kategori" value="<?php echo $row['kategori_id']; ?>"> 
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Kode Produk</label>    
                        <input type="hidden" class="form-control" name="kode_produk" required value="<?php echo $row['kode_produk']; ?>" >
                          <input type="text" class="form-control" name="kode_produk" required value="<?php echo $row['kode_produk']; ?>" disabled>
                        </div>
                </div>

                 <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Nama Produk</label>    
                        <input type="text" class="form-control" name="nama" required value="<?php echo $row['nama']; ?>">
                        </div>
                </div>
             
             </div>
                      
                      <div class="col-xs-12 col-sm-6 col-md-6">

                        <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Bahan Produk</label>    
                        <input type="text" class="form-control" name="bahan"  value="<?php echo $row['bahan']; ?>">
                        </div>
                </div>

            <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Size Produk</label>    
                        <input type="text" class="form-control" name="size" value="<?php echo $row['size']; ?>">
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Warna Produk</label>    
                        <input type="text" class="form-control" name="warna" value="<?php echo $row['warna']; ?>">
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Harga Produk</label>    
                        <input type="text" class="form-control" name="harga" required value="<?php echo $row['harga']; ?>">
                        </div>
                </div>

                 <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Dekripsi Produk</label>    
                        <textarea name="deskripsi" placeholder="masukan deskripsi tentang produk" ><?php echo $row['deskripsi']; ?></textarea>
                        </div>
                </div>
        
                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Merk Produk</label>    
                        <input type="text" class="form-control" name="merk" value="<?php echo $row['merk']; ?>">
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Stok Produk</label>    
                        <input type="text" class="form-control" name="stok"  placeholder="isi Stok" value="<?php echo $row['stok']; ?>">
                        </div>
                </div>

                <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn btn-block">Submit</button>
                        </div>
                </div>
            </form>
<?php } ?>



                      </div>

                    </div>
                </div>
            </div>
        </div>

<div class="col-xs-12 col-sm-6 col-md-12">

<br><br>      
        <div class="table-responsive">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Kategori Barang</th>
                <th>Stok</th>
  
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        foreach($data as $row){
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><a href="<?php echo base_url()?>assets/uploads/<?php echo $row['gambar']; ?>"><img src="<?php echo base_url()?>assets/uploads/<?php echo $row['gambar']; ?>" alt=""  width="50" heigth="50" /></a></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td><?php echo $row['kategori_id']; ?></td>
                <td><?php echo $row['stok']; ?></td>
               
            </tr>
        <?php
        $no++;
        }
        ?>
        </tbody>
    </table>
</div>

</div>



    </div>
</div>


    </div>
</div>
