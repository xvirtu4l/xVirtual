<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH TIN TỨC</h1>
    </div>
    <div class="row2 form_content">
        <form action="" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>TIÊU ĐỀ</th>
                        <th>NỘI DUNG</th>
                        <th>HÌNH ẢNH</th>
                        <th>DANH MỤC</th>
                        <th></th>
                    </tr>
                    
                    <?php 
                    if (isset($listtintuc) && is_array($listtintuc)) {
                    foreach ($listtintuc as $tintuc){
                        extract($tintuc);
                        $suatintuc = "index.php?act=suatintuc&id=" . $id_tintuc;
                        $xoatintuc = "index.php?act=xoatintuc&id=" . $id_tintuc;
                        $thongbaoxoa = "'"."Bạn có chắc chắn muốn xóa tin tức:".$tieu_de."'";
                        $hinh_anh_path = "../uploads/".$hinh_anh;
                        if(is_file($hinh_anh_path)){
                            $hinh = "<img src='$hinh_anh_path' height='80' width='80'>";
                        }else{
                            $hinh = "Không có hình";
                        }
                        echo '<tr>
                        
                        <td>' .$tieu_de.'</td>
                        <td>' .$noi_dung. '</td>
                        <td>' .$hinh. '</td>
                        <td>' .$ten_danhmuc. '</td>
                        <td>
                          <a href="'.$suatintuc.'"><input type="button" value="Sửa"/></a>
                          <a href="'.$xoatintuc.'" onclick="return confirm('.$thongbaoxoa.')" role="button"><input type="button" value="Xóa"/></a>
                        </td>
                      </tr>';
                    }
                } else {
                        
                    echo "No news found.";
                }
                    ?>
                </table>
            </div>

            <div class="row mb10">
                <a href="index.php?act=addtintuc">
                    <input class="mr20" type="button" value="NHẬP THÊM"/>
                </a>
            </div>
        </form>

    </div>
</div>
