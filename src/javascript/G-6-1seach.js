$(".box").on("click", function(){
    var acount_id = $(this).data('id');
    location.href='./G-4-1.php?acount_id='+acount_id;
});