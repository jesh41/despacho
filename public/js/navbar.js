$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
});


$(".modal").on("hidden.bs.modal", function(){
       $(this).removeData('bs.modal');
});


