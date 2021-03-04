<?php

class DataLayer
{
    function getIndoor()
    {
        return array("tv", "puzzles", "movies", "reading", "cooking",
            "playing cards", "board games", "video games");
    }

    function getOutdoor()
    {
        return array("hiking", "biking", "swimming", "collecting",
            "walking", "climbing");
    }
}
