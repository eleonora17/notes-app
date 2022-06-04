$(function(){
    $(".theme-button").click(function(){
        if($(".theme").attr("href") == "./styles/lighttheme.css"){
            $(".theme").attr("href","./styles/darktheme.css");
            $("img").attr("src").replace(/light/g,"dark");
        }else{
            $(".theme").attr("href","./styles/lighttheme.css");
            $("img").attr("src").replace(/dark/g,"light");
        }
    })
});


