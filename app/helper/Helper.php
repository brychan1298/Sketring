<?php

if(!function_exists('set_active')){
    function set_active($uri, $output='max-w-full'){
        if(is_array($uri)){
            foreach($uri as $u){
                if(Route::is($u)){
                    return $output;
                }else{
                    return 'max-w-0';
                }
            }
        }else{
            if(Route::is($uri)){
                return $output;
            }else{
                return 'max-w-0';
            }
        }
    }
}

if(!function_exists('set_active_2')){
    function set_active_2($uri, $output='text-[#850000]'){
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

if(!function_exists('umkm_set_active')){
    function umkm_set_active($uri, $output='max-w-full'){
        if(is_array($uri)){
            foreach($uri as $u){
                if(Route::is($u)){
                    return $output;
                }else{
                    return 'max-w-0';
                }
            }
        }else{
            if(Route::is($uri)){
                return $output;
            }else{
                return 'max-w-0';
            }
        }
    }
}

if(!function_exists('umkm_set_active_2')){
    function umkm_set_active_2($uri, $output='font-bold'){
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

if(!function_exists('set_active_pesanan')){
    function set_active_pesanan($uri, $output='max-w-full'){
        if(is_array($uri)){
            foreach($uri as $u){
                if(Route::is($u)){
                    return $output;
                }else{
                    return 'max-w-0';
                }
            }
        }else{
            if(Route::is($uri)){
                return $output;
            }else{
                return 'max-w-0';
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
                }else{
                    return 'max-w-0';
                }
            }
        }else{
            if(Route::is($uri)){
                return $output;
            }else{
                return 'max-w-0';
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
