<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <form action="index.php?act=listbl" method="post">
        
    </form>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">

                <table border="1">
                    <tr>
                        
                        <th>MÃ BÌNH LUẬN</th>
                        <th>MÃ SẢN PHẨM</th>
                        <th>MÃ KHÁCH HÀNG</th>
                        <th>NỘI DUNG</th>
                        <th>NGÀY ĐĂNG</th>
                        <th>ACT</th>
                    </tr>
                    <?php
                    if (isset($listbinhluan) && is_array($listbinhluan)) {
                        foreach ($listbinhluan as $binhluan) {
                            extract($binhluan);
                            $suabl = "index.php?act=suabl&id=" . $id;
                            $xoabl = "index.php?act=xoabl&id=" . $id;
                            
                            echo '<tr>
                  <td>' . $id . '</td>
                  <td>' . $idpro . '</td>
                  <td>' . $iduser . '</td>
                  <td>' . $noidung . '</td>
                  <td>' . $ngaybinhluan . '</td>
                  
                  <td>
                    <a href="' . $suabl . '"><input type="button" value="Sửa" /></a>
                    <a href="' . $xoabl . '"><input type="button" value="Xóa" /></a>
                  </td>
                </tr>';
                        }
                    } else {
                        
                        echo "No products found.";
                    }
                    
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <a href="index.php?act=addbl">
                    <input class="mr20" type="button" value="NHẬP THÊM" /></a>
            </div>
        </form>
    </div>
</div>