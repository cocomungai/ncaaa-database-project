# This file creates the main tables for the NCAA database
# The tables should be in BCNF excluding a couple redundant mathematical dependencies which have been included for effiency (these include percentages and ratios of player stats)

USE NCAA;

# Drops in reverse order to avoid foreign key restrictions
DROP TABLE IF EXISTS player_stats;
DROP TABLE IF EXISTS players;
DROP TABLE IF EXISTS teams;
DROP TABLE IF EXISTS tournament_games;
DROP TABLE IF EXISTS games;

# This table identifies each individual game stored in the database
DROP TABLE IF EXISTS games;
CREATE TABLE games (
	game_id VARCHAR(255),
    season SMALLINT,
    neutral_site VARCHAR(20),
    scheduled_date DATE,
    gametime DATETIME,
    PRIMARY KEY (game_id)
);

# This table defines the tournament for each tournament game stored in the database
DROP TABLE IF EXISTS tournament_games;
CREATE TABLE tournament_games (
	game_id VARCHAR(255),
    tournament VARCHAR(255),
    tournament_type VARCHAR(255),
    tournament_round VARCHAR(255),
    tournament_game VARCHAR(255),
    PRIMARY KEY (game_id),
    CONSTRAINT fk_gameid FOREIGN KEY (game_id)
		REFERENCES games (game_id)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
);

# This table defines each team represented in the set of games in the database
DROP TABLE IF EXISTS teams;
CREATE TABLE teams (
	team_id VARCHAR(255),
	team_market VARCHAR(100),
    team_name VARCHAR(255),
    team_alias VARCHAR(20),
    conf_name VARCHAR(255),
    conf_alias VARCHAR(20),
    division_name VARCHAR(255),
    division_alias VARCHAR(20),
    league_name VARCHAR(255),
    PRIMARY KEY (team_id)
);

# This table defines non-statistical info about a player
DROP TABLE IF EXISTS players;
CREATE TABLE players (
	player_id VARCHAR(255),
    last_name VARCHAR(50),
    first_name VARCHAR(50),
    full_name VARCHAR(100),
    abbr_name VARCHAR(75),
    birthplace VARCHAR(255),
    birthplace_city VARCHAR(40),
    birthplace_state VARCHAR(40),
    birthplace_country VARCHAR(40),
    PRIMARY KEY (player_id)
);

# This table contains all of the player statistics available for every game in the data and 
# connects each game to the teams and players involved
DROP TABLE IF EXISTS player_stats;
CREATE TABLE player_stats (
	player_id VARCHAR(255),
    status VARCHAR(10),
    jersey_number TINYINT UNSIGNED,
    height TINYINT UNSIGNED,
    weight TINYINT UNSIGNED,
    class VARCHAR(40),
    game_id VARCHAR(255),
    home_team VARCHAR(20),
    active VARCHAR(20),
    played VARCHAR(20),
    starter VARCHAR(20),
    minutes VARCHAR(10) DEFAULT '00:00',
    minutes_int64 TINYINT UNSIGNED,
    position VARCHAR(20),
    primary_position VARCHAR(20),
    field_goals_made TINYINT UNSIGNED,
    field_goals_att TINYINT UNSIGNED,
    three_points_made TINYINT UNSIGNED,
    three_points_att TINYINT UNSIGNED,
    two_points_made TINYINT UNSIGNED,
    two_points_att TINYINT UNSIGNED,
    blocked_att TINYINT UNSIGNED,
    free_throws_made TINYINT UNSIGNED,
    free_throws_att TINYINT UNSIGNED,
    offensive_rebounds TINYINT UNSIGNED,
    defensive_rebounds TINYINT UNSIGNED,
    rebounds TINYINT UNSIGNED,
    assists TINYINT UNSIGNED,
    turnovers TINYINT UNSIGNED,
    steals TINYINT UNSIGNED,
    blocks TINYINT UNSIGNED,
    personal_fouls TINYINT UNSIGNED,
    tech_fouls TINYINT UNSIGNED,
    flagrant_fouls TINYINT UNSIGNED,
    points TINYINT UNSIGNED,
    team_id VARCHAR(255),
    PRIMARY KEY (player_id, game_id, team_id),
    CONSTRAINT fk_playerid_stats FOREIGN KEY (player_id)
		REFERENCES players (player_id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
	CONSTRAINT fk_gameid_stats FOREIGN KEY (game_id)
		REFERENCES games (game_id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
	CONSTRAINT fk_teamid_stats FOREIGN KEY (team_id)
		REFERENCES teams (team_id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);






