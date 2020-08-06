# This file provides a few views that will be useful for querying data.

USE NCAA;

CREATE OR REPLACE VIEW team_scores AS
SELECT game_id, scheduled_date, gametime, team_id, team_market, team_name, SUM(points) AS score, home_team, season
FROM games AS G JOIN 
	(SELECT game_id, team_id, team_market, team_name, points, home_team
	FROM teams AS T JOIN player_stats AS P_S USING (team_id)) AS TP_S
	USING (game_id)
GROUP BY game_id, team_id, home_team
ORDER BY game_id, home_team;

CREATE OR REPLACE VIEW both_teams AS
SELECT T_S1.game_id AS game_id, T_S1.season AS season, T_S1.scheduled_date AS scheduled_date, T_S1.gametime AS gametime, T_S1.team_id AS away_id,
	T_S1.team_market AS away_school, T_S1.team_name AS away_team, T_S1.score AS away_score, T_S1.home_team AS home_false, T_S2.team_id AS home_id,
	T_S2.team_market AS home_school, T_S2.team_name AS home_team, T_S2.score AS home_score, T_S2.home_team AS home_true
FROM team_scores AS T_S1 JOIN team_scores AS T_S2 ON T_S1.game_id = T_S2.game_id AND T_S1.home_team < T_S2.home_team;

# The following views are currently unused by the application but may be involved in troubleshooting the insert functionalities
CREATE OR REPLACE VIEW full_player AS
SELECT *
FROM players AS P JOIN player_stats AS P_S USING (player_id);

CREATE OR REPLACE VIEW player_season_stats AS
SELECT player_id, full_name, team_market, team_name, season,
	total_fgs_made, total_fgs_att, CAST(total_fgs_made/total_fgs_att AS DECIMAL(5,2)) AS fg_pct, total_threes_made, total_threes_att,
    CAST(total_threes_made/total_threes_att AS DECIMAL(5,2)) AS three_pct, total_twos_made, total_twos_att,
    CAST(total_twos_made/total_twos_att AS DECIMAL(5,2)) AS two_pct, total_blocked_att, total_fts_made, total_fts_att,
    CAST(total_fts_made/total_fts_att AS DECIMAL(5,2)) AS ft_pct, total_orebs, total_drebs, total_rebs, total_assists, total_turnovers,
    CAST(total_assists/total_turnovers AS DECIMAL(5,2)) AS asst_turn_ratio, total_steals, total_blocks, total_personals,
    total_techs, total_flagrants, total_points
FROM teams AS T JOIN
	(SELECT * FROM games AS G JOIN player_agg AS P_A USING (game_id)) AS GP_A USING (team_id)
GROUP BY season;

CREATE OR REPLACE VIEW player_agg AS
SELECT game_id, team_id, player_id, full_name, SUM(field_goals_made) AS total_fgs_made, SUM(field_goals_att) AS total_fgs_att, SUM(three_points_made) AS total_threes_made,
SUM(three_points_att) AS total_threes_att, SUM(two_points_made) AS total_twos_made, SUM(two_points_att) AS total_twos_att,
SUM(blocked_att) AS total_blocked_att, SUM(free_throws_made) AS total_fts_made, SUM(free_throws_att) AS total_fts_att,
SUM(offensive_rebounds) AS total_orebs, SUM(defensive_rebounds) AS total_drebs, SUM(rebounds) AS total_rebs, SUM(assists) AS total_assists,
SUM(turnovers) AS total_turnovers, SUM(steals) AS total_steals, SUM(blocks) AS total_blocks, SUM(personal_fouls) AS total_personals,
SUM(tech_fouls) AS total_techs, SUM(flagrant_fouls) AS total_flagrants, SUM(points) AS total_points
FROM players AS P JOIN player_stats AS P_S USING (player_id)
GROUP BY game_id, player_id;
