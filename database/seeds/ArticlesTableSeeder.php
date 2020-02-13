<?php

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $quote_array = [
            ["Hazrat Ali Ibn Abu-Talib A.S", "Life consists of two days, one for you one against you. So when it's for you don't be proud or reckless, and when it's against you be patient, for both days are test for you."],
            ["Robert M Drake", "Madness and chaos are self-destructing but over thinking is the suicide."],
            ["C. JoyBell C.", "I have come to accept the feeling of not knowing where I am going. And I have trained myself to love it. Because it is only when we are suspended in mid-air with no landing in sight, that we force our wings to unravel and alas begin our flight. And as we fly, we still may not know where we are going to. But the miracle is in the unfolding of the wings. You may not know where you're going, but you know that so long as you spread your wings, the winds will carry you."],
            ["E.F. Schumacher", "Any intelligent fool can make things bigger, more complex, and more violent. It takes a touch of genius — and a lot of courage to move in the opposite direction."],
            ["Miranda Kerr", "A rose can never be a sunflower, and a sunflower can never be a rose.All flowers are beautiful in their own way, and that’s like women too. I want to encourage women to embrace their own uniqueness."],
            ["John Waters, Crackpot: The Obsessions of John Waters", "I've had it with being nice, understanding, fair and hopeful. I feel like being negative all day. The chip on my shoulder could sink the QE2. I've got an attitude problem and nobody better get in my way...I'm in a bad mood and the whole stupid little world is gonna pay!"],
            ["Simone Elkeles, Leaving Paradise", "being afraid to take chances is scarier than actually doing things that challenge you."],
            ["The Dalai Lama", "If a problem is fixable, if a situation is such that you can do something about it, then there is no need to worry. If it's not fixable, then there is no help in worrying. There is no benefit in worrying whatsoever."],
            ["Robert T. Kiyosaki, Rich Dad, Poor Dad", "In school we learn that mistakes are bad, and we are punished for making them. Yet, if you look at the way humans are designed to learn, we learn by making mistakes. We learn to walk by falling down. If we never fell down, we would never walk."],
            ["Nick Vujicic", "Life isn't about having, it's about being. You could surround yourself with all that money can buy, and you'd still be as miserable as a human can be. I know people with perfect bodies who don't have half the happiness I've found. On my journeys I've seen more joy in the slums of Mumbai and the orphanages of Africa than in wealthy gated communities and on sprawling estates worth millions. Why is that? You'll find contentment when your talents and passion are completely engaged, in full force. Recognise instant self-gratification for what it is. Resist the temptation to grab for material objects like the perfect house, the coolest clothes or the hottest car. The if I just had X, I would be happy syndrome is a mass delusion. When you look for happiness in mere objects, they are never enough. Look around. Look within."]
        ];
        for ($i = 0; $i < sizeof($quote_array); $i ++) {
            Article::create([
	            'title' => $quote_array[$i][0],
	            'description' => $quote_array[$i][1]
	        ]);
    	}
    }
}
