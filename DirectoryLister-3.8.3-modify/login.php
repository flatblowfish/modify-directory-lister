<?php
$password="1234";
session_start();
if (isset($_POST['password'])) {
	if ($_POST["password"] === $password) {
		$_SESSION['loggedin'] = true;
		unset($_SESSION['loginfail']);
	}else{
		unset($_SESSION['loggedin']);
		$_SESSION['loginfail'] = true;
	}
    header("Refresh:0");
    die();
}
if (!isset($_SESSION['loggedin'])) {
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="icon" href="<?php echo WEB_PATH . '/app/assets/images/owl.png'; ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- 安卓手机Chrome浏览器地址栏和安卓手机系统状态栏的主题颜色 -->
	<meta name="theme-color" content="#1ABC9C">
    <title>枫糖目录</title>
    <style>
        /* 设置字体 */
        @import url(https://fonts.googleapis.com/css?family=ZCOOL+KuaiLe:normal|Noto+Serif+SC:normal);
        *:not(i) {
            font-family: 'ZCOOL KuaiLe', 'Noto Serif SC','Microsoft YaHei',sans-serif !important;
        }

        /* 重置样式 */
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-weight: 300;
		}

		body {
			font-family: 'ZCOOL KuaiLe', 'Noto Serif SC','Microsoft YaHei',sans-serif !important;
			color: white;
			font-weight: 300;
		}

        /* 猫头鹰logo */
        .container-owl {
            position: relative;
            width: 400px;
            height: 200px;
            transform: scale(0.75);
            margin: 0 auto;
            margin-top: 50px;
        }

        .branch {
            position: absolute;
            height: 15px;
            width: 400px;;
            top: 160px;
            z-index: 1;
            border-radius: 0 15px 15px 0;
            background-color: #FC7753;
        }

        .owl {
            position: absolute;
            height: 160px;
            width: 120px;
            top: 25px;
            left: 30px;
            background-color: #CFAE69;
            border-radius: 120px;
        }

        .logo {
            position: absolute;
            top: 80px;
            left: 180px;
            font-size: 50px;
            font-weight: normal;
            color: greenyellow;
        }

        .branch>div {
            background-color: #FC7753;
            height: 8px;
            width: 50px;
            position: relative;
            transform: rotate(-30deg);
            -webkit-transform: rotate(-30deg);
            border-radius: 8px;
            bottom: 10px;
            left: 250px;
        }

        .ear-l,
        .ear-r {
            height: 0;
            width: 0;
            border-bottom: 33px solid #A6813B;
            border-right: 15px solid transparent;
            border-left: 15px solid transparent;
            position: relative;
            z-index: -2;
        }

        .ear-l {
            bottom: 10px;
            left: 3px;
            transform: rotate(-20deg);
            -webkit-transform: rotate(-20deg);
        }

        .ear-r {
            bottom: 42px;
            left: 88px;
            transform: rotate(20deg);
            -webkit-transform: rotate(20deg);
        }

        .eye-l,
        .eye-r {
            height: 41px;
            width: 41px;
            background-color: #A6813B;
            border-radius: 50%;
            position: relative;
            overflow: hidden;
        }

        .eye-l:before,
        .eye-r:before {
            content: '';
            position: absolute;
            height: 32px;
            width: 32px;
            border-radius: 50%;
            left: 4.5px;
            top: 4.5px;
            background-color: white;
        }

        .eye-l {
            bottom: 190px;
            left: 12px;
        }

        .eye-r {
            bottom: 230px;
            left: 67px;
        }

        .eyeball {
            height: 15px;
            width: 15px;
            background-color: #424142;
            border-radius: 50%;
            position: absolute;
            top: 13px;
            left: 13px;
        }

        .eyelid {
            height: 50px;
            width: 50px;
            background-color: #A6813B;
            position: relative;
            bottom: 30px;
            right: 10px;
            animation: blink 2s infinite;
            -webkit-animation: blink 2s infinite;
        }

        @keyframes blink {
            30% {
                transform: translateY(18px);
            }

        }

        @-webkit-keyframes blink {
            30% {
                -webkit-transform: translateY(18px);
            }
        }

        .wing-l,
        .wing-r {
            height: 80px;
            width: 20px;
            background-color: #A6813B;
            position: relative;
            z-index: 2;
        }

        .wing-l {
            right: 8px;
            top: 4px;
            border-radius: 20px 0;
        }

        .wing-r {
            border-radius: 0 20px;
            bottom: 76px;
            left: 108px;
        }

        .beak {
            width: 0;
            height: 0;
            border-left: 12px solid transparent;
            border-right: 12px solid transparent;
            border-top: 20px solid #FFCC30;
            border-radius: 50%;
            position: relative;
            bottom: 240px;
            left: 47.5px;
        }

        .leg-r,
        .leg-l {
            background-color: #FFCC30;
            height: 9px;
            width: 20px;
            border-radius: 8px;
            position: relative;
            z-index: 2;
        }

        .leg-l {
            bottom: 197px;
            left: 25px;
        }

        .leg-r {
            bottom: 206px;
            left: 75px;
        }

        /* 登录框 */
        body ::-webkit-input-placeholder {
			/* WebKit browsers */
			color: white;
			font-weight: 300;
		}

		body :-moz-placeholder {
			/* Mozilla Firefox 4 to 18 */
			color: white;
			opacity: 1;
			font-weight: 300;
		}

		body ::-moz-placeholder {
			/* Mozilla Firefox 19+ */
			color: white;
			opacity: 1;
			font-weight: 300;
		}

		body :-ms-input-placeholder {
			/* Internet Explorer 10+ */
			color: white;
			font-weight: 300;
		}

		.body-backgroud {
			width: 100%;
			overflow: hidden;
			position: fixed;
			top: 0;
			bottom: 0;
			background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
            z-index: -999;
		}

		.wrapper.form-success .container h1 {
			transform: translateY(85px);
		}

		.container-login {
			max-width: 600px;
			margin: 0 auto;
			text-align: center;
		}

		.container h1 {
			font-size: 40px;
			transition-duration: 1s;
			transition-timing-function: ease-in-put;
			font-weight: 200;
		}

		form {
			padding-top: 15px;
			position: relative;
			z-index: 2;
		}

		form input {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			outline: 0;
			border: 1px solid rgba(255, 255, 255, 0.4);
			background-color: rgba(255, 255, 255, 0.2);
			width: 250px;
			border-radius: 3px;
			padding: 10px 15px;
			margin: 0 auto 10px auto;
			display: block;
			text-align: center;
			font-size: 18px;
			color: white;
			transition-duration: 0.25s;
			font-weight: 300;
		}

		form input:hover {
			background-color: rgba(255, 255, 255, 0.4);
		}

		form input:focus {
			background-color: white;
			width: 300px;
			color: #53e3a6;
		}

		form button {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			outline: 0;
			background-color: white;
			border: 0;
			padding: 10px 15px;
			color: #53e3a6;
			border-radius: 3px;
			width: 250px;
			cursor: pointer;
			font-size: 18px;
			transition-duration: 0.25s;
		}

		form button:hover {
			background-color: #f5f7f9;
		}

		.alert-danger {
			text-align: center;
			font-size: 18px;
			color: white;
			font-weight: 300;
		}

        /* footer中的波浪 */
        footer {
            width: 100%;
            position: fixed;
            /* svg最后有空白 */
            bottom: -5px;
            min-width: 800px;
        }

        .wave {
            animation: wave 3s linear;
            animation-iteration-count: infinite;
            fill: #fcfcfc;
        }

        #wave2 {
            animation-duration: 5s;
            animation-direction: reverse;
            opacity: .6
        }
        #wave3 {
            animation-duration: 7s;
            opacity:.3;
        }
        @keyframes wave {
            to {
                transform: translateX(-100%);
            }
        }
        /* bubble动画 */
        .wrapper-bubble {
            position: absolute;
            top: 0;
            bottom: 0px;
            left: 0;
            right: 0;
            overflow: hidden;
            z-index: -999;
        }

        .bg-bubbles li {
            position: absolute;
            list-style: none;
            display: block;
            width: 40px;
            height: 40px;
            border-radius: 40px;
            background-color: rgba(255, 255, 255, 0.15);
            bottom: -160px;
            animation: bubble 10s infinite;
            transition-timing-function: linear;
        }
        .bg-bubbles li:nth-child(1) {
            left: 10%;
        }
        .bg-bubbles li:nth-child(2) {
            left: 20%;
            width: 80px;
            height: 80px;
            border-radius: 80px;
            animation-delay: 2s;
            animation-duration: 17s;
        }
        .bg-bubbles li:nth-child(3) {
            left: 25%;
            animation-delay: 4s;
        }
        .bg-bubbles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            border-radius: 60px;
            animation-duration: 22s;
            background-color: rgba(255, 255, 255, 0.25);
        }
        .bg-bubbles li:nth-child(5) {
            left: 70%;
        }
        .bg-bubbles li:nth-child(6) {
            left: 80%;
            width: 120px;
            height: 120px;
            border-radius: 120px;
            animation-delay: 3s;
            background-color: rgba(255, 255, 255, 0.2);
        }
        .bg-bubbles li:nth-child(7) {
            left: 32%;
            width: 160px;
            height: 160px;
            border-radius: 160px;
            animation-delay: 7s;
        }
        .bg-bubbles li:nth-child(8) {
            left: 55%;
            width: 20px;
            height: 20px;
            border-radius: 20px;
            animation-delay: 15s;
            animation-duration: 40s;
        }
        .bg-bubbles li:nth-child(9) {
            left: 25%;
            width: 10px;
            height: 10px;
            border-radius: 10px;
            animation-delay: 2s;
            animation-duration: 40s;
            background-color: rgba(255, 255, 255, 0.3);
        }
        .bg-bubbles li:nth-child(10) {
            left: 90%;
            width: 160px;
            height: 160px;
            border-radius: 160px;
            animation-delay: 11s;
        }

        @keyframes bubble {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-1000px);
            }
        }
    </style>
</head>
<body>
    <div class="container-owl">
        <div class="logo">枫糖目录</div>
        <div class="branch">
            <div></div>
        </div>
        <div class="owl">
            <div class="ear-l"></div>
            <div class="ear-r"></div>
            <div class="wing-l"></div>
            <div class="wing-r"></div>
            <div class="eye-l">
                <div class="eyeball"></div>
                <div class="eyelid"></div>
            </div>
            <div class="eye-r">
                <div class="eyeball"></div>
                <div class="eyelid"></div>
            </div>
            <div class="beak"></div>
            <div class="leg-l"></div>
            <div class="leg-r"></div>
        </div>
    </div>
    <div class="container-login">
        <?php if (isset($_SESSION['loginfail'])): ?>
            <div class="alert-danger">密码错误！</div>
            <?php unset($_SESSION['loginfail']); ?>
        <?php endif; ?>
        <form action="" method="post">
            <input type="password" name="password" placeholder="密码">
            <button type="submit" id="login-button">登录</button>
        </form>
    </div>
    <footer>
        <!-- viewBox最后一个数字是高 -->
        <svg viewBox="0 0 120 20">
            <defs>
                <mask id="xxx">
                    <circle cx="7" cy="12" r="40" fill="#fff" />
                </mask>

                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="
                   1 0 0 0 0
                   0 1 0 0 0
                   0 0 1 0 0
                   0 0 0 13 -9" result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
                <path id="wave"
                    d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
            </defs>
            <use id="wave1" class="wave" xlink:href="#wave" x="0" y="1" />
            <use id="wave2" class="wave" xlink:href="#wave" x="0" y="0"></use>
            <use id="wave3" class="wave" xlink:href="#wave" x="0" y="-2"></use>
        </svg>
    </footer>
    <div class="body-backgroud"></div>
    <div class="wrapper-bubble">
        <ul class="bg-bubbles">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
    </div>
</body>
</html>
<?php
    die();
}
?>
