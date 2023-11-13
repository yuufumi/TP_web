<?php
require_once('model.php'); 
require_once("view.php");
class tdw_controller {
    //Table controller
    public function get_Table_controller(){
        $mtf=new tdw_model();
        $r=$mtf->get_Table_model();

        return $r;
    }
    public function get_smartphones_controller(){
        $mtf=new tdw_model();
        $r=$mtf->get_Smartphone_model();

        return $r;
    }

    public function get_Features_controller(){
        $mtf = new tdw_model();
        $r=$mtf->get_Features_model();

        return $r;
    }

    public function get_features_by_id($id){
        $mtf = new tdw_model();
        $r=$mtf->get_Feature_By_Id($id);

        return $r;
    }
    //display web site controller
    public function show_Website(){
        $v = new tdw_view();  // from view.php
        $v->show_Website();
    }
}

?>