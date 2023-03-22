<?php

class Order
{
    public $id;
    public $side;
    public $orderType;
    public $datetime;
    public $price;
    public $quantity;
    public $status;
    
    public function __construct($id, $side, $orderType, $datetime, $price, $quantity, $status='default')
    {
        $this->id = $id;
        $this->side = $side;
        $this->orderType = $orderType;
        $this->datetime = $datetime;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->status = $status;
    }
}



class ME extends Order
{
    public $buyOrders = array();
    public $sellOrders = array();
    public $totalSell;
    public $totalBuy;
    public $noBuy;
    public $noSell;

    public function __construct($orders)
    {
        foreach($orders as $order)
        {
            if($order->side == 'buy')
            {
                $this->noBuy++;
                $this->totalBuy+=$order->quantity;
                array_push($this->buyOrders, $order);
            }
            else
            {
                $this->noSell++;
                $this->totalSell+=$order->quantity;
                array_push($this->sellOrders, $order);
            }
        }
    }
    public function update()
    {
        //read from DB and change limit to market if market price = order price
        
    }
    public function match()
    {
        //read market orders, from DB
        $exec = array();

        $rest = array();
        $match = array();

        $numerator = 0;
        $denominator = 0;
        if($this->totalSell>=$this->totalBuy)
        {
            $numerator = $this->totalBuy;
            $denominator = $this->totalSell;
            $arr = new ArrayObject($this->sellOrders);
        }
        else
        {
            $numerator = $this->totalSell;
            $denominator = $this->totalBuy;
            $arr = new ArrayObject($this->buyOrders);
        }
        foreach($arr as $order)
        {
            array_push($exec, $order->quantity*$numerator/(float)$denominator);
        }
        for($i = 0; $i < count($exec); $i++)
        {
            array_push($match, ($exec[$i]));
            array_push($rest, ($arr[$i]->quantity-$exec[$i]));
        }
        print_r($match);
        print('<br>');
        print_r($rest);
    }

}
$orders = array(
    new Order(1, 'buy', 'market', date("Y-m-d"), 7.43, 2, 'default'),
    new Order(2, 'sell', 'market', date("Y-m-d"), 7.43, 4, 'default'),
    new Order(2, 'sell', 'market', date("Y-m-d"), 7.43, 4, 'default'),
    new Order(3, 'buy', 'market', date("Y-m-d"), 7.43, 4, 'default')
    //new Order($id, $side, $orderType, $datetime, $price, $quantity, $status),
);

$ME = new ME($orders);
$ME->match();

?>