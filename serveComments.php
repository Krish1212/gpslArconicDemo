<?php
header('Content-Type: application/json');
class DComment {
    public $data = '';
    public $coor = [];
}
class MComment {
    public $data = '';
}
$jFile = "data/comments.json";
$jsonData = json_decode(file_get_contents($jFile),true);
$type = isset($_POST['type']) ? $_POST['type'] : '';
$id =  isset($_POST['id']) ? $_POST['id'] : '';
if(empty($type)){
    return '{"success":false,"message":"input data missing"}';
} 
if($type === 'get') {
    if(!empty($id)){
        getCommentbyId();
    } else {
        getAllComments();
    }
} else if($type === 'put') {
    putComment();
} else {
    return '{"success":false,"message":"input data mismatch"}';
}
function getAllComments() {
    $page = $_POST['page'];
    try{
        $pageData = $GLOBALS['jsonData'][$page];
        return $pageData;
    }catch(Exception $e){
        echo $e->getMessage();
        return 'Error: ' . $e->getMessage();
    }
}
function getCommentbyId(){
    $page = $_POST['page'];
    $id = $_POST['id'];
    try{
        $comment[$id] = $GLOBALS['jsonData'][$page][$id];
        return $comment;
    }catch(Exception $e){
        echo $e->getMessage();
        return 'Error: ' . $e->getMessage();
    }
}
function putComment(){
    $page = isset($_POST['page']) ? $_POST['page'] : '';
    $data = isset($_POST['data']) ? $_POST['data'] : '';
    $coor = isset($_POST['coor']) ? $_POST['coor'] : '';
    if(empty($page) || empty($data) || (($page == 'wiring' || $page == 'hydraulic') && empty($coor))){
        return '{"success":false,"message":"input data missing"}';
    }
    $jsonObj;
    switch($page){
        case 'wiring':
        case 'hydraulic':
            $jsonObj = new DComment();
            $jsonObj->data = $data;
            $jsonObj->coor = $coor;
        break;
        case 'machinery':
            $jsonObj = new MComment();
            $jsonObj->data = $data;
        break;
    }
    try{
        $pageData = $GLOBALS['jsonData'];
        if(empty($pageData[$page])){
            $pageData[$page]["1"] = $jsonObj;
        } else {
            array_push($pageData[$page],$jsonObj);
        }
        $pageData = json_encode($pageData, JSON_PRETTY_PRINT);
        try{
            if(file_put_contents($GLOBALS['jFile'],$pageData)){
                return '{"success":true,"message":"data added"}';
            }
        } catch(Exception $e) {
            return '{"success":false,"message":"' . $e->getMessage() . '"}';
        }
    }catch(Exception $e){
        return '{"success":false,"message":"' . $e->getMessage() . '"}';
    }
}
//getCommentbyId();
//getAllComments();
//$response = putComment();
//echo $response;
?>