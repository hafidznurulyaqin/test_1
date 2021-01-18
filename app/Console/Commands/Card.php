<?php

namespace App\Console\Commands;

use App\Http\Controllers\Deck;
use Illuminate\Console\Command;

class Card extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'card:start';
    protected $deck;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Card Game Start';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Deck $decks)
    {
        parent::__construct();
        $this->deck = $decks;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $players = $this->ask('How Many player will play the game ? ');


        if(!is_numeric($players))
        {
            $this->error('Input must be integer!');
            exit;
        }

        if($players <= 0)
        {
            $this->info('Minimum players is 1');
            exit;
        }

        $deck = $this->deck;
        $arrayDeck = $deck->arrayDeck();

        $this->info('Creating Deck..');

        shuffle($arrayDeck);

        $this->info('Card Shuffled');

        foreach ($arrayDeck as $card) {
            $this->info($card);
        }

        $player = [];

        foreach ($arrayDeck as $i => $v) {
            $index = $i % $players;
            $player[$index][] = $v;
        }

        $this->info('The hands of '.$players.' players after cards dealt to them : ');

        for($i=0;$i<$players;$i++)
        {
            if(!array_key_exists($i,$arrayDeck))
            {
                $this->info('Player '.$i.' card is empty');
            } else {
                $this->info('Player '.$i.' card is '.implode(',',$player[$i]));
            }
        }

        return 0;
    }
}
