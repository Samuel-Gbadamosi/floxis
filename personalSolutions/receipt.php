<?php
//class receipt
class Receipt {

    private $items = array();
    private $total = 0;

    public function addItem($item, $price){

        $this->items[] = array('item' => $item, 'price' => $price);
        $this->total += $price;

    }

    public function printReceipt($filename){

        $file = fopen($filename , "w");

        fwrite($file , "=== RECEIPT ===\n\n");
        foreach($this->items as $item){
            fwrite($file , $item['item'] . " - $" . number_format($item['price'] ,2) . "\n");
        }
        fwrite($file , "\nTotal : $" . number_format($this->total ,2));

        fclose($file);

    }


}

//usage example
$receipt = new Receipt();
 $receipt->addItem("Item 1" , 10.50);
 $receipt->addItem("Item 2" , 5.99);
 $receipt->addItem("Item 3" , 25.99);
$receipt->printReceipt("receipt.txt");


?>