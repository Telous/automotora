jQuery(document).ready(function() {

    var $addTagLink = $('.add_item');
    // var item = $(".item");
    var $newLinkLi = $('.prototype');
    var $collectionHolder;

    $collectionHolder = $newLinkLi;
    $collectionHolder.append($newLinkLi);
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagLink.on('click', function(e) {
        e.preventDefault();
        addTagForm($collectionHolder, $newLinkLi);
    });

    $collectionHolder.find('.item').each(function() {
        removeItem($(this));
    });
});

function addTagForm($collectionHolder, $newLinkLi) {

    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolder.data('index');
    var newForm = prototype;
    
    newForm = newForm.replace(/__name__/g, index);
    $collectionHolder.data('index', index + 1);
    
    var $newFormLi = $('<div class="item col-sm-3"></div>').append(newForm);

    $newLinkLi.append($newFormLi);
    
    //boton borrar
    removeItem($newFormLi);
}

//boton borrar
function removeItem($newFormLi) {
    
    var $removeFormA = $('<a href="" class="btn btn-danger remove_imagen"><i class="fa fa-times" aria-hidden="true"></i></a>');

    $newFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        e.preventDefault();
        $newFormLi.fadeToggle(function(){
            $(this).remove();
        });
    });
}