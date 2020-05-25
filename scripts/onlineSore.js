const isElemVisable = (elem, className)=>
{
    $(elem).each(function(){
        //returns elements Y pos offset from document window
        let elementBottom = $(this).offset().top + $(this). outerHeight()/2;
        let windowBottom = $(window).scrollTop() + $(window).height();
        if( windowBottom > elementBottom ){
            $(this).addClass(className);
        }
    });
}

const updateCartAjax = ()=> {
    let itemsArr = [];
    let itemsQuantity = [];
    let allItems = [];
    for(let items in shoppingCart.$data.itemsObj){
        itemsArr.push(items);
        itemsQuantity.push(shippingCart.$data.itemsObj[items].quantity);
    }
    allItems.push(itemsArr);
    allItems.push(itemsQuantity);

    var xhr = new XMLHttpRequest();
        Console.log(xhr.readyState);

        //track the state changes of the request.
        xhr.onreadystatechange = function () {
            const DONE = 4; //readystate 4 means the request is done
            const OK = 200; //status 200 is successful return
            if (xhr.readyState === DONE) {
                if (xhr.status === OK) {
                    //console.log(xhr.responseText); // 'This is the output'
                    console.log(xhr.readyState);
                }else {
                    console.log('Error: ' + xhr.status);
                }
            }
        };

        //send the request to send-ajax-data.php
        xhr.open("GET", "http:"+allItems, true);
        xhr.send();
    console.log(allItems);
};

const overlayOn = ()=>{
    document.getElementById("overlay").style.display = "block";
    document.getElementById("editCart").style.display = "block";
    };

const overlayOff = ()=> {
    document.getElementById("overlay").style.display = "none";
    };

$(document).ready(function() {
    isElemVisable('.fadeIn', 'isVisible');
    //will execute everytime user scrollss
    $(window).scroll( function(){
        isElemVisable('.fadeIn', 'isVisable');
    });//end scroll functionallity
})// end document.ready