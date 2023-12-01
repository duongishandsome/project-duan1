<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Giao diện web bán hàng nội thất</title>
    <style>
    /* Bố cục trang web */

    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }

    header {
        background-color: #f1f1f1;
        padding: 20px;
        text-align: center;
    }

    main {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main ul {
        padding-left: 50vh;

    }

    .product-grid {
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        gap: 20px;
    }

    .search-bar {
        margin: 20px auto;
        width: 50%;
        display: flex;
        justify-content: space-between;
    }

    footer {
        background-color: #f1f1f1;
        padding: 20px;
        text-align: center;
    }

    /* Kiểu dáng các thành phần */

    h1 {
        font-size: 2em;
        margin: 0;
    }

    .bi-emoji-smile {
        width: 5vw;
        /* Chiếm 50% chiều rộng của màn hình */
        height: auto;
        /* Duy trì tỷ lệ khung hình ban đầu */
        display: block;
        /* Đảm bảo biểu tượng hiển thị như một khối */
        margin: 0 auto;
        /* Căn giữa theo chiều ngang */
    }

    main li {
        font-size: 1.5em;

    }
    </style>
</head>

<body>
    <header>
        <h1>Chào mừng bạn đến với giao diện quản lý website !<i class="bi bi-emoji-smile"></i></h1>
    </header>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile"
            viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
            <path
                d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5" />
        </svg>
        <!-- <ul>
            <li>Danh mục : quản lý danh mục nội thất</li>
            <li>Sản phẩm : quản lý sản phẩm nội thất</li>
            <li>Cài đặt sản phẩm: quản lý màu sắc và kích thước</li>
            <li>Tài khoản : quản lý mọi tài khoản</li>
            <li>Voucher : quản lý mã giảm giá</li>
            <li>Bình luận : quản lý bình luận</li>
            <li>Thống kê : Thống kê số liệu hàng hóa của website</li>
        </ul> -->
    </main>
    <footer>
        <p>Copyright © 2023</p>
    </footer>
</body>

</html>