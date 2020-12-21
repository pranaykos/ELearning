



$(document).ready(function(){
    
    

    $("li.list-group-item").on("click", function(){
        // console.log($(this).attr("videoUrl"));
        // $("video source ").attr({
        //     src : $(this).attr("videoUrl")
        // });

        $url = $(this).attr("videoUrl");
        $("#video").attr("src", $url);
        $("li.list-group-item").removeClass("bg-info");
        $("li.list-group-item").removeClass("text-light");
        $(this).addClass("bg-info");
        $(this).addClass("text-light");
    });



});