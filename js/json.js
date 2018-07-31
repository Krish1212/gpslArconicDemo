var jComments = {
    idx : 0
};


/**
 * get previous comments
 * @param data :{
 *      'page'
 * }
 */
jComments.getPrevComments = function(data){
    console.log('jsComments get prev comments');
    if(data == null) return;
    $.ajax({
        url:"comments.php",
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
    $.ajax({
        url:"comments.php",
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

