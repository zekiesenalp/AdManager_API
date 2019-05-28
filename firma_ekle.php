<?php include 'header.php'; ?>
<?php if($_SESSION["username"] != "") { ?>
    <div class="col-md-12">
        <div class="panel panel-primary panel-body">

            <form id="form" enctype="multipart/form-data" class="form-group" role="form" method="post">
                <div class="form-group">

                    <label>Firma Adı</label>

                    <input type="text" name="firma_ad" placeholder="Firma Adı" class="form-control" required>
                </div>
            <div class="form-group">

                    <label>Latitude</label>

                    <input type="text" name="lat" placeholder="lat" class="form-control" required>
                </div>
                <div class="form-group">

                    <label>Longtitude</label>

                    <input type="text" name="lng" placeholder="Longtitude" class="form-control" required>
                </div>
                <div class="form-group">

                    <label>Kategori</label>

                    <select name="category" class="input-lg"><?php $category = $db->cat_list();
                        foreach ($category as $data) { ?>
                            <option value="<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></option><?php } ?>
                    </select>
                </div>
                <div class="form-group">

                    <label>Bitiş Tarih</label>

                    <input type="date" name="date" placeholder="Tarih" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>İçerik</label>

                    <textarea name="body" id="body"></textarea>
                   <!---
                   	 <script>
                        CKEDITOR.replace('body');
                    </script>
						--->
                </div>
                <input type="submit" name="ekle" id="ekle" value="Firma Ekle" class="btn btn-primary btn-lg">
            </form>
        </div>
    </div>

    <?php

    if ($_POST['ekle']) {


        $firma_ad = $db->temizle($_POST["firma_ad"]);
        $cat = $db->temizle($_POST["category"]);
        $date = $db->temizle($_POST["date"]);
        $text = $_POST["body"];
        $lat = $_POST["lat"];
        $lng = $_POST["lng"];
        if (empty($cat) || empty($firma_ad) || empty($lat)  || empty($lng) || empty($date) || empty($text)) {
            $_SESSION['hata'] = "Tüm alanlari doldurun.";
            $_SESSION['tur'] = "danger";
            header("Location:kategori_ekle.php");
        } else {
            if ($db->firma_add($firma_ad, $cat, $date, $text, $lat, $lng)) {
                $_SESSION['hata'] = "Firma eklendi";
                $_SESSION['tur'] = "success";
                header("Location:index.php");

            } else {
                $_SESSION['hata'] = "Hata alındı. Tekrar deneyin.";
                $_SESSION['tur'] = "danger";
                header("Location:firma_ekle.php");
            }
        }
    }
}
include 'footer.php'; ?>
