<?php
     $this->widget('ext.mPrint.mPrint', array(
          'title' => 'Imprime',          //the title of the document. Defaults to the HTML title
          'tooltip' => 'Print',        //tooltip message of the print icon. Defaults to 'print'
          'text' => 'Imprime Ficha',   //text which will appear beside the print icon. Defaults to NULL
          'element' => '#imprime',        //the element to be printed.
          
          //'publishCss' => true,       //publish the CSS for the whole page?
         // 'visible' => Yii::app()->user->checkAccess('print'),  //should this be visible to the current user?
          'alt' => 'print',       //text which will appear if image cant be loaded
          //'debug' => true,            //enable the debugger to see what you will get
          //'id' => 'link'         //id of the print link
      ));
?>
<div id='imprime'><?=$contenido;?></div>