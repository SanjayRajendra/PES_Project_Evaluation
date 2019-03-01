<?php
class PesExcel extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	$this->load->library('excel');
}	

public function excel_student()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('STUDENT DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Student Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'PROGRAM');
                $this->excel->getActiveSheet()->setCellValue('B8', 'SRN');
                $this->excel->getActiveSheet()->setCellValue('C8', 'STUDENT NAME');
                $this->excel->getActiveSheet()->setCellValue('C9', 'FIRST NAME');
                $this->excel->getActiveSheet()->setCellValue('D9', 'MIDDLE NAME');
                $this->excel->getActiveSheet()->setCellValue('E9', 'LAST NAME');
                $this->excel->getActiveSheet()->setCellValue('F8', 'BRANCH');
                $this->excel->getActiveSheet()->setCellValue('G8', 'YEAR');
                $this->excel->getActiveSheet()->setCellValue('H8', 'SEMESTER');
                $this->excel->getActiveSheet()->setCellValue('I8', 'SECTION');
                $this->excel->getActiveSheet()->setCellValue('J8', 'EMAIL');
                $this->excel->getActiveSheet()->setCellValue('K8', 'PHONE NUMBER');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:K2');
                $this->excel->getActiveSheet()->mergeCells('A3:K3');
                $this->excel->getActiveSheet()->mergeCells('A4:K4');
                $this->excel->getActiveSheet()->mergeCells('A5:K5');
                $this->excel->getActiveSheet()->mergeCells('A6:K6');
                $this->excel->getActiveSheet()->mergeCells('A7:K7');
                $this->excel->getActiveSheet()->mergeCells('C8:E8');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('I8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('J8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('K8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('K'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                /*$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(TRUE);
				$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(11);*/
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                 
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->query("select program,srn,fname,mname,lname,branch,year,sem,section,email,phoneno from student order by srn");
                $exceldata="";
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A10');
                $filename='Student_Details.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
 
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
                 
    }
    public function excel_faculty()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('FACULTY DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Faculty Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'TITLE');
                $this->excel->getActiveSheet()->setCellValue('B8', 'EMPID');
                $this->excel->getActiveSheet()->setCellValue('C8', 'FACULTY NAME');
                $this->excel->getActiveSheet()->setCellValue('C9', 'FIRST NAME');
                $this->excel->getActiveSheet()->setCellValue('D9', 'MIDDLE NAME');
                $this->excel->getActiveSheet()->setCellValue('E9', 'LAST NAME');
                $this->excel->getActiveSheet()->setCellValue('F8', 'DEPARTMENT');
                $this->excel->getActiveSheet()->setCellValue('G8', 'DESIGNATION');
                $this->excel->getActiveSheet()->setCellValue('H8', 'UG PROJECTS');
                $this->excel->getActiveSheet()->setCellValue('I8', 'PG PROJECTS');
                $this->excel->getActiveSheet()->setCellValue('J8', 'EMAIL');
                $this->excel->getActiveSheet()->setCellValue('K8', 'PHONE NUMBER');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:J2');
                $this->excel->getActiveSheet()->mergeCells('A3:J3');
                $this->excel->getActiveSheet()->mergeCells('A4:J4');
                $this->excel->getActiveSheet()->mergeCells('A5:J5');
                $this->excel->getActiveSheet()->mergeCells('A6:J6');
                $this->excel->getActiveSheet()->mergeCells('A7:J7');
                $this->excel->getActiveSheet()->mergeCells('C8:E8');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('I8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('J8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('K8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('K'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                /*$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(TRUE);
				$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(11);*/
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                 
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->query("select title,empid,name,mname,lname,department,designation,ug_projects,pg_projects,email,phoneno from faculty");
                $exceldata="";
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A10');
                $filename='Faculty_Details.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
 
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
                 
    }
    

 public function excel_project()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('PROJECT DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Project Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'SRN');
                $this->excel->getActiveSheet()->setCellValue('B8', 'STUDENT NAME');
                $this->excel->getActiveSheet()->setCellValue('B9', 'FIRST NAME');
                $this->excel->getActiveSheet()->setCellValue('C9', 'MIDDLE NAME');
                $this->excel->getActiveSheet()->setCellValue('D9', 'LAST NAME');
                $this->excel->getActiveSheet()->setCellValue('E8', 'PROJECT ID');
                $this->excel->getActiveSheet()->setCellValue('F8', 'PROJECT NAME');
                $this->excel->getActiveSheet()->setCellValue('G8', 'DOMAIN');
                $this->excel->getActiveSheet()->setCellValue('H8', 'GUIDE NAME');
                $this->excel->getActiveSheet()->setCellValue('H9', 'FIRST NAME');
                $this->excel->getActiveSheet()->setCellValue('I9', 'MIDDLE NAME');
                $this->excel->getActiveSheet()->setCellValue('J9', 'LAST NAME');
                
                
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:J2');
                $this->excel->getActiveSheet()->mergeCells('A3:J3');
                $this->excel->getActiveSheet()->mergeCells('A4:J4');
                $this->excel->getActiveSheet()->mergeCells('A5:J5');
                $this->excel->getActiveSheet()->mergeCells('A6:J6');
                $this->excel->getActiveSheet()->mergeCells('A7:J7');
                $this->excel->getActiveSheet()->mergeCells('B8:D8');
                $this->excel->getActiveSheet()->mergeCells('H8:J8');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('I9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
       			
       for($col = ord('A'); $col <= ord('J'); $col++){ 
       			$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(false);
				$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(10);
                //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
             
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->get("project_view");
                $exceldata="";
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A10');
                $filename='Project_Details.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
 
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
                 
    }

    public function excel_panel()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('PANEL DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Panel Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'SRN');
                $this->excel->getActiveSheet()->setCellValue('B8', 'STUDENT NAME');
                $this->excel->getActiveSheet()->setCellValue('B9', 'FIRST NAME');
                $this->excel->getActiveSheet()->setCellValue('C9', 'MIDDLE NAME');
                $this->excel->getActiveSheet()->setCellValue('D9', 'LAST NAME');
                $this->excel->getActiveSheet()->setCellValue('E8', 'PROJECT ID');
                $this->excel->getActiveSheet()->setCellValue('F8', 'PROJECT NAME');
                $this->excel->getActiveSheet()->setCellValue('G8', 'DOMAIN');
                $this->excel->getActiveSheet()->setCellValue('H8', 'GUIDE NAME');
                $this->excel->getActiveSheet()->setCellValue('H9', 'FIRST NAME');
                $this->excel->getActiveSheet()->setCellValue('I9', 'MIDDLE NAME');
                $this->excel->getActiveSheet()->setCellValue('J9', 'LAST NAME');
                $this->excel->getActiveSheet()->setCellValue('K8', 'PANEL_ID');
                $this->excel->getActiveSheet()->setCellValue('L8', 'DATE');
                
                
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:L2');
                $this->excel->getActiveSheet()->mergeCells('A3:L3');
                $this->excel->getActiveSheet()->mergeCells('A4:L4');
                $this->excel->getActiveSheet()->mergeCells('A5:L5');
                $this->excel->getActiveSheet()->mergeCells('A6:L6');
                $this->excel->getActiveSheet()->mergeCells('A7:L7');
                $this->excel->getActiveSheet()->mergeCells('B8:D8');
                $this->excel->getActiveSheet()->mergeCells('H8:J8');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('I9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('K9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('L9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('K8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('L8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
       			
       for($col = ord('A'); $col <= ord('L'); $col++){ 
       			$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(false);
				$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(10);
                //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
             
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->query("select * from panel_view order by panel_id");
                $exceldata="";
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A10');
                $filename='Panel_Details.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');             
    }

     public function excel_marks()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('MARKS DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Marks Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'PROJECT ID');
                $this->excel->getActiveSheet()->setCellValue('B8', 'SRN');
                $this->excel->getActiveSheet()->setCellValue('C8', 'STUDENT NAME');
                $this->excel->getActiveSheet()->setCellValue('C9', 'FIRST NAME');
                $this->excel->getActiveSheet()->setCellValue('D9', 'MIDDLE NAME');
                $this->excel->getActiveSheet()->setCellValue('E9', 'LAST NAME');
                $this->excel->getActiveSheet()->setCellValue('F8', 'GUIDE NAME');
                $this->excel->getActiveSheet()->setCellValue('F9', 'FIRST NAME');
                $this->excel->getActiveSheet()->setCellValue('G9', 'MIDDLE NAME');
                $this->excel->getActiveSheet()->setCellValue('H9', 'LAST NAME');
                $this->excel->getActiveSheet()->setCellValue('I8', 'PROJECT TITLE');
                $this->excel->getActiveSheet()->setCellValue('J8', 'EVALUATION_1');
                $this->excel->getActiveSheet()->setCellValue('K8', 'EVALUATION_2');
                $this->excel->getActiveSheet()->setCellValue('L8', 'EVALUATION_3');
                $this->excel->getActiveSheet()->setCellValue('M8', 'EVALUATION_4');
                $this->excel->getActiveSheet()->setCellValue('N8', 'EVALUATION_5');
                $this->excel->getActiveSheet()->setCellValue('O8', 'ISA');
                
                
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:O2');
                $this->excel->getActiveSheet()->mergeCells('A3:O3');
                $this->excel->getActiveSheet()->mergeCells('A4:O4');
                $this->excel->getActiveSheet()->mergeCells('A5:O5');
                $this->excel->getActiveSheet()->mergeCells('A6:O6');
                $this->excel->getActiveSheet()->mergeCells('A7:O7');
                $this->excel->getActiveSheet()->mergeCells('C8:E8');
                $this->excel->getActiveSheet()->mergeCells('F8:H8');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('I8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('J8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('K8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('L8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('M8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('N8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('O8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
       			
       for($col = ord('A'); $col <= ord('O'); $col++){ 
       			$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(false);
				$this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(10);
                //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
             
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->get("marks_view");
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A10');
                $filename='Marks_Details.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');             
    }
    public function excel_evaluation1()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('EVALUATION_1 DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Evaluation-1 Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'SRN');
                $this->excel->getActiveSheet()->setCellValue('B8', 'REAL WORLD APPLICATION (10)');
                $this->excel->getActiveSheet()->setCellValue('C8', 'TITLE (5)');
                $this->excel->getActiveSheet()->setCellValue('D8', 'METHOD (5)');
                $this->excel->getActiveSheet()->setCellValue('E8', 'PRESENTATION (10)');
                $this->excel->getActiveSheet()->setCellValue('F8', 'VIVA (10)');
                $this->excel->getActiveSheet()->setCellValue('G8', 'TOTAL (40)');
                $this->excel->getActiveSheet()->setCellValue('H8', 'REMARKS');
                
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:H2');
                $this->excel->getActiveSheet()->mergeCells('A3:H3');
                $this->excel->getActiveSheet()->mergeCells('A4:H4');
                $this->excel->getActiveSheet()->mergeCells('A5:H5');
                $this->excel->getActiveSheet()->mergeCells('A6:H6');
                $this->excel->getActiveSheet()->mergeCells('A7:H7');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
                
       for($col = ord('A'); $col <= ord('H'); $col++){ 
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(false);
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(10);
                //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
             
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->query("select * from evaluation1");
                $exceldata="";
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
        
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A9');
                $filename='evalation1.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');             
    }

    public function excel_evaluation2()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('EVALUATION_2 DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Evaluation-2 Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'SRN');
                $this->excel->getActiveSheet()->setCellValue('B8', 'PROGRESS (10)');
                $this->excel->getActiveSheet()->setCellValue('C8', 'PRESENTATION (10)');
                $this->excel->getActiveSheet()->setCellValue('D8', 'METHOD (10)');
                $this->excel->getActiveSheet()->setCellValue('E8', 'VIVA (10)');
                $this->excel->getActiveSheet()->setCellValue('F8', 'TOTAL (40)');
                $this->excel->getActiveSheet()->setCellValue('G8', 'REMARKS');
                
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:G2');
                $this->excel->getActiveSheet()->mergeCells('A3:G3');
                $this->excel->getActiveSheet()->mergeCells('A4:G4');
                $this->excel->getActiveSheet()->mergeCells('A5:G5');
                $this->excel->getActiveSheet()->mergeCells('A6:G6');
                $this->excel->getActiveSheet()->mergeCells('A7:G7');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
                
       for($col = ord('A'); $col <= ord('G'); $col++){ 
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(false);
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(10);
                //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
             
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->query("select * from evaluation2");
                $exceldata="";
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
        
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A9');
                $filename='evalation2.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');             
    }

    public function excel_evaluation3()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('EVALUATION_3 DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Evaluation-3 Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'SRN');
                $this->excel->getActiveSheet()->setCellValue('B8', 'PROGRESS (20)');
                $this->excel->getActiveSheet()->setCellValue('C8', 'PRESENTATION (10)');
                $this->excel->getActiveSheet()->setCellValue('D8', 'VIVA (10)');
                $this->excel->getActiveSheet()->setCellValue('E8', 'TOTAL (40)');
                $this->excel->getActiveSheet()->setCellValue('F8', 'REMARKS');
                
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:F2');
                $this->excel->getActiveSheet()->mergeCells('A3:F3');
                $this->excel->getActiveSheet()->mergeCells('A4:F4');
                $this->excel->getActiveSheet()->mergeCells('A5:F5');
                $this->excel->getActiveSheet()->mergeCells('A6:F6');
                $this->excel->getActiveSheet()->mergeCells('A7:F7');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
                
       for($col = ord('A'); $col <= ord('F'); $col++){ 
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(false);
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(10);
                //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
             
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->query("select * from evaluation3");
                $exceldata="";
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
        
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A9');
                $filename='evalation3.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');             
    }
    public function excel_evaluation4()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('EVALUATION_4 DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Evaluation-4 Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'SRN');
                $this->excel->getActiveSheet()->setCellValue('B8', 'PROGRESS (10)');
                $this->excel->getActiveSheet()->setCellValue('C8', 'PRESENTATION (10)');
                $this->excel->getActiveSheet()->setCellValue('D8', 'RESULT & DISCSSION (10)');
                $this->excel->getActiveSheet()->setCellValue('E8', 'VIVA (10)');
                $this->excel->getActiveSheet()->setCellValue('F8', 'TOTAL (40)');
                $this->excel->getActiveSheet()->setCellValue('G8', 'REMARKS');
                
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:G2');
                $this->excel->getActiveSheet()->mergeCells('A3:G3');
                $this->excel->getActiveSheet()->mergeCells('A4:G4');
                $this->excel->getActiveSheet()->mergeCells('A5:G5');
                $this->excel->getActiveSheet()->mergeCells('A6:G6');
                $this->excel->getActiveSheet()->mergeCells('A7:G7');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
                
       for($col = ord('A'); $col <= ord('G'); $col++){ 
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(false);
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(10);
                //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
             
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->query("select * from evaluation4");
                $exceldata="";
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
        
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A9');
                $filename='evalation4.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');             
    }    

    public function excel_evaluation5()
    {
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('EVALUATION_5 DETAILS');
                
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'PES University');
                $this->excel->getActiveSheet()->setCellValue('A3', '(Established under Karnataka Act no. 16 of 2013)');
                $this->excel->getActiveSheet()->setCellValue('A4', '100 Feet Ring Road, BSK 3rd Stage, Hosakerehalli, Bengaluru-560085');
                $this->excel->getActiveSheet()->setCellValue('A5', 'Session: Jan - May, 2018');
                $this->excel->getActiveSheet()->setCellValue('A6', 'Eighth Semester Project Presentation');
                $this->excel->getActiveSheet()->setCellValue('A7', 'Evaluation-5 Details');
                $this->excel->getActiveSheet()->setCellValue('A8', 'SRN');
                $this->excel->getActiveSheet()->setCellValue('B8', 'PROBLEM FORMULATION (5)');
                $this->excel->getActiveSheet()->setCellValue('C8', 'REVIEW OF LITERATURE(10)');
                $this->excel->getActiveSheet()->setCellValue('D8', 'DISCUSSION (15)');
                $this->excel->getActiveSheet()->setCellValue('E8', 'METHODOLOGY (10)');
                $this->excel->getActiveSheet()->setCellValue('F8', 'ORIGINALITY (10)');
                $this->excel->getActiveSheet()->setCellValue('G8', 'CONTRIBUTION (5)');
                $this->excel->getActiveSheet()->setCellValue('H8', 'PRESENTATION (10)');
                $this->excel->getActiveSheet()->setCellValue('I8', 'VIVA (10)');
                $this->excel->getActiveSheet()->setCellValue('J8', 'TOTAL (40)');
                $this->excel->getActiveSheet()->setCellValue('K8', 'REMARKS');
                
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A2:K2');
                $this->excel->getActiveSheet()->mergeCells('A3:K3');
                $this->excel->getActiveSheet()->mergeCells('A4:K4');
                $this->excel->getActiveSheet()->mergeCells('A5:K5');
                $this->excel->getActiveSheet()->mergeCells('A6:K6');
                $this->excel->getActiveSheet()->mergeCells('A7:K7');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setARGB('#333');
                
       for($col = ord('A'); $col <= ord('K'); $col++){ 
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(false);
                $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth(10);
                //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
             
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $query = $this->db->query("select * from evaluation5");
                $exceldata="";
                $exceldata = array();
        foreach ($query->result_array() as $row){
                $exceldata[] = $row;
        }
        
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A9');
                $filename='evalation5.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');             
    }

}
?>