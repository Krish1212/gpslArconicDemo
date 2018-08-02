var jComments = {
    url : 'serveComments.php'
};


jComments.getPrevComments = function(data){
    console.log('jsComments get prev comments');
    var _this = this;
    data = data || {};
    data.type = 'get';
    data.page = whereami;
    var response = null;
    $.ajax({
        url: _this.url,
        type:"POST",
        data:data,
        beforeSend: function(){
        },
        complete: function(){
        },
        success: function(res){
            console.log("response from comments.php");
            console.log(res);
            response = res;
        },
        error: function(err){
            alert(err);
            console.error(err);
        }
    });
    return response;
};

jComments.getCommentbyID = function(data){
    console.log('jsComments get prev comments');
    if(data == null) return;
    var _this = this;
    data.type = 'get';
    data.page = whereami;
    $.ajax({
        url: _this.url,
        type:"POST",
        data:data,
        beforeSend: function(){
        },
        complete: function(){
        },
        success: function(res){
            console.log("response from comments.php");
            console.log(res);
        },
        error: function(err){
            alert(err);
            console.error(err);
        }
    });    
};

jComments.putComments = function(data){
    console.log('jsComments save comments...');
    if(data == null) return;
    data.type = 'put';
    data.page = whereami;
    var _this = this;
    var response = false;
    $.ajax({
        url: _this.url,
        type:"POST",
        data:data,
        beforeSend: function(){
        },
        complete: function(){
        },
        success: function(res){
            console.log("response from comments.php");
            console.log(res);
            response = res;
        },
        error: function(err){
            console.log(err);
            response = {success:false, msg: err};
        }
    });
    return response;
};

