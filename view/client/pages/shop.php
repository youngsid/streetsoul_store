<div class="flex p-4 w-full min-h-screen">
    <div class="w-[300px] h-full">
        <h4 class="font-xl font-medium pb-4">Danh mục</h4>
        <?php
        foreach ($listCate as $index => $cate) {
        ?>
            <a
                href="index.php?page=shop&cate=<?= $cate['id'] ?>"
                class="w-full h-10 flex items-center hover:bg-gray-100 cursor-pointer px-2 <?= isset($_GET['cate']) && $_GET['cate'] == $cate['id'] ? "bg-blue-100 text-blue-500" : "" ?>">
                <?= $cate['name'] ?>
            </a>
        <?php
        }
        ?>
    </div>
    <div class=" flex-1 px-4">
        <h4 class="font-xl font-medium pb-4">Danh sách sản phẩm</h4>
        <div class=" grid grid-cols-4 gap-4">
            <?php
            foreach ($dataPro as $index => $data) {
            ?>
                
                <a href="index.php?page=productDetail&id=<?= $data['id'] ?>" class="group">
                    <img src="./uploads/<?= $data['image'] ?>" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8]">
                    <h3 class="mt-4 text-sm text-gray-700"><?= $data['name'] ?></h3>
                    <p class="mt-1 text-lg font-medium text-gray-900"><?= formatCurrency($data['price']) ?></p>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>