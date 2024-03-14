<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI KHOÁ HỌC</h1>
    </div>
    <div>
        <ul>
            <?php if(isset($_SESSION['error'])){
                foreach ($_SESSION['error'] as $er){
                    ?>
                    <li style="..."><?php echo $er; ?></li>
                    <?php
                }
            }?>
        </ul>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=addkhoahoc" method="post" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label>Danh mục</label>
                <select name="iddm">
                    <?php foreach ($listdmkhoahoc as $dm){
                        extract($dm);
                        echo "<option value = $id_danh_muc>$ten_danh_muc</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="row2 mb10">
                <label>Tên khoá học</label> <br>
                <input type="text" name="ten_khoa_hoc">
            </div>
            <div class="row2 mb10">
                <label>Giá</label> <br>
                <input type="text" name="gia">
            </div>
            <div class="row2 mb10">
                <label>Hình ảnh</label> <br>
                <input type="file" name="hinh_anh">
            </div>
            <div class="row2 mb10">
                <input class="mr20" type="submit" name="themmoi" value="Thêm mới">
                <input class="mr20" type="reset" value="Nhập lại">
                <a href="index.php?act=listkhoahoc"><input class="mr20" type="button" value="Danh sách"></a>
            </div>
            <?php
            if(isset($thongbao) && $thongbao!=""){
                echo $thongbao;
            }
            ?>

        </form>

    </div>
</div>