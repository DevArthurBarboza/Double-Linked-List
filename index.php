<?php 

declare(strict_types=1);

require "Node.php";
require "Double_Linked_list.php";

use Elements\Node;
use Elements\Double_Linked_List;


$linked_list = new Double_Linked_List(); 
$linked_list->append(new Node(3));
$linked_list->append(new Node(6));
$linked_list->append(new Node(8));
$linked_list->append(new Node(2));
$linked_list->append(new Node(7));
// $linked_list->deleteByValue(2);
$linked_list->deleteByIndex(1);
$linked_list->insertNodeOnIndex(new Node(10),2);
$linked_list->dump(true);