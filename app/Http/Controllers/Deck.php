<?php

namespace App\Http\Controllers;

class Deck
{
    //
    public $deck;

    public function __construct($deck = null)
    {
        $this->deck = $this->createDeck();
    }

    public function createSuit($suit) {
        return [
            new Card($suit, 'K'),
            new Card($suit, 'Q'),
            new Card($suit, 'J'),
            new Card($suit, 'X'),
            new Card($suit, '9'),
            new Card($suit, '8'),
            new Card($suit, '7'),
            new Card($suit, '6'),
            new Card($suit, '5'),
            new Card($suit, '4'),
            new Card($suit, '3'),
            new Card($suit, '2'),
            new Card($suit, 'A')
        ];
    }

    public function createDeck()
    {
        return array_merge(
            $this->createSuit('D'),
            $this->createSuit('C'),
            $this->createSuit('S'),
            $this->createSuit('H'),
        );
    }


    public function arrayDeck()
    {
        foreach ($this->deck as $i => $v)
        {
            $arrayDeck[$i] = $v->value;
        }

        return $arrayDeck;
    }
}
