<?php
require './view/includes/header.php';
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
            <form action="index.php?controller=article&action=add" method="post" enctype="multipart/form-data">
                <input type="hidden" name="path" value="../images/article/">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutName">Tiêu đề</span>
                    <input type="text" class="form-control" name="txtArtTitle">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutName">Tên bài hát</span>
                    <input type="text" class="form-control" name="txtArtBh">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutName">Tên thể loại</span>
                    <select name="txtArtTL" class="form-select" required>
                        <option selected></option>
                        <?php foreach ($categories as $item) : ?>
                            <option value="<?php echo $item->getMa_tloai() ?>"><?php echo $item->getTen_tloai() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutName">Tóm tắt</span>
                    <textarea name="txtArtTt" class="form-control" rows="3"></textarea>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutName">Nội dung</span>
                    <textarea name="txtArtContent" class="form-control" rows="9"></textarea>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutName">Tên tác giả</span>
                    <!-- <input type="text" class="form-control" name="txtAutId"> -->
                    <select name="txtAutId" class="form-select" aria-label="" required>
                        <option selected></option>
                        <?php foreach ($authors as $item) : ?>
                            <option value="<?php echo $item->getMaTgia() ?>"><?php echo $item->getTenTgia() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutImg">Hình ảnh</span>
                    <input type="file" class="form-control" name="img">
                </div>
                <div class="form-group float-end">
                    <input type="submit" value="Thêm" class="btn btn-success">
                    <a href="article.php" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require './view/includes/footer.php';
?>