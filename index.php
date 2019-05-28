<?php include 'header.php'; ?>



<div class="col-md-3">
   					<div class="panel panel-primary">
   					<div class="panel-heading">Kategoriler</div>
   						<div class="panel-body"><?php $cat = $db->cat_list(); foreach ($cat as $value){?>
                                <p><a href="index.php?kat_id=<?php echo $value["id"]; ?>"><?php echo $value["name"];?></a></p><?php } ?></div>
   					</div>

   				</div>
   				<div class="col-md-9">
                    <div class="panel panel-default">
                        <table class="table table-responsive table-responsive">
                            <thead><tr><th>Firma Adı</th> <th>Lat</th><th>Long</th><th>Kategori</th> <th>İçerik</th><th>Bitiş</th> <th></th></tr></thead>
                            <tbody><?php

                            if(empty($_GET["kat_id"])) $new = $db->firmalar(); else $new = $db->firmalar_cat($_GET["kat_id"]+0);

                            foreach ($new as $data){

                                ?>
                                <tr><th><?php echo $data["firma_ad"];?> </th>
                                    <th><?php echo $data["lat"];?> </th>
                                    <th><?php echo $data["lng"];?> </th>
                                    <th><?php echo $db->category_name($data["category"]); ?></th>
                                    <th><?php echo $data["icerik"];?></th>
                                    <th><?php echo $data["bitis"];?></th><th><a href="index.php?id=<?php echo $data["id"];?>">Sil</a></th></tr>
                                <?php
                            }
                            ?></tbody>
                        </table>
                    </div></div>


<?php
if(!empty($_GET["id"]) && $_SESSION["login_status"] != ""){
    if($db->firma_delete($_GET["id"]+0)){
        $_SESSION['hata'] = "Firma silindi";
        $_SESSION['tur'] = "success";
        header("Location:index.php");
    }else{
        $_SESSION['hata'] = "HATA ALINDI";
        $_SESSION['tur'] = "danger";
        header("Location:index.php");
    }
}


include 'footer.php'; ?>

   			
