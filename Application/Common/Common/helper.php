<?php
function getBytes($string) {
    $bytes = array();
    for($i = 0; $i < strlen($string); $i ){
        $bytes[] = ord($string[$i]);
    }
    return $bytes;
}
if ( ! function_exists( 'v' ) ) {
	function v( $name = null, $value = '[null]' ) {
		static $vars = array();
		if ( is_null( $name ) ) {
			return $vars;
		} else if ( $value == '[null]' ) {
			//取变量
			$tmp = $vars;
			foreach ( explode( '.', $name ) as $d ) {
				if ( isset( $tmp[ $d ] ) ) {
					$tmp = $tmp[ $d ];
				} else {
					return null;
				}
			}

			return $tmp;
		} else {
			//设置
			$tmp = &$vars;
			foreach ( explode( '.', $name ) as $d ) {
				if ( ! isset( $tmp[ $d ] ) ) {
					$tmp[ $d ] = array();
				}
				$tmp = &$tmp[ $d ];
			}

			return $tmp = $value;
		}
	}
}

function site_url($url,$args=[]){
    $info=explode('.',$url);
    return __APP__."?mo={$info[0]}&ac={$info[1]}&t=site&".http_build_query($args);
}
function web_url($url,$args=[]){
    $info=explode('.',$url);
    return __APP__."?mo={$info[0]}&ac={$info[1]}&t=web&".http_build_query($args);
}