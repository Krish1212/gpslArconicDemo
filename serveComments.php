<?php

session_start();
if(!$_SESSION['uname']) die();

$username = $_SESSION['uname'];

header('Content-Type: application/json');
class DComment {
    public $data = '';
    public $user = '';
    public $coor = [];
}
class MComment {
    public $data = '';
    public $user = '';
}
$jFile = "data/comments.json";
$jsonData = json_decode(file_get_contents($jFile),true);
$type = isset($_POST['type']) ? $_POST['type'] : '';
$id =  isset($_POST['id']) ? $_POST['id'] : '';
if(empty($type)){
    echo '{"success":false,"message":"input data missing"}';
} 
if($type === 'get') {
    //echo $type;
    if(!empty($id)){
        getCommentbyId();
    } else {
        getAllComments();
    }
} else if($type === 'put') {
    putComment();
} else {
    echo '{"success":false,"message":"input data mismatch"}';
}
function getAllComments() {
    $page = $_POST['page'];
    try{
        $pageData = $GLOBALS['jsonData'][$page];
        $newjson = [];
        foreach($pageData as $key => $arr) {
            if($key != "url" && $arr['user'] == $GLOBALS['username']){ // include only the logged in user and skip url field
            //if($arr['user'] == $GLOBALS['username']){ // include only the logged in user
                unset($arr['user']); // remove user field
                $newjson[] = $arr;
            }
        }
        echo json_encode($newjson);
    }catch(Exception $e){
        echo 'Error: ' . $e->getMessage();
    }
}
function getCommentbyId(){
    $page = $_POST['page'];
    $id = $_POST['id'];
    try{
        $comment[$id] = $GLOBALS['jsonData'][$page][$id];
        echo json_encode($comment);
    }catch(Exception $e){
        echo 'Error: ' . $e->getMessage();
    }
}
function putComment(){
    $page = isset($_POST['page']) ? $_POST['page'] : '';
    $data = isset($_POST['data']) ? $_POST['data'] : '';
    $coor = isset($_POST['coor']) ? $_POST['coor'] : '';
    if(empty($page) || empty($data) || (($page == 'wiring' || $page == 'hydraulic') && empty($coor))){
        echo '{"success":false,"message":"input data missing"}';
    }
    $jsonObj;
    switch($page){
        case 'wiring':
        case 'hydraulic':
            $jsonObj = new DComment();
            $jsonObj->data = $data;
            $jsonObj->user = $GLOBALS['username'];
            $jsonObj->coor = $coor;
        break;
        case 'machinery':
            $jsonObj = new MComment();
            $jsonObj->user = $GLOBALS['username'];
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
                echo '{"success":true,"message":"data added"}';
            }
        } catch(Exception $e) {
            echo '{"success":false,"message":"' . $e->getMessage() . '"}';
        }
    }catch(Exception $e){
        echo '{"success":false,"message":"' . $e->getMessage() . '"}';
    }
}
//getCommentbyId();
//getAllComments();
//$response = putComment();
//echo $response;
?>