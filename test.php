<?php

class TwoWayList
{
  private $position = 0;
  // Предыдущий элемент
   public $next = null;
   // Следующий элемент
   public $prev = null;
   // Полезная нагрузка
   public $value = null;

   public function __construct($value = 0, $element = null) {
     if(isset($element)) {
       // Если передан элемент, вставляем новый в конце очереди
       $this->next = null;
       $this->prev = $element;
       $element->next = $this;
     } else {
       // Если элемент пуст, считаем новый элемент началом очереди
       $this->next = null;
       $this->prev = null;
     }
     $this->value = $value;
     $this->position = 0;
   }

   public function addAfter($element) {
     $element->prev = $this;
     $element->next = $this->next;

     if(isset($this->next))
       $this->next->prev = $element;
     $this->next = $element;
   }

   public function addBefore($element) {
     $element->next = $this;
     $element->prev = $this->prev;

     if(isset($this->prev))
       $this->prev->next = $element;
     $this->prev = $element;
   }

   public function deleteNext() {
     if(isset($this->next)) {
       if(isset($this->next->next)) {
         $this->next->next->prev = $this;
       }
       $this->next = $this->next->next;
     }
   }

      public function deletePrev() {
     if(isset($this->prev)) {
       if(isset($this->prev->perv)) {
         $this->prev->prev->next = $this;
       }
       $this->prev = $this->prev->prev;
     }

   }

      public function printForward() {
     echo $this->value."<br />";
     if(isset($this->next))
       $this->next->printForward();
   }

      public function printBackward() {
     echo $this->value."<br />";
     if(isset($this->prev))
       $this->prev->printBackward();
   }

      public function rewind() {

           $this->position = 0;
       }

      public function current() {

           return $this->array[$this->position];
       }

      public function key() {

           return $this->position;
       }

      public function next() {

           ++$this->position;
       }

      public  function valid() {

           return isset($this->array[$this->position]);
       }
 }

 ?>
