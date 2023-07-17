<?php 

declare(strict_types=1);

require "Node.php";
require "Double_Linked_list.php";

use Elements\Node;
use Elements\Double_Linked_List;


$head = new Node(1);
$linked_list = new Double_Linked_List($head); 
$linked_list->append(3);
$linked_list->append(6);
$linked_list->append(8);
$linked_list->append(2);
$linked_list->append(7);
// $linked_list->deleteByValue(2);
$linked_list->deleteByIndex(1);
$linked_list->insertNodeOnIndex(new Node(10),2);
$linked_list->dump(true);