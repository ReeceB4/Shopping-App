const isElemVisable = (elem, className)=> 
{
    $(elem).each(function(){
            //returns elements Y pos offset from document window
            let elementBottom = $(this).offset().top + $(this).outerHeight()/2;
            let windowBottom = $(window).scrollTop() + $(window).height();
            if( windowBottom > elementBottom ){
                $(this).addClass(className);
            }
        });    
}

$(document).ready(function() {
    isElemVisable('.fadeIn', 'isVisible');
    //will execute everytime user scrolls
    $(window).scroll( function(){
       isElemVisable('.fadeIn', 'isVisible'); 
    });//end scroll functionallity
    
});//end document.ready

const updateCartAjax = ()=> {
    let itemsArr = [];
    let itemsQuantity = [];
    let allItems = [];
    for(let items in shoppingCart.$data.itemsObj){
        //itemsArr.push(items);
        //itemsQuantity.push(shoppingCart.$data.itemsObj[items].quantity);
        allItems.push(items);
        allItems.push(shoppingCart.$data.itemsObj[items].quantity);

    }
    //allItems.push(itemsArr);
    //allItems.push(itemsQuantity);
    
    var xhr = new XMLHttpRequest();
        console.log(xhr.readyState);    

        // Track the state changes of the request.
        xhr.onreadystatechange = function () {
            const DONE = 4; // readyState 4 means the request is done.
            const OK = 200; // status 200 is a successful return.
            if (xhr.readyState === DONE) {
                if (xhr.status === OK) {
                    //console.log(xhr.responseText); // 'This is the output.'
                    console.log(xhr.readyState);
                } else {
                    console.log('Error: ' + xhr.status); // An error occurred during the request.
                }
            }
        };

        // Send the request to send-ajax-data.php
        xhr.open("GET", "http://test/Projects/shoppingApp/incl/cart.php?q="+allItems, true);
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

const cleanUpVue = (paramArrClean)=> {
    shoppingCart.cleanup(paramArrClean);
};

