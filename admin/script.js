
$(document).ready(function(){
    $("li.dropdown-item").on("click", function(){
        $("button#cat-btn").text($(this).text());
        $("input#course-cat").val($(this).text());
    });
});