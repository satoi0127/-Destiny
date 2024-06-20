<footer class="footer">
    <link rel="stylesheet" href="../css/G0-0.css">
    <div class="base">
        <button onclick="location.href='G-2-1destinyAll.php'" class="fm1">
            <img class="fimg" src="../image/Destiny(gray).png" width="25" height="25">
            <div class="font font1">Destiny</div>
        </button>
        <button onclick="location.href='G-5-1.php'" class="fm2">
            <img class="fimg" src="../image/Chat(gray).png" width="25" height="25">
            <div class="font font2">Chat</div>
        </button>
        <button onclick="location.href='G-3-1party.php'" class="fm3">
            <img class="fimg" src="../image/Party(gray).png" width="25" height="25">
            <div class="font font3">Party</div>
        </button>
        <button onclick="location.href='G-6-1seach.php'" class="fm4">
            <img class="fimg" src="../image/Search(gray).png" width="25" height="25">
            <div class="font font4">Search</div>
        </button>
        <button onclick="location.href='G-4-1.php'" class="fm5">
            <img class="fimg" src="../image/Profile(gray).png" width="25" height="25">
            <div class="font font5">Profile</div>
        </button>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var buttons = document.querySelectorAll('.fm1, .fm2, .fm3, .fm4, .fm5');

        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                var img = button.querySelector('.fimg');
                var font = button.querySelector('.font');
                if (img) {
                    var src = img.getAttribute('src').replace('(gray)', '(blue)');
                    img.setAttribute('src', src);
                }
                if (font) {
                    font.style.color = '#7AD9FA';
                }
            });

            button.addEventListener('mouseleave', function() {
                var img = button.querySelector('.fimg');
                var font = button.querySelector('.font');
                if (img) {
                    var src = img.getAttribute('src').replace('(blue)', '(gray)');
                    img.setAttribute('src', src);
                }
                if (font) {
                    font.style.color = '#777'; // 元の色に戻す
                }
            });
        });
    });
</script>