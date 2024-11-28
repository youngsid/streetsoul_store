<div class="footer-body border-t">
    <div class="column left">
        <p><b>Chi Nhánh Hồ Chí Minh:</b></p>
        <p>Quận 1 - 160 Nguyễn Cư Trinh, Phường Nguyễn Cư Trinh.</p>
        <p>Quận 10 - 561 Sư Vạn Hạnh, Phường 13.</p>
        <p>Quận 1 - The New Playground 26 Lý Tự Trọng, Phường Bến Nghé.</p>
        <p>Quận 1 - Central Market 4 Phạm Ngũ Lão, Phường Phạm Ngũ Lão.</p>
        <p>Quận Gò Vấp - 326 Quang Trung, Phường 10.</p>
        <p><b>Chi Nhánh Biên Hòa:</b></p>
        <p>TP. Biên Hòa - 151A Phan Trung, Phường Tân Mai.</p>
        <p><b>Chi Nhánh Bình Dương:</b></p>
        <p>TP. Thủ Dầu Một - 28 Yersin, Phường Hiệp Thành.</p>
        <p><b>Chi Nhánh Cần Thơ:</b></p>
        <p>Quận Ninh Kiều - 52 Mậu Thân, Phường An Phú.</p>
        <p><b>Chi Nhánh Hà Nội:</b></p>
        <p>Đống Đa - 49-51 Hồ Đắc Di, Phường Nam Đồng.</p>
        <p><b>Chi Nhánh Hưng Yên:</b></p>
        <p>Văn Giang - PT.TV 136 - Mega Grand World - Ocean Park</p>
        <p><b>0933 800 190 - 1900252557</b></p>
        <p><b>csteamdcs@gmail.com</b></p>
    </div>
    <div class="column center">
        <h3>Mạng xã hội</h3>
        <div class="social-icons">
            <a href="https://www.facebook.com/DirtyCoins.VN/"><img src="./img/logofb.png" alt="Facebook"></a>
            <a href="https://www.youtube.com/channel/UCxLwKCNi6FoZ0lKu6k3qFGA"><img src="./img/logoyoutube.png" alt="YouTube"></a>
            <a href="https://www.instagram.com/dirtycoins.vn/"><img src="./img/logoins.jpg" alt="Instagram"></a>
        </div>
        <h3>Chính Sách</h3>
        <p>Chính sách bảo mật</p>
        <p>FAQ</p>
        <p>Chính Sách Thẻ Thành Viên</p>
        <p>Chính sách Bảo hành & Đổi trả</p>
        <p>Chính sách giao hàng hỏa tốc</p>
    </div>
    <div class="column right">
        <h3>Fanpage</h3>
        <div class="fanpage">
            <p><a href=""><img src="img/fanpage.png" alt=""></a></p>
        </div>
    </div>
</div>
<hr>
<div class="footer-final">
    <p>Copyright © 2023 Dirty Coins Studio. Powered by Sapo</p>
</div>
</footer>

<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toastBody = document.querySelector(".toast-body");
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)



    const handlerToast = (isType, message) => {
        if (isType === "success") {
            toastLiveExample.classList.remove("text-bg-danger")
            toastLiveExample.classList.add("text-bg-success")
            toastBody.textContent = message
        } else if (isType === "error") {
            toastLiveExample.classList.add("text-bg-danger")
            toastLiveExample.classList.remove("text-bg-success")
            toastBody.textContent = message
        }

        toastBootstrap.show()

    }
</script>
</body>

</html>