<?php

function showErrors($errors,$name){
    if ($errors->has($name)){
        echo '<div class="alert alert-danger" role="alert">';
        echo '<strong>'.$errors->first($name).'</strong>';
        echo '</div>';
    }
}

function getCate($cate,$parent,$tab,$idSelect){

	foreach($cate as $value){
		if($value['parent']==$parent){
            if ($value['id']==$idSelect) {
                echo '<option selected value="'.$value['id'].'">'.$tab.$value['name'].'</option>';
            }else{
                echo '<option value="'.$value['id'].'">'.$tab.$value['name'].'</option>';
            }

		    getCate($cate,$value['id'],$tab.'--|',$idSelect);
		}
	}
}


function showCate($cate,$parent,$tab){

	foreach($cate as $value){
		if($value['parent']==$parent){
            echo '<div class="item-menu"><span>'.$tab.$value['name'].'</span>
                <div class="category-fix">
                <a class="btn-category btn-primary" href="/admin/category/edit/'.$value['id'].'"><i class="fa fa-edit"></i></a>
                <a onclick="return del()" class="btn-category btn-danger" href="/admin/category/del/'.$value['id'].'"><i class="fas fa-times"></i></i></a>
                </div>
                </div>';


		    showCate($cate,$value['id'],$tab.'--|');
		}
	}
}



