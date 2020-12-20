



$(document).ready(function(){
    
    

    $("li.list-group-item").on("click", function(){
        console.log($(this).attr("videoUrl"));
        // $("video source ").attr({
        //     src : $(this).attr("videoUrl")
        // });

        $url = $(this).attr("videoUrl");
        $("#video").attr("src", $url);
    });

});