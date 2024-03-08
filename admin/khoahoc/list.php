<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH KHOÁ HỌC</h1>
    </div>
    <div class="row2 form_content">
        <form action="" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>TÊN KHOÁ HỌC</th>
                        <th>GIÁ</th>
                        <th>HÌNH ẢNH</th>
                        <th>DANH MỤC</th>
                        <th></th>
                    </tr>
                    
                    <?php 
                    if (isset($listkhoahoc) && is_array($listkhoahoc)) {
                    foreach ($listkhoahoc as $khoahoc){
                        extract($khoahoc);
                        $suakhoahoc = "index.php?act=suakhoahoc&id=" . $id;
                        $xoakhoahoc = "index.php?act=xoakhoahoc&id=" . $id;
                        $thongbaoxoa = "'"."Bạn có chắc chắn muốn xóa tin tức:".$ten_khoa_hoc."'";
                        $hinh_anh_path = "../uploads/".$hinh_anh;
                        if(is_file($hinh_anh_path)){
                            $hinh = "<img src='$hinh_anh_path' height='80' width='80'>";
                        }else{
                            $hinh = "Không có hình";
                        }
                        echo '<tr>
                        
                        <td>' .$ten_khoa_hoc.'</td>
                        <td>' .$gia. '</td>
                        <td>' .$hinh. '</td>
                        <td>' .$ten_danh_muc. '</td>
                        <td>
                          <a href="'.$suakhoahoc.'"><input type="button" value="Sửa"/></a>
                          <a href="'.$xoakhoahoc.'" onclick="return confirm('.$thongbaoxoa.')" role="button"><input type="button" value="Xóa"/></a>
                        </td>
                      </tr>';
                    }
                } else {
                        
                    echo "No courses found.";
                }
                    ?>
                </table>
            </div>

            <div class="row mb10">
                <a href="index.php?act=addkhoahoc">
                    <input class="mr20" type="button" value="NHẬP THÊM"/>
                </a>
            </div>
        </form>

    </div>
</div>
