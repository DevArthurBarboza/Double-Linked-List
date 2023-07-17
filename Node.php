<?php 

namespace Elements;

class Node
{

    protected float $value;
    protected Node|Null $prev;
    protected Node|Null $next;


    public function __construct(Float|Null $value)
    {
        $this->value = $value;
        $this->prev = null;
        $this->next = null;
    }

    public function getData()
    {
        if(is_null($this->getPrev())){
            $prevNumber = 0;
        }else{
            $prevNumber = $this->getPrev()->getValue();
        }
        if(is_null($this->getNext())){
            $nextNumber = 0;
        }else{
            $nextNumber = $this->getNext()->getValue();
        }        
        return "(" . $prevNumber . "," . $nextNumber . ")";
    }

    public function setNext(Node|Null $node)
    {
        $this->next = $node;
    }

    public function setPrev(Node|Null $node)
    {
        $this->prev = $node;
    }

    public function setValue(Float|Null $value)
    {
        if(is_null($value)){
            $value = rand(0,20);
        }
        $this->value = $value;
    }

    public function getValue() : Float|Null
    {
        return $this->value;
    }

    public function getNext() : Node|Null
    {
        return $this->next ?: null;
    }

    public function getPrev() : Node|Null
    {
        return $this->prev;
    }
}