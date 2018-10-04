<?php
    $file = basename($_GET['file']);
    $path = './downloads/' . $file;

    if(!file_exists($path)){ // file does not exist
        die('file not found');
    } else {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        // read the file from disk
        readfile($file);
    }
/*
    $contents = $_GET['content'];
    // echo $contents;
    header("Content-Type: text/csv");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=Order_Sheet.csv");
    header('Expires: 0');
    header('Cache-Control: no-cache');
    header('Pragma: no-cache');
    header('Content-Length: ' . strlen($contents));
    echo $contents;*/
    $complete = 1;
    exit;
?>
<script>
    $(document).ready(function(){
        var downloaded = "<?php echo $complete;?>";
        if (downloaded){
            self.close();
        }
    });
</script>
