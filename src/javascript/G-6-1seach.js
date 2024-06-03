$(".box").on("click", function(){
    var post_id = $(this).data('id');
    location.href='./G-4-1.php?acount_id='+post_id;
});