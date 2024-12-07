<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .form-control {
            width: 100%;
            box-sizing: border-box;
        }

        .form-login__group-action {
            margin-bottom: 15px;
        }

        .button {
            text-align: center;
            width: 140px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 0px 15px;
            background-color: red;
            border-radius: 10px;
            border: none;
            color: white;
            position: relative;
            cursor: pointer;
            font-weight: 900;
            transition-duration: .2s;
            background: linear-gradient(0deg, #000, #272727);
        }

        .button:before,
        .button:after {
            content: '';
            position: absolute;
            left: -2px;
            top: -2px;
            border-radius: 10px;
            background: linear-gradient(45deg, #fb0094, #0000ff, #00ff00, #ffff00, #ff0000, #fb0094,
                    #0000ff, #00ff00, #ffff00, #ff0000);
            background-size: 400%;
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            z-index: -1;
            animation: steam 20s linear infinite;
        }

        @keyframes steam {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 400% 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        .button:after {
            filter: blur(50px);
        }
    </style>
</head>

<main class="container">
    <form 
        id="contactForm" 
        name="contactForm" 
        action="#" 
        method="post" 
        class="p-4 border rounded-3 shadow-sm animate__animated animate__fadeInUp" 
        style="max-width: 600px; margin: 0 auto;" 
        onsubmit="return validateForm(this);">
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email của bạn">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Họ và Tên:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">SĐT:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Nội dung:</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Nhập nội dung"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="button">Liên Hệ</button>
        </div>
    </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
