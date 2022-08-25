<?php

namespace App\Classes;

class OrderByBase
{
    public string $order;
    public string $column;

    public function __construct(string $order = 'asc', string $column = 'created_at')
    {
        $this->order = $order;
        $this->column = $column;
    }
}
