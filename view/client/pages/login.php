<?php if (isset($error) && $error): ?>
    <script>
        // alert("<?php echo $error; ?>");
    </script>";
    </script>
<?php endif; ?>

<div class="w-full my-10 flex items-center justify-center">
    <div class="w-[400px] bg-white p-4 rounded-md border">
        <h4 class="font-xl font-medium pb-4 text-center">Đăng nhập</h4>

        <form method="POST" action="index.php?page=login">
            <label for="">Email</label>
            <input type="email" name="email" class="w-full py-2 px-2 border rounded-md my-1" required>
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="w-full py-2 px-2 border rounded-md my-1" required>

            <button type="submit" class="btn btn-primary mt-2">Đăng nhập</button>
        </form>

        <div class="border-t mt-4 py-2">
            <p>Bạn chưa có tài khoản ? <a href="index.php?page=register" class="text-blue-500">Đăng kí</a></p>
        </div>
    </div>
</div>