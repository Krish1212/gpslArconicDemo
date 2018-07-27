var jComments = {
    isInit : false
};

jComments.init = function(){
    if(!this.isInit ){
        console.log('init');
        this.isInit = true;
    }
};

jComments.get = function(key){
    console.log('get');
};

jComments.put = function(key, val){
    console.log('put');
};

