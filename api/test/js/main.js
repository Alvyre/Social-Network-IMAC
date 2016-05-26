$(document).ready(function(){

    $("#send").click(function(){
        var url = ".." + $("#url").val();

        var post = $("#post").val();
        if(post != ""){
            post = JSON.parse(post);
        }

        console.log("Url : "+url);
        console.log("Post :"+post);

        $.ajax({
            type : "POST",
            url : url,
            data : post,
            success : function(data){
                $("#result").html(data);
            }
        });
    });

});