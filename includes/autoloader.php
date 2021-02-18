<?php
// auto include class files on creation
spl_autoload_register('loadClasses');

function loadClasses($className){

  $path = 'classes/'; //        path is root/classes/
  $extension = "_class.php";//  nomenclature for classses ex.: userview_class.php
  $fullPath = $path . $className . $extension;

  // Nicer error message if classname is mistyped or null referenced
  if (!file_exists($fullPath)){
    return false; //
  }

  require_once $path . $className . $extension; //requires-gets the class file
}
