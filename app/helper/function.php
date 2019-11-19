<?php

function showErrors($errors,$name){
    if ($errors->has($name)){
        echo '<div class="alert alert-danger" role="alert">';
        echo '<strong>'.$errors->first($name).'</strong>';
        echo '</div>';
    }
}

function getCate($cate,$parent,$tab){

	foreach($cate as $value){
		if($value['parent']==$parent){
			echo '<option value="'.$value['id'].'">'.$tab.$value['name'].'</option>';
		    getCate($cate,$value['id'],$tab.'--|');
		}
	}
}



