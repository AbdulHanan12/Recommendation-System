# Movie Recommendation System with Like and Rate Feature


This project aims to develop a movie recommendation system that can provide users with personalized recommendations based on their preferences and interactions with the system, such as liking and rating movies. The system will utilize various machine learning algorithms and techniques to analyze user data and identify patterns that can be used to predict which movies a user might enjoy.

# Features


Personalized Recommendations: The system will recommend movies to users based on their preferences, past viewing history, and interactions with the system, such as liking and rating movies.

Like and Rate Movies: Users can express their preferences for movies by liking or rating them. This information will be used to improve the quality of recommendations.

Search Movies: Users can search for movies by their title.

# Data
The project uses the Kaggle dataset, which contains ratings of 100,000 movies by 943 users. The dataset can be downloaded from the following website:
https://www.kaggle.com/datasets/rounakbanik/the-movies-dataset

In this Project I use selective records from this dataset

# Installation

To install the required libraries, you can use the following command:

- copy .env.example & create .env from its content
- composer install
- npm install
- Import DB from database/database.sql
- Run php artisan db:seed to create Admin
- php artisan key:generate
- php artisan serve to run the project

# Admin Credentials
- email => admin@yts.com
- password => 1234abcd&


# Future Work / Pending Features
The project can be extended in the following ways:

- Recommendation can be extended to Movie Languages, Country, Keywords
- Also we can recommed movies by Fetching User current location using get_user_agent() & Location::get(User IP);
- Also we can make a history of user interest by most search keywords
