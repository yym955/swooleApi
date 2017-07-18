<?php
 
/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/*
 */
/*function __autoload( $class ) {
 $parts = explode('\\', $class);
 $file = File_ROOT.DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $parts) . '.php';   
 echo $file;
 if (is_file($file)) {  
  require_once($file);  
 } 
} 
spl_autoload_register( '__autoload' ); */

require __DIR__.'/src/Huoniao/Autoloader.php';
Huoniao\Autoloader::register();