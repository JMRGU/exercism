<?php

declare(strict_types=1);

/* notes:
    the tests want the output formatted and spaced specifically
    using multidimension assoc array to track results for each team
    will give "Warning: Undefined array key"s
    undefined array value of int will helpfully default to 0
*/

/* SPACING
    Team: 31 chars
    Scores: 4 chars (except P which is 5 inc. \n)
*/

error_reporting(E_ALL ^ E_WARNING); // to hide the 'Undefined array key' warnings we get

class Tournament
{
    public function __construct()
    {
        
    }

    public function tally($scores)
    {
        // scores come in as one flat string: matches newline-separated; results semicolon-separated
        
            // split around newlines for matches
        $matches =  preg_split("/\r\n|\n|\r/", $scores); // explode('\n', $scores); // explode struggles to read newline - interpreted differently under the bonnet?
        
            // they want the header to be printed even if no matches played, okay
        $out = str_pad('Team', 31, ' ', STR_PAD_RIGHT) . '|' . 
                str_pad('MP', 4, ' ', STR_PAD_BOTH) . '|' .
                str_pad(' W', 4, ' ', STR_PAD_BOTH) . '|' . 
                str_pad(' D', 4, ' ', STR_PAD_BOTH) . '|' . 
                str_pad(' L', 4, ' ', STR_PAD_BOTH) . '|' . 
                str_pad("P", 3, ' ', STR_PAD_LEFT);
            // disgusting

        // somehow, a foreach on '' still executes (why..?)
            // so kill it here if score is null
        if ($scores === ''){ return $out; }

        $match_results = [];
        
        foreach ($matches as $match){
            $parsed = explode(';', $match);
        
                // add match played to both teams
            $result[$parsed[0]]['MP'] += 1;
            $result[$parsed[1]]['MP'] += 1;
            
            // increment w/d/l for each team
                // there's a way to do this by mapping the given value of win/draw/loss to a set of indexes, but really this is all a bit silly, irl you would probably put the winning team first and an optional third parameter to signify draws (then again, you might really just have the scores and work it out from there, so...)
            
            switch ($parsed[2]){
                case 'win':
                    $result[$parsed[0]]['W'] += 1;
                    $result[$parsed[0]]['P'] += 3;
                    $result[$parsed[1]]['L'] += 1;
                    break;
                case 'draw':
                    $result[$parsed[0]]['D'] += 1;
                    $result[$parsed[0]]['P'] += 1;
                    $result[$parsed[1]]['D'] += 1;
                    $result[$parsed[1]]['P'] += 1;
                    break;
                case 'loss':
                    $result[$parsed[0]]['L'] += 1;
                    $result[$parsed[1]]['W'] += 1;
                    $result[$parsed[1]]['P'] += 3;
                    break;
            }
        }

            // map to fill missing keys for all teams
        $filled_scores = array_map(function($v) {
            $v['MP'] += 0;
            $v['W'] += 0;
            $v['D'] += 0;
            $v['L'] += 0;
            $v['P'] += 0;
            return $v;
        }, $result); // bit cheeky
        
        // sort by Points, then Ties
        array_multisort(array_column($filled_scores, 'P'), SORT_DESC, array_keys($filled_scores), SORT_ASC, $filled_scores);
        
            // loop through each match to format output
        foreach ($filled_scores as $team => $res) {

                // form output
            array_push($match_results, "\n" . str_pad($team, 31, ' ', STR_PAD_RIGHT) . '|' . 
                str_pad($res['MP'] . '', 3, ' ', STR_PAD_LEFT) . ' |' .
                str_pad($res['W'] . '', 3, ' ', STR_PAD_LEFT) . ' |' . 
                str_pad($res['D'] . '', 3, ' ', STR_PAD_LEFT) . ' |' . 
                str_pad($res['L']. '', 3, ' ', STR_PAD_LEFT) . ' |' . 
                str_pad($res['P']. '', 3, ' ', STR_PAD_LEFT));
                // this sickens me
        }
        
        $out .= implode($match_results);
        return $out;
    }
}
