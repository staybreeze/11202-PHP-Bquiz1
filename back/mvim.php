<!-- 有圖片 -->

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center">
            <tbody>
                <tr class="yel">
                    <td width="70%">動畫圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                // $DB=${ucfirst($do)};->已在DB設變數，因此可刪
                $rows = $DB->all();
                // $rows=$Mvim->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <!-- 在update.php，已經 $row['img']=$_FILES['img']['name']; -->
                            <img src="./img/<?= $row['img']; ?>" style="width:150;height:120px">
                        </td>
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        <td>

                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>

                        <td>
                            <!-- GET傳值 -->
                            <!-- 更新圖片是modal/upload轉update -->
                            <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更換動畫">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <!-- 新增圖片是到MODAL/title轉add -->
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增動畫圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>