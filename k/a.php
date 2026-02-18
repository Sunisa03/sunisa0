<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sunisa</title>
<style>
    body { font-family: sans-serif; text-align: center; padding-top: 50px; }

  
    .btn-green {
        background-color: #28a745; color: white; padding: 15px 30px;
        border: none; cursor: pointer; border-radius: 5px; margin: 10px;
    }
    .btn-orange {
        background-color: #ffc107; color: black; padding: 15px 30px;
        border: none; cursor: pointer; border-radius: 5px; margin: 10px;
    }

    .modal {
        display: none; 
        position: fixed; z-index: 1; left: 0; top: 0;
        width: 100%; height: 100%; background-color: rgba(0,0,0,0.9);
    }
    .modal-content {
        margin: auto; display: block; width: 80%; max-width: 700px;
        margin-top: 50px; border-radius: 10px;
    }
    
    .close {
        position: absolute; top: 15px; right: 35px;
        color: #f1f1f1; fontSize: 40px; font-weight: bold; cursor: pointer;
    }
</style>
</head>

<body>

    <h1>งาน k 66010914020 สุนิสา จันทัน (เนย)</h1>

    <button class="btn-green" onclick="showImage('img/2.jpeg')">คลิก</button>
    <button class="btn-orange" onclick="showImage('img/1.jpg')">คลิก</button>

    <div id="myModal" class="modal">
        <span class="close" onclick="closeImage()">&times; ปิดรูปภาพ</span>
        <img class="modal-content" id="imgFull">
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("imgFull");

        function showImage(src) {
            modal.style.display = "block";
            modalImg.src = src;
        }

        function closeImage() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeImage();
            }
        }
    </script>

</body>
</html>