<section class="main-content text-center p-4">
    <h1 class="text-2xl font-bold">THÔNG TIN HỆ THỐNG CỬA HÀNG FIVE MEN</h1>
    <p>Đăng bởi: Billy | 03/02/2023</p>
    
    <?php 
    $branches = [
        "HỒ CHÍ MINH" => [
            "160 Nguyễn Cư Trinh, Phường Nguyễn Cư Trinh, Quận 1",
            "561 Sư Vạn Hạnh, Phường 13, Quận 10",
            "The New Playground 26 Lý Tự Trọng, Phường Bến Nghé, Quận 1",
            "Gian 36 Central Market 4 Phạm Ngũ Lão, Phường Phạm Ngũ Lão, Quận 1",
            "326 Quang Trung,Phường 10, Quận Gò Vấp"
        ],
        "HÀ NỘI" => ["49-51 Hồ Đắc Di, Phường Nam Đồng, Quận Đống Đa"],
        "HƯNG YÊN" => ["PT.TV 136 - Mega Grand World - Ocean Park, Quận Văn Giang"],
        "BIÊN HÒA" => ["151A Phan Trung, Phường Tân Mai, Tp. Biên Hòa, Tỉnh Đồng Nai"],
        "BÌNH DƯƠNG" => ["28 Yersin, Phường Hiệp Thành, TP. Thủ Dầu Một, Tỉnh Bình Dương"],
        "CẦN THƠ" => ["52 Mậu Thân, Phường An Phú, Quận Ninh Kiều, Tp. Cần Thơ"]
    ];
    ?>
    
    <?php foreach ($branches as $city => $addresses) : ?>
        <h2 class="text-xl font-semibold mt-4">CHI NHÁNH <?= $city ?>:</h2>
        <?php foreach ($addresses as $address) : ?>
            <p><?= $address ?></p>
        <?php endforeach; ?>
        <hr class="my-2">
    <?php endforeach; ?>
    
    <p class="font-bold">0933 800 190 - 1900252557</p>
    <p>streetsoul_store@gmail.com</p>
</section>
