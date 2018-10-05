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
            header('Content-Description: File Transfer');
            header('Content-Type: application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename=work_order_template.xlsx');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: post-check=0, pre-check=0', false);
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Pragma: no-cache');
            header('Content-Length: '.filesize($path));

            // read the file from disk
            readfile($path);
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
