<?php

// cart
class Cart
{
    public $database = null;

    public function __construct(DBController $database)
    {
        if(!isset($database->con)) return null;
        $this->database = $database;
    }

    // insert
    public function insertintoCart($param = null, $table = 'Cart'){
        if($this->database->con != null){
            if($param != null){
                $columns = implode(',', array_keys($param));
                $values = implode(',', array_values($param));

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                $result = $this->database->con->query($query_string);
                return $result;
            }
        }
    }

    // addtocart
    public function addToCart($userid, $itemid){
        if(isset($userid) && isset($itemid)){
            $params = array(
                'user_id' => $userid,
                'item_id' => $itemid
            );
            $result = $this->insertintoCart($params);
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
        }
    }



    // Add to wishlist
    public function addtoWishilist($item_id = null, $saveTable = "Wishlist", $fromTable = "Cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            // execute multiple query
            $result = $this->database->con->multi_query($query);
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
}
?>