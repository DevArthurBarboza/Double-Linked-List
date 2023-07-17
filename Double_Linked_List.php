<?php 

namespace Elements;

use Elements\Node;
class Double_Linked_List
{
    protected Node $head;
    protected int $size;


    public function __construct(Node|float $head)
    {
        if(gettype($head) == "double" || gettype($head) == "integer"){
            $head = new Node($head);
        }
        $this->head = $head;
        $this->size = 1;
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


    public function append(Node|float $newNode)
    {
        $node = $this->head;
        while($node->getNext() != null){
            $node = $node->getNext();
        }

        if(gettype($newNode) == "double" || gettype($newNode) == "integer"){
            $newNode = new Node($newNode);
        }

        $node->setNext($newNode);
        $newNode->setPrev($node);
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
            throw new Exception('índice maior do que tamanho da lista');
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