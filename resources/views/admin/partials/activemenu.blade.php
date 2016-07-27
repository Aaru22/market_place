<?php
   $menu_array = [
       '1' => ['dashboard'],
       '4' => ['customer','patient','doctor','operator','agent','group'],
       '5' => ['settings']
    ];
?>
<?php
    $uri = Request::segment ( 1 );
    $menu_id = searchForId ( $uri, $menu_array );
    $class = '';
    if ($menu_id) {
        $id = "menu_" . $menu_id;
        echo "<script>$('#" . $id . "').addClass('active');</script>";
    }
   
    function searchForId($id, $array) {
        foreach ( $array as $key => $val ) {
            if (in_array ( $id, $val )) {
                return $key;
            }
        }
      return null;
    }

?>
