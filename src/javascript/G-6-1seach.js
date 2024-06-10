$(".box").on("click", function(){
    var user_id = $(this).data('id');
    location.href='./G-4-1.php?user_id='+user_id;
});