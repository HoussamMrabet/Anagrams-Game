# Anagrams Game

This is a web-based Anagrams game developed using PHP and MySQL. The game allows players to find as many anagrams as possible within a given time limit using a set of random letters. The server validates each word against an embedded dictionary. Players can view their score, compete for high rankings, and optionally share their results on Facebook and Twitter.

## Gameplay Process

1. When a player starts a game, the server selects 8 letters at random.
2. The player has 60 seconds to find as many valid anagrams as possible using the given letters.
3. Each time the player submits a word, the server validates it against the embedded dictionary.
4. The player's remaining time counter is increased if the submitted word is valid.
5. The player can request a new set of random letters at any time.
6. The game ends when the player runs out of time.

## Features

- Fast and responsive gameplay.
- Real-time validation of words against an embedded dictionary.
- Timer display showing the remaining time.
- Ability to request a new set of random letters.
- Scoreboard to track and display player scores.
- Authentication system to save scores for registered users.
- Guest mode available for playing without saving scores.
- Game description page explaining how to play.

## Installation

To set up the Anagrams game locally, follow these steps:

1. Clone the repository: `git clone https://github.com/HoussamMrabet/Anagrams-Game.git`.
2. Ensure you have PHP and MySQL installed on your local machine.
3. Import the included database file into your MySQL server.
4. Database file included for easy local setup.
5. Configure the database connection settings in the application.
6. Run the application using a PHP server.
7. Access the game in your web browser.

## Usage

1. Launch the application in your web browser.
2. Create an account or log in if you want to save your scores.
3. Start a new game to receive a set of random letters.
4. Formulate valid anagrams using the given letters within the time limit.
5. Submit your words for validation.
6. The server will increase your remaining time if the word is valid.
7. Optionally, request a new set of letters during gameplay.
8. The game ends when the time runs out.
9. View your score and ranking on the leaderboard.
10. Share your score on Facebook and Twitter if desired.

## Contributing

Contributions to this Anagrams game project are welcome. To contribute, follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make the necessary changes in your branch.
4. Test the changes to ensure they work as expected.
5. Submit a pull request with a detailed explanation of your changes.

## License

This project is licensed under the [MIT License](LICENSE).

## Contact

For any inquiries or feedback, please contact [houssammrabet5@gmail.com](mailto:houssammrabet5@gmail.com).
