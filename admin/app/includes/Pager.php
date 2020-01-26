<?php

// Simple abstraction representing calculations for Pagination

class Pager
{
    public $start;
    public $end;
    public $limit;

    function __construct($limit,$offset)
    {
        $this->limit = $limit;
        $this->start = $this->limit * $offset;
        $this->end = $this->start+$this->limit;
    }
}
