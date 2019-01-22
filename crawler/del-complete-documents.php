<?php /* DEL ALL IN documents FOLDER */

set_time_limit(0);
ini_set('memory_limit', '-1');

if(PHP_SAPI!='cli') $cr='<script>window.scrollBy(0,document.body.scrollHeight);</script>';
$dir=dirname(__FILE__).'/documents';

if(PHP_SAPI!='cli') echo '<pre>';
rrmdir($dir,$cr);
echo 'DONE';

function rrmdir($d,$cr=''){
  if(is_dir($d)){
    $o = scandir($d);
    foreach($o as $fd){
      if($fd != '.' && $fd != '..'){
        if(filetype($d.'/'.$fd) == 'dir')
           rrmdir($d.'/'.$fd,$cr);
        else
          unlink($d."/".$fd); #print('FILE '.$fd.$cr."\n"); // DEV ONLY
      }
    }
    rrmdir($d,$cr); #print('DIR '.$d.$cr."\n"); // DEV ONLY
    reset($o);
  }
}
