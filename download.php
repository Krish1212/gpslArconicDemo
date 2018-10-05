<?php
    if(isset($_GET['content'])){
        $contents = $_GET['content'];
        // echo $contents;
        header("Content-Type: text/csv");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=Order_Sheet.csv");
        header('Expires: 0');
        header('Cache-Control: no-cache');
        header('Pragma: no-cache');
        header('Content-Length: ' . strlen($contents));
        echo $contents;
        $complete = 1;
        exit;
    } else if(isset($_GET['file'])) {
        $file = basename($_GET['file']);
        $path = './downloads/' . $file;

        if(!file_exists($path)){ // file does not exist
            die('file not found');
        } else {
            header("Content-Type: application/ms-excel");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file");
            header('Expires: 0');
            header('Cache-Control: no-cache');
            header('Pragma: no-cache');
            header("Content-Length: " . filesize($file));

            // read the file from disk
            //readfile($file);
            $complete = 1;
            exit;
        }
    }
?>
<script>
    $(document).ready(function(){
        var downloaded = "<?php echo $complete;?>";
        if (downloaded){
            self.close();
        }
    });
</script>
