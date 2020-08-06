# This file inserts all relevant data from the megatable into our normalized tables

SET SQL_MODE = '';

USE NCAA;

INSERT INTO games
	SELECT DISTINCT game_id, season, neutral_site, scheduled_date, gametime
    FROM megatable;

INSERT INTO tournament_games
	SELECT DISTINCT game_id, tournament, tournament_type, tournament_round, tournament_game
    FROM megatable
    WHERE tournament IS NOT NULL;
    
INSERT INTO teams
	SELECT DISTINCT team_id, team_market, team_name, team_alias, conf_name, conf_alias,
					division_name, division_alias, league_name
    FROM megatable;
    
INSERT INTO players
	SELECT player_id, last_name, first_name, full_name, abbr_name, birthplace, 
			birthplace_city, birthplace_state, birthplace_country
	FROM megatable
  GROUP BY player_id;

INSERT INTO player_stats
	SELECT player_id, status, jersey_number, height, weight, class, game_id, home_team, active,
			played, starter, minutes, minutes_int64, position, primary_position,field_goals_made, field_goals_att,
			three_points_made, three_points_att, two_points_made, two_points_att, blocked_att, free_throws_made,
			free_throws_att, offensive_rebounds, defensive_rebounds, rebounds, assists, turnovers, steals,
			blocks, personal_fouls, tech_fouls, flagrant_fouls, points, team_id
	FROM megatable;
