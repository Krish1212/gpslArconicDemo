<?php
    require_once('.\vendor\autoload.php');
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Reader;
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
        exit;
    } else if(isset($_GET['file']) && isset($_GET['data'])) {
        $file = basename($_GET['file']);
        $path = "./downloads/" . $file;
        $data = json_decode($_GET['data']);
        if(!file_exists($path)){ // file does not exist
            die('file not found');
        } else {
            $input = $path;
            $output = "work-order-" . date("Ymd_His") . ".xlsx";
            $sheetName = "WorkOrder-Basic";
            
            /**  Define a Read Filter class implementing \PhpOffice\PhpSpreadsheet\Reader\IReadFilter  */
            class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
            {
                public function readCell($column, $row, $worksheetName = '') {
                    //  Read rows 1 to 7 and columns A to E only
                    if ($row >= 1 && $row <= 49) {
                        if (in_array($column,range('A','G'))) {
                            return true;
                        }
                    }
                    return false;
                }
            }

            /**  Create an Instance of our Read Filter  **/
            $filterSubset = new MyReadFilter();
            //create the reader object
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
            $reader->setLoadSheetsOnly($sheetName);
            $reader->setReadFilter($filterSubset);
            $spreadsheet = $reader->load($input);
            $spreadsheet->getActiveSheet()
                ->setCellValue('A17',$data[0]->{"product-quantity"})
                ->setCellValue('B17',$data[0]->{"product-desc"})
                ->setCellValue('A18',$data[1]->{"product-quantity"})
                ->setCellValue('B18',$data[1]->{"product-desc"});
            // redirect output to client browser
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $output . '"');
            header('Cache-Control: max-age=0');
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
            $writer->save("php://output");
            exit;
        }
    } else {
        die("<h1>Required parameters not present</h1>");
    }
?>