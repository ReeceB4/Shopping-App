let shoppingCart = new Vue ({
            el : '#shoppingApp',
            data : {
                totalItems : 0,
                itemsObj : {},
                quantities : [],
                totalPrice : 0,
                priceArr : []
            },
            methods : {
                addToCart (){
                    let prodName = event.target.id;
                    //console.log(prodName);
                    let numberOfItems = parseInt(document.getElementById(prodName+"quantity").value);
                    //console.log(numberOfItems);
                    this.updateItemObj(this.itemsObj, prodName, numberOfItems);

                    this.calcTotalPrice(this.itemsObj);
                    this.priceArr = [];
                },
                updateItemsObj(obj, elem, item){
                    //obj[elem] = item;
                    //must use Vue.set when adding a reavtive property to an object
                    let itemObj = {};
                    Vue.set( itemObj, 'quantitiy', item);
                    Vue.set( obj, elem, itemObj );
                    this.totalItems = this.addAllCartItems(obj)
                },
                addAllCartItems(cartItems){
                    var x = 0;
                    var total = 0;
                    for (x in cartItems) {
                        //total += cartItems[x];
                        //console.log(cartItem[x].quantity);
                        tottal += Number (cartItems[x].quantity);
                    }
                    return total;
                },
                deleteItem(){
                    //returns property Boxers, Dress etc
                    let x = event.target.value;
                    //console.log(x);
                    this.updateItemsObj(this.itemsObj, x, 0);
                    this.calcTotalPrice(this.itemsObj);
                    this.priceArr = [];
                },
                dupplicateObj(obj){
                    for (x in obj){
                        
                    }
                }
            }
})