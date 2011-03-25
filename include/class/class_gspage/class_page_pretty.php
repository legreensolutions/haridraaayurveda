<?php
// prevent execution of this page by direct call by browser
header ('Content-type: text/html; charset=utf-8');
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Page {
    // top part of html

    
    var $title='Green FrameWork';
    var $page_name='Home Page';
    var $layout='default.html';

    var $content_list = array();
    
    var $js_list = array();
    var $js_list_link = array();

    var $css_list = array();

    var $root_path='./';
    var $current_url ;
    
    function display(){
        
        $title=$this->title;
        $name=$this->name;
        $page_name = $this->page_name;
        $current_url = $this->current_url;

        if(count($this->content_list) > 0){
            foreach ($this->content_list as $content_tmp){
                if(isset($content_tmp['var_name']) && trim($content_tmp['var_name']) != ""){
                    ob_start();     
                        $file_name=$content_tmp['file_name'];
                        eval("\$file_name = \"$file_name\";");  
                        include($root_path.'include/'.$file_name);
                        if(isset($$content_tmp['var_name']) && trim($$content_tmp['var_name'])!=""){
                            $$content_tmp['var_name'] .= ob_get_contents();
                        }else{
                            $$content_tmp['var_name'] = ob_get_contents();
                        }
                    ob_end_clean();
                }else{
                        $file_name=$content_tmp['file_name'];
                        eval("\$file_name = \"$file_name\";");  
                        include($root_path.'include/'.$file_name);  
                }
            }
        }

        if(count($this->css_list) > 0){
            foreach ($this->css_list as $css_file){
                $file_name=$css_file;
                eval("\$file_name = \"$file_name\";");
               $css.='<link rel="stylesheet" type="text/css" href="http://'.$_SERVER["SERVER_NAME"].'/css/'.$file_name.'">';
            }
            
        }   
    
        if(count($this->js_list_link) > 0){
            foreach ($this->js_list_link as $js_link_file){
                $file_name=$js_link_file;
                eval("\$file_name = \"$file_name\";");  
                $js.='<script src="http://'.$_SERVER["SERVER_NAME"].'/js/'.$file_name.'" language="JavaScript" type="text/JavaScript"></script>';
            }   
        }

        if(count($this->js_list) > 0){
            $js.='<script language="JavaScript" type="text/JavaScript">';
            ob_start();
            foreach ($this->js_list as $js_file){
                $file_name=$js_file;
                eval("\$file_name = \"$file_name\";");  
                include($root_path.'js/'.$file_name);
            }
            $js .= ob_get_contents();
            ob_end_clean();
            $js.='</script>';
            
        }


        include($root_path.'layouts/'.$this->layout);
    }

    
    
    
    function get_content($content_list){
    
    ob_start();
        
        $current_url = $this->current_url;
        $myconnection = $this->db_connection;
        $page_name = $this->page_name;
        foreach ($content_list as $content){    
            include($root_path.'include/'.$content);    
        }
        $output = ob_get_contents();
    ob_end_clean();
        return $output;
    }


    
}// calss Page **************  END
?>