DROP DATABASE IF EXISTS NCAA;
CREATE DATABASE NCAA;
USE NCAA;

DROP TABLE IF EXISTS megatable;
CREATE TABLE IF NOT EXISTS megatable (
	game_id VARCHAR(255),
    season SMALLINT,
    neutral_site VARCHAR(20),
    scheduled_date DATE,
    gametime DATETIME,
    tournament VARCHAR(255),
    tournament_type VARCHAR(255),
    tournament_round VARCHAR(255),
    tournament_game VARCHAR(255),
    player_id VARCHAR(255),
    last_name VARCHAR(50),
    first_name VARCHAR(50),
    full_name VARCHAR(100),
    abbr_name VARCHAR(75),
    status VARCHAR(10),
    jersey_number TINYINT UNSIGNED,
    height TINYINT UNSIGNED,
    weight TINYINT UNSIGNED,
    birthplace VARCHAR(255),
    birthplace_city VARCHAR(40),
    birthplace_state VARCHAR(40),
    birthplace_country VARCHAR(40),
    class VARCHAR(40),
    team_name VARCHAR(100),
    team_market VARCHAR(255),
    team_id VARCHAR(255),
    team_alias VARCHAR(20),
    conf_name VARCHAR(255),
    conf_alias VARCHAR(20),
    division_name VARCHAR(255),
    division_alias VARCHAR(20),
    league_name VARCHAR(255),
    home_team VARCHAR(20),
    active VARCHAR(20),
    played VARCHAR(20),
    starter VARCHAR(20),
    minutes VARCHAR(10),
    minutes_int64 TINYINT UNSIGNED,
    position VARCHAR(20),
    primary_position VARCHAR(20),
    field_goals_made TINYINT UNSIGNED,
    field_goals_att TINYINT UNSIGNED,
    field_goals_pct DECIMAL(7,3),
    three_points_made TINYINT UNSIGNED,
    three_points_att TINYINT UNSIGNED,
    three_points_pct DECIMAL(7,3),
    two_points_made TINYINT UNSIGNED,
    two_points_att TINYINT UNSIGNED,
    two_points_pct DECIMAL(7,3),
    blocked_att TINYINT UNSIGNED,
    free_throws_made TINYINT UNSIGNED,
    free_throws_att TINYINT UNSIGNED,
    free_throws_pct DECIMAL(7,3),
    offensive_rebounds TINYINT UNSIGNED,
    defensive_rebounds TINYINT UNSIGNED,
    rebounds TINYINT UNSIGNED,
    assists TINYINT UNSIGNED,
    turnovers TINYINT UNSIGNED,
    steals TINYINT UNSIGNED,
    blocks TINYINT UNSIGNED,
    assists_turnover_ratio DECIMAL(7,2),
    personal_fouls TINYINT UNSIGNED,
    tech_fouls TINYINT UNSIGNED,
    flagrant_fouls TINYINT UNSIGNED,
    points TINYINT UNSIGNED,
    sp_created VARCHAR(255)
);