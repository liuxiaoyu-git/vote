<html>
<head>

    <title>转盘抽奖</title>
    <!-- 这里是css部分 -->
    <style>
        #bg {
            width: 650px;
            height: 600px;
            margin: 0 auto;
            background: url(turntable-bg.jpg) no-repeat;
            position: relative;
        }
        img[src^="pointer"] {
            position: absolute;
            z-index: 10;
            top: 155px;
            left: 247px;
        }
        img[src^="turntable"] {
            position: absolute;
            z-index: 5;
            top: 60px;
            left: 116px;
            transition: all 4s;
        }
    </style>
</head>
<body>
    <table width="100%" height="100%">
        <tr>
		<tr>
            <td align="center"><div id="result">---</div></td>
	    </tr>
            <td align="center">
	<!-- 这里是HTML结构部分 --> 
    <div id="bg"><img src="pointer.png" alt="pointer"><img src="turntable.png" alt="turntable"></div>  
    <!-- 这里是js部分 -->
    <script>
        var oPointer = document.getElementsByTagName("img")[0];
        var oTurntable = document.getElementsByTagName("img")[1];
        var cat = 51.4; //总共7个扇形区域，每个区域约51.4度
        var num = 0; //转圈结束后停留的度数
        var offOn = true; //是否正在抽奖
        oPointer.onclick = function () {
            if (offOn) {
                oTurntable.style.transform = "rotate(0deg)";
                offOn = !offOn;
                ratating();
            }
        }
        //旋转
        function ratating() {
            var timer = null;
            var rdm = 0; //随机度数
            clearInterval(timer);
            timer = setInterval(function () {
                if (Math.floor(rdm / 360) < 3) { rdm = Math.floor(Math.random() * 3600); }
                else {
                    oTurntable.style.transform = "rotate(" + rdm + "deg)";
                    clearInterval(timer);
                    setTimeout(function () {
                        offOn = !offOn;
                        num = rdm % 360;
                        if (num <= cat * 1) { document.getElementById("result").innerHTML="面单999元"; }
                        else if (num <= cat * 2) { document.getElementById("result").innerHTML="免单50元"; }
                        else if (num <= cat * 3) { document.getElementById("result").innerHTML="免单10元"; }
                        else if (num <= cat * 4) { document.getElementById("result").innerHTML="免分期"; }
                        else if (num <= cat * 5) { document.getElementById("result").innerHTML="免分期"; }
                        else if (num <= cat * 6) { document.getElementById("result").innerHTML="白条额度"; }
                        else if (num <= cat * 7) { document.getElementById("result").innerHTML="未中奖"; }
                    }, 4000);
                }
            }, 30);
        }
    </script>
			</td>
	    </tr>
    </table>
</body>
</html>
