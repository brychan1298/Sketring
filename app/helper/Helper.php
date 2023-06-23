<?php

if(!function_exists('set_active_pesanan')){
    function set_active_pesanan($uri, $output='max-w-full'){
        if(is_array($uri)){
            foreach($uri as $u){
                if(Route::is($u)){
                    return $output;
                }
            }
        }else{
            if(Route::is($uri)){
                return $output;
            }
        }
    }
}

if(!function_exists('set_active_pesanan_2')){
    function set_active_pesanan_2($uri, $output='font-bold'){
        if(is_array($uri)){
            foreach($uri as $u){
                if(Route::is($u)){
                    return $output;
                }
            }
        }else{
            if(Route::is($uri)){
                return $output;
            }
        }
    }
}

if(!function_exists('umkm_set_active_pesanan')){
    function umkm_set_active_pesanan($uri, $output='max-w-full'){
        if(is_array($uri)){
            foreach($uri as $u){
                if(Route::is($u)){
                    return $output;
                }
            }
        }else{
            if(Route::is($uri)){
                return $output;
            }
        }
    }
}

if(!function_exists('umkm_set_active_pesanan_2')){
    function umkm_set_active_pesanan_2($uri, $output='font-bold'){
        if(is_array($uri)){
            foreach($uri as $u){
                if(Route::is($u)){
                    return $output;
                }
            }
        }else{
            if(Route::is($uri)){
                return $output;
            }
        }
    }
}

?>
