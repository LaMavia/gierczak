

$(document).ready(function() {
    
    var arrow_keys_handler = function(e) {
    switch(e.keyCode){
        case 37: case 39: case 38:  case 40: // Arrow keys
        case 32: e.preventDefault(); break; // Space
        default: break; // do not block other keys
    }
};
    window.addEventListener("keydown", arrow_keys_handler, false);
    
    $('html , body').animate({scrollLeft: 0}, 1000);
    
    function scrollAnim(e){
        var id = $(this).attr('href');
        var $id = $(id);
        var pos = $id.offset().left;
        
        
        if ($id.length === 0){
            return;
        }
        
        Event.preventDefault;
        
        $('html , body').animate({
            scrollLeft: pos } , 500);
            
    }
    
    $('a.next').on('click', scrollAnim);
    $('a.back').on('click', scrollAnim);
    
    
    
});