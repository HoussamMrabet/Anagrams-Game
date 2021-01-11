# Anagrams-Game

It is a question of realizing a game of speed or it is necessary to find a maximum of anagrams in a given time

# Process

When a player starts a game on the server, the server chooses 8 letters at random. The player then has 60 seconds to find as many anagrams as possible using these letters. Each time the player thinks he has found a word, the server must validate it against a dictionary that he embeds. The game ends when the player runs out of time. The server then provides a ranking of players with the possibility of sharing the result on facebook and twitter.

The goal is to provide fast and responsive play. Typically, each time the player finds a word, their remaining time counter must be increased. Then it must be possible to request a new print run.
