<?php

//3. Требуется написать метод, принимающий на вход размеры двумерного массива и выводящий массив в виде инкременированной цепочки чисел, идущих по спирали против часовой стрелки.
//Примеры:
//2х3
//1 6
//2 5
//3 4
//
//3х1
//1 2 3
//4х4
//01 12 11 10
//02 13 16 09
//03 14 15 08
//04 05 06 07
//
//0х7
//Ошибка!

class Helix {
    public int $length;
    public int $height;
    public int $count;
    public array $helix = [];
    public int $posX = 0;
    public int $posY = 0;
    public int $counter = 1;


    function __construct(int $length, int $height) {
        $this->length = $length;
        $this->height = $height;
        $this->count = $length * $height;

        for ($i = 0; $i < $height; $i++) {
            $this->helix[$i] = [];
            for ($j = 0; $j < $length; $j++) {
                $this->helix[$i][] = 0;
            }
        }
    }

    public function show() {
        if ($this->length === 0 || $this->height === 0) {
            echo "Error";
        }

        foreach ($this->helix as $key) {
            foreach ($key as $value) {
                echo $value . "\t";
            }
            echo PHP_EOL;
        }
    }

    public function checkPosition($x, $y) {
        return $this->helix[$y][$x] === 0;
    }

    public function checkWall($x, $y) {
        return $x <= $this->height && $y <= $this->length;
    }

    public function addRound($x, $y, $val) {
        $this->helix[$y][$x] = $val;
    }

    public function nextStep() {
        while ($this->checkPosition($this->posX, $this->posY + 1) && $this->checkWall($this->posX, $this->posY + 1)) {
            $this->posY += 1;
            $this->addRound($this->posX, $this->posY, $this->counter);
            $this->counter++;
        }
        while ($this->checkPosition($this->posX + 1, $this->posY) && $this->checkWall($this->posX + 1, $this->posY)) {
            $this->posX += 1;
            $this->addRound($this->posX, $this->posY, $this->counter);
            $this->counter++;
        }
        while ($this->checkPosition($this->posX, $this->posY - 1) && $this->checkWall($this->posX, $this->posY - 1)) {
            $this->posY -= 1;
            $this->addRound($this->posX, $this->posY, $this->counter);
            $this->counter++;
        }
        while ($this->checkPosition($this->posX - 1, $this->posY) && $this->checkWall($this->posX - 1, $this->posY)) {
            $this->posX -= 1;
            $this->addRound($this->posX, $this->posY, $this->counter);
            $this->counter++;
        }
    }

    public function goHelix() {
        $this->addRound($this->posX, $this->posY, $this->counter);
        $this->counter++;
        while ($this->counter < $this->count) {
            $this->nextStep();
        }
    }

}

$helix = new Helix(4, 4);
$helix->goHelix();
$helix->show();
