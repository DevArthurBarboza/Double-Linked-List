<?php 

namespace Elements;

use Elements\Node;
class Double_Linked_List
{
    protected Node|Null $head;
    protected Node|Null $tail;
    protected int|Null $size;


    public function __construct()
    {
        $this->size = 0;
        $this->head = null;
        $this->tail = null;
    }

    public function dump(bool $showRelationshipts = false)
    {
        $output = "";
        $node = $this->head;
        while($node != null){        
            if($showRelationshipts){
                $output .= $node->getValue() . $node->getData() . " -> ";
            }else{
                $output .= $node->getValue() . " -> ";
            }
            $node = $node->getNext();
        }
        echo $output;
    }

    public function append(Node $newNode)
    {
        if(is_null($this->head))
        {
            $this->head = $newNode;
            $this->tail = $newNode;
            $this->size++;
            return;
        }
        $this->tail->setNext($newNode);
        $newNode->setPrev($this->tail);
        $this->tail = $newNode;
        $this->size++;
    }

    public function search(Float $value): Float | Null 
    {
        $node = $this->head;
        $i = 0;
        do{
            if($node->getValue() == $value)
            {
                return $i;
            }
            $i++;
            $node = $node->getNext();
        }while($node != null);
        return null;
    } 

    public function deleteByValue(Float $value) : Int
    {
        $node = $this->head;
        $nodesDeleted = 0;

        do{
            if($node->getValue() == $value){
                if(!is_null($node->getNext())){
                    $node->getPrev()->setNext($node->getNext());
                }else{
                    $node->getPrev()->setNext(null);
                }
                $node->getNext()->setPrev($node->getPrev());
                $this->size--;
                $nodesDeleted++;
            }
            $node = $node->getNext();

        }while($node != null);
        return $nodesDeleted;
    }

    public function deleteByIndex(Int $index)
    {
        if($index >= $this->size){
            return false;
        }
        $node = $this->head;

        for($i = 0;$i < $this->size;$i++)
        {
            if($i == $index){
                if(!is_null($node->getNext())){
                    $node->getPrev()->setNext($node->getNext());
                }else{
                    $node->getPrev()->setNext(null);
                }
                $node->getNext()->setPrev($node->getPrev());
                $this->size--;
                return;
            }
            $node = $node->getNext();
        }
    }

    public function insertNodeOnIndex(Node $newNode,Int $index) : Bool 
    {
        if($index >= $this->size){
            return false;
        }
        $node = $this->head;
        for($i = 0;$i < $this->size;$i++){
            if($i == $index){
                $newNode->setPrev($node->getPrev());
                $node->getPrev()->setNext($newNode);
                $node->setNext($node->getNext()->getNext());
                return true;
            }
            $node = $node->getNext();
        }
        return false;
    }
}