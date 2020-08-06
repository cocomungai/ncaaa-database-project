SET SQL_MODE = '';

# replace filepath here with local path to data file, refer to README for more details
LOAD DATA INFILE '/Users/tomwesterhold/Desktop/TommyWesterhold/School/Vanderbilt/DatabaseManagementSystems/NCAA_Repo/ncaa-database-project/ncaa-bball-stats.csv'
INTO TABLE megatable
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(game_id, season, neutral_site, scheduled_date, @gametime, tournament, tournament_type, tournament_round,
tournament_game, player_id, last_name, first_name, full_name, abbr_name, status, jersey_number, height,
weight, birthplace, birthplace_city, birthplace_state, @birthplace_country, class, team_name, team_market,
team_id, team_alias, conf_name, conf_alias, division_name, division_alias, league_name, home_team, active,
played, starter, minutes, minutes_int64, position, primary_position, field_goals_made, field_goals_att,
field_goals_pct, three_points_made, three_points_att, three_points_pct, two_points_made, two_points_att,
two_points_pct, blocked_att, free_throws_made, free_throws_att, free_throws_pct, offensive_rebounds, defensive_rebounds,
rebounds, assists, turnovers, steals, blocks, assists_turnover_ratio, personal_fouls, tech_fouls, flagrant_fouls,
points, @sp_created)
SET gametime = STR_TO_DATE(@gametime, '%Y-%m-%d %H:%i:%S'),
	birthplace_country = TRIM(@birthplace_country),
	sp_created = STR_TO_DATE(@sp_created, '%Y-%m-%d %H:%i:%S');